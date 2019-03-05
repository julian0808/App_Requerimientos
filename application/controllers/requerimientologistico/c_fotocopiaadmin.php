<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_fotocopiaadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_fotocopiaadmin');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_fotocopiaadmin($page = 'v_fotocopiaadmin') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
        
        
        $cdatosgenerales = $this->m_fotocopiaadmin->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
       

        
        
            $idfotocopiaadmin = $this->input->get('idfotocopiaadmin');
        
            $listartabla = $this->m_fotocopiaadmin->fm_cargardatosfotocopiaadmin();
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
//            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" id="observacionad'.$valor->idfotocopia.'"  name="observacionad'.$valor->idfotocopia.'" rows="2">'.$valor->observacionadminf.'</textarea> </div>' ;
// 
//            $respuesta = '<select class="form-control input-sm  " id="respuestaadmin'.$valor->idfotocopia.'" name="respuestaadmin'.$valor->idfotocopia.'"  >';
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
//                        .'<td>'.$valor->idfotocopia.'</td>'
//                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->idfotocopia.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
//                   .'<td>'.$valor->estadorequerimiento.'</td>'
//                        .'<td>'.$valor->nombrecompleto.'</td>'
//                        .'<td>'.$valor->fecha_fotocopia.'</td>'
//                        .'<td>'.$valor->hora_fotocopia.'</td>'
//                        .'<td>'.$valor->cantidad_fotocopia.'</td>'
//                        .'<td>'.$valor->observacion_fotocopia.'</td>'
//                        .'<td>'.$valor->fecharegistro.'</td>'
//                        .'<td>'.$respuesta.'</td>'
//                        .'<td>'.$observacionadmin.'</td>'
//                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
//                        .'<td><button type="button" id="guardarfotocopiaadmin" onclick="fc_guardarfotocopiaadmin('.$comilla.$valor->idfotocopia.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
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
                                                   //'mostrarestadofotocopiaadmin' => $mostrarestadofotocopiaadmin,
                                                   //'carraydatosfotocopiaadmin' => $carraydatosfotocopiaadmin,
                                                   'idfotocopiaadmin' => $idfotocopiaadmin
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarfotocopiaadmin()
    {
        $cvidfotocopia = $this->input->get('vidfotocopia');
        $cvrespuestaadmin = $this->input->get('vrespuestaadmin'); 
        $cvobservacionad = $this->input->get('vobservacionad');
        //$cestadoreq = $this->input->get('vestadoreq');

         
      $respuestareq = $this->m_fotocopiaadmin->fm_guardarfotocopiaadmin($cvidfotocopia,$cvrespuestaadmin,$cvobservacionad);
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
         $cvbuscaridfotocopia = $this->input->get('vbuscaridfotocopia');
         $cvestadorequerimiento = $this->input->get('vestadorequerimiento');
         $listartabla = $this->m_fotocopiaadmin->fm_busquedafotocopiaadmin($cvbuscarfecha,$cvbuscaridfotocopia,$cvestadorequerimiento);
         
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
            //estaado de la encuesta
            
             $inhabilitarespuesta2 = '';
            if($valor->estadorequerimiento == 'CANCELADO')
            {
                $inhabilitarespuesta2 = 'disabled="disabled"';
            }
            
            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" '.$inhabilitarespuesta2.' '.$inhabilitarespuesta.' id="observacionad'.$valor->idfotocopia.'"  name="observacionad'.$valor->idfotocopia.'" rows="2">'.$valor->observacionadminf.'</textarea> </div>' ;
 
            $respuesta = '<select class="form-control input-sm  " '.$inhabilitarespuesta2.' '.$inhabilitarespuesta.' id="respuestaadmin'.$valor->idfotocopia.'" name="respuestaadmin'.$valor->idfotocopia.'"  >';
            
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
            if($valor->archivo_fotocopia == '')
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
                        .'<td>'.$valor->idfotocopia.'</td>'
                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->idfotocopia.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
                   .'<td>'.$valor->estadorequerimiento.'</td>'
                        .'<td>'.$valor->nombrecompleto.'</td>'
                        .'<td>'.$valor->fecha_fotocopia.'</td>'
                        .'<td>'.$valor->hora_fotocopia.'</td>'
                        .'<td>'.$valor->cantidad_fotocopia.'</td>'
                        .'<td>'.$valor->observacion_fotocopia.'</td>'
                        .'<td>'.$valor->fecharegistro.'</td>'
                    .'<td><a class="btn btn-success btn-sm fancybox" id="editar" '.$esconde.' '.$cancelado.' href="'.DESCARGAR.'/'.$valor->archivo_fotocopia.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</button></td>'
                        .'<td>'.$respuesta.'</td>'
                        .'<td>'.$observacionadmin.'</td>'
                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
                        .'<td><button type="button" id="guardarfotocopiaadmin" '.$cancelado.' '.$inhabilitarespuesta.' onclick="fc_guardarfotocopiaadmin('.$comilla.$valor->idfotocopia.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
            
             
            }
         
         echo($datos);
  }
    
    
 
    
    public function fc_salir()
    {
         $this->session->sess_destroy() ;
    }
    
}