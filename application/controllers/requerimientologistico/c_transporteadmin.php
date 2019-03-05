<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_transporteadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_transporteadmin');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_transporteadmin($page = 'v_transporteadmin') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
        
        
        $cdatosgenerales = $this->m_transporteadmin->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
       

        
        
            $idtransporteadmin = $this->input->get('idtransporteadmin');
        
            $listartabla = $this->m_transporteadmin->fm_cargardatostransporteadmin();
            $datos = '';
            $a = 0;//para saber el numero de l registro
            $b = 0;//el resultado del modulo para saber si es verde o blanco  
            $cont= 0;
            foreach ($listartabla as $valor)
//            {
//            
//            ++$cont;
//            ++$a;
//            $b = $a % 2;
//            //para colocar el color de la fila
//            if($b === 1)
//            {
//                $colorfila = 'class="success text-uppercase "';
//            }
//            else
//            {
//                $colorfila = 'class="text-uppercase"';
//            }
//
//            //estaado de la encuesta
//            
//            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" id="observacionad'.$valor->id_transporte.'"  name="observacionad'.$valor->id_transporte.'" rows="2">'.$valor->observacion_admin.'</textarea> </div>' ;
// 
//            $respuesta = '<select class="form-control input-sm  " id="respuestaadmin'.$valor->id_transporte.'" name="respuestaadmin'.$valor->id_transporte.'"  >';
//            
//            if ($valor->idaprobado){
//               $respuesta .= '<option value="'.$valor->idaprobado.'">'.$valor->respuestaadmin.'</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
//            }else{
//                $respuesta .= '<option value="">SELECCIONE</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
//            }
//            
////style="display:none"
//            //fin estado de la encuensta
//            $comilla = "'";
//            $datos .=  '<tr '.$colorfila.'>'
//                        .'<td>'.$valor->id_transporte.'</td>'
//                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->id_transporte.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
//                   .'<td>'.$valor->estadorequerimiento.'</td>'
//                        .'<td>'.$valor->nombrecompleto.'</td>'
//                        .'<td>'.$valor->fecha_inicial.'</td>'
//                        .'<td>'.$valor->hora_inicial.'</td>'
//                        .'<td>'.$valor->lugar_partida.'</td>'
//                        .'<td>'.$valor->lugar_llegada.'</td>'
//                        .'<td>'.$valor->cantidad_persona.'</td>'
//                        .'<td>'.$valor->observacion.'</td>'
//                        .'<td>'.$valor->fecharegistro.'</td>'
//                        .'<td>'.$respuesta.'</td>'
//                        .'<td>'.$observacionadmin.'</td>'
//                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
//                        .'<td><button type="button" id="guardartransporteadmin" onclick="fc_guardartransporteadmin('.$comilla.$valor->id_transporte.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
//            
//             
//            }
        
        
       //fin que me trae si el requerimiento es llevar o traer a alguien
       //Levantar vista 
$titulo ='';    
        $titulo = 'Principalservidor'; // para el titulo de la vista en la pestaña
        $this->load->view('pages/requerimientologistico/' . $page,  array('titulo' => $titulo, 
                                                   'foot' => FOOTS, 
                                                   'head' => HEAD, 
                                                   'botonerag' => BOTONERAG, 
                                                   'botoneraa' => BOTONERAA,
                                                   'documento' => $cdocumento,  
                                                   'datos' => $datos, 
                                                   'crol' => $crol, 
                                                   'carraydatosgenerales' => $carraydatosgenerales,
                                                   //'mostrarestadotransporteadmin' => $mostrarestadotransporteadmin,
                                                   //'carraydatostransporteadmin' => $carraydatostransporteadmin,
                                                   'idtransporteadmin' => $idtransporteadmin
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardartransporteadmin()
    {
        $cvidtransporte = $this->input->get('vidtransporte');
        $cvrespuestaadmin = $this->input->get('vrespuestaadmin'); 
        $cvobservacionad = $this->input->get('vobservacionad');
        //$cestadoreq = $this->input->get('vestadoreq');

         
      $respuestareq = $this->m_transporteadmin->fm_guardartransporteadmin($cvidtransporte,$cvrespuestaadmin,$cvobservacionad);
       //echo json_encode(array('result' => 'guardado'));
        
        $carrayrespreq= ''; 
        foreach ($respuestareq as $respuestasreq)
        {
            $carrayrespreq = $respuestasreq->estadorequerimiento;
        }
        
        echo($carrayrespreq);
    }
    //fin funcion para actualizar
    
    
     public function fc_filtrotabla()
  {
         $cvbuscarfecha = $this->input->get('vbuscarfecha');
         $cvbuscaridtransporte = $this->input->get('vbuscaridtransporte');
         $cvestadorequerimiento = $this->input->get('vestadorequerimiento');
         $listartabla = $this->m_transporteadmin->fm_busquedatransporte($cvbuscarfecha,$cvbuscaridtransporte,$cvestadorequerimiento);
         
         $datos = '';
            $a = 0;//para saber el numero de l registro
            $b = 0;//el resultado del modulo para saber si es verde o blanco  
            $cont= 0;
            foreach ($listartabla as $valor)
            {
            
            ++$cont;
            ++$a;
            $b = $a % 2;
            //para colocar el color de la fila
            if($b === 1)
            {
                $colorfila = 'class="success text-uppercase "';
            }
            else
            {
                $colorfila = 'class="text-uppercase"';
            }

             $inhabilitarespuesta = ' ';
            if($valor->estadorequerimiento == 'CON RESPUESTA' || $valor->estadorequerimiento == 'EVALUADO'  )
            {
                $inhabilitarespuesta = 'disabled="disabled"';
            }
            
             $inhabilitarespuesta2 = '';
            if($valor->estadorequerimiento == 'CANCELADO')
            {
                $inhabilitarespuesta2 = 'disabled="disabled"';
            }
            
            
            //estaado de la encuesta
            
            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" id="observacionad'.$valor->id_transporte.'" '.$inhabilitarespuesta2.' '.$inhabilitarespuesta.'  name="observacionad'.$valor->id_transporte.'" rows="2">'.$valor->observacion_admin.'</textarea> </div>' ;
 
            $respuesta = '<select class="form-control input-sm  " '.$inhabilitarespuesta2.'  '.$inhabilitarespuesta.' id="respuestaadmin'.$valor->id_transporte.'" name="respuestaadmin'.$valor->id_transporte.'"  >';
            
            if ($valor->idaprobado){
               $respuesta .= '<option value="'.$valor->idaprobado.'">'.$valor->respuestaadmin.'</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
            }else{
                $respuesta .= '<option value="">SELECCIONE</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
            }
            
            
             $cancelado='';
            if ($valor->estadorequerimiento == 'CANCELADO')
            {
                $cancelado = 'disabled="disabled" ';
            }
            else
            {
                $cancelado = ' ';
            }
            
            $esconde='';
            if($valor->archivo_transporte == '')
            {
              $esconde =  'style="display:none"';
            }
            else
            {
                
            }
            
//style="display:none"
            //fin estado de la encuensta
            $comilla = "'";
            $datos .=  '<tr '.$colorfila.'>'
                        .'<td>'.$valor->id_transporte.'</td>'
                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->id_transporte.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
                   .'<td>'.$valor->estadorequerimiento.'</td>'
                        .'<td>'.$valor->nombrecompleto.'</td>'
                        .'<td>'.$valor->fecha_inicial.'</td>'
                        .'<td>'.$valor->hora_inicial.'</td>'
                        .'<td>'.$valor->lugar_partida.'</td>'
                        .'<td>'.$valor->lugar_llegada.'</td>'
                        .'<td>'.$valor->cantidad_persona.'</td>'
                        
                        .'<td>'.$valor->observacion.'</td>'
                        .'<td>'.$valor->fecharegistro.'</td>'
                        .'<td><a class="btn btn-success btn-sm fancybox" id="editar" '.$esconde.' '.$cancelado.' href="'.DESCARGAR.'/'.$valor->archivo_transporte.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</button></td>'
                        .'<td>'.$respuesta.'</td>'
                        .'<td>'.$observacionadmin.'</td>'
                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
                        .'<td><button type="button" id="guardartransporteadmin" '.$inhabilitarespuesta.' '.$cancelado.' onclick="fc_guardartransporteadmin('.$comilla.$valor->id_transporte.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
            
             
            }
         
         echo($datos);
  }
    
    
 
    
    public function fc_salir()
    {
         $this->session->sess_destroy() ;
    }
    
}