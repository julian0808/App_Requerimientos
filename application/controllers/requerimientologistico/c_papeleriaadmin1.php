<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_papeleriaadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_papeleriaadmin');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_papeleriaadmin($page = 'v_papeleriaadmin') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
        
        
        $cdatosgenerales = $this->m_papeleriaadmin->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
       

        
        
            $idpapeleriaadmin = $this->input->get('idpapeleriaadmin');
        
            $listartabla = $this->m_papeleriaadmin->fm_cargardatospapeleriaadmin();
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
//            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" id="observacionad'.$valor->idpapeleria.'"  name="observacionad'.$valor->idpapeleria.'" rows="2">'.$valor->observacionadminp.'</textarea> </div>' ;
// 
//            $respuesta = '<select class="form-control input-sm  " id="respuestaadmin'.$valor->idpapeleria.'" name="respuestaadmin'.$valor->idpapeleria.'"  >';
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
//                        .'<td>'.$valor->idpapeleria.'</td>'
//                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->idpapeleria.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
//                   .'<td>'.$valor->estadorequerimiento.'</td>'
//                        .'<td>'.$valor->nombrecompleto.'</td>'
//                        .'<td>'.$valor->fecha_papeleria.'</td>'
//                        .'<td>'.$valor->hora_papeleria.'</td>'
//                        .'<td>'.$valor->cantidad_papeleria.'</td>'
//                        .'<td>'.$valor->observacion_papeleria.'</td>'
//                        .'<td>'.$valor->fecharegistro.'</td>'
//                        .'<td>'.$respuesta.'</td>'
//                        .'<td>'.$observacionadmin.'</td>'
//                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
//                        .'<td><button type="button" id="guardarpapeleriaadmin" onclick="fc_guardarpapeleriaadmin('.$comilla.$valor->idpapeleria.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
//            
//             
//            }
        
        
       //fin que me trae si el requerimiento es llevar o traer a alguien
       //Levantar vista    
        $titulo = '';  
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
                                                   //'mostrarestadopapeleriaadmin' => $mostrarestadopapeleriaadmin,
                                                   //'carraydatospapeleriaadmin' => $carraydatospapeleriaadmin,
                                                   'idpapeleriaadmin' => $idpapeleriaadmin
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarpapeleriaadmin()
    {
        $cvidpapeleria = $this->input->get('vidpapeleria');
        $cvrespuestaadmin = $this->input->get('vrespuestaadmin'); 
        $cvobservacionad = $this->input->get('vobservacionad');
        //$cestadoreq = $this->input->get('vestadoreq');

         
      $respuestareq = $this->m_papeleriaadmin->fm_guardarpapeleriaadmin($cvidpapeleria,$cvrespuestaadmin,$cvobservacionad);
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
         $cvbuscaridpapeleria = $this->input->get('vbuscaridpapeleria');
         $cvestadorequerimiento = $this->input->get('vestadorequerimiento');
         $listartabla = $this->m_papeleriaadmin->fm_busquedapapeleriaadmin($cvbuscarfecha,$cvbuscaridpapeleria,$cvestadorequerimiento);
         
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

            //estaado de la encuesta
            
             $inhabilitarespuesta = ' ';
            if($valor->estadorequerimiento == 'CON RESPUESTA' || $valor->estadorequerimiento == 'EVALUADO'  )
            {
                $inhabilitarespuesta = 'disabled="disabled"';
            }
            
            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" '.$inhabilitarespuesta.' id="observacionad'.$valor->idpapeleria.'"  name="observacionad'.$valor->idpapeleria.'" rows="2">'.$valor->observacionadminp.'</textarea> </div>' ;
 
            $respuesta = '<select class="form-control input-sm  " '.$inhabilitarespuesta.' id="respuestaadmin'.$valor->idpapeleria.'" name="respuestaadmin'.$valor->idpapeleria.'"  >';
            
            if ($valor->idaprobado){
               $respuesta .= '<option value="'.$valor->idaprobado.'">'.$valor->respuestaadmin.'</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
            }else{
                $respuesta .= '<option value="">SELECCIONE</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
            }
            
//style="display:none"
            //fin estado de la encuensta
            $comilla = "'";
            $datos .=  '<tr '.$colorfila.'>'
                        .'<td>'.$valor->idpapeleria.'</td>'
                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->idpapeleria.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
                   .'<td>'.$valor->estadorequerimiento.'</td>'
                        .'<td>'.$valor->nombrecompleto.'</td>'
                        .'<td>'.$valor->fecha_papeleria.'</td>'
                        .'<td>'.$valor->hora_papeleria.'</td>'
                        .'<td>'.$valor->cantidad_papeleria.'</td>'
                        .'<td>'.$valor->observacion_papeleria.'</td>'
                        .'<td>'.$valor->fecharegistro.'</td>'
                        .'<td><a class="btn btn-success btn-sm fancybox" id="editar" href="'.DESCARGAR.'/'.$valor->archivo_papeleria.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</button></td>'
                        .'<td>'.$respuesta.'</td>'
                        .'<td>'.$observacionadmin.'</td>'
                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
                        .'<td><button type="button" id="guardarpapeleriaadmin" '.$inhabilitarespuesta.' onclick="fc_guardarpapeleriaadmin('.$comilla.$valor->idpapeleria.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
            
             
            }
         
         echo($datos);
  }
    
    
 
    
    public function fc_salir()
    {
         $this->session->sess_destroy() ;
    }
    
}