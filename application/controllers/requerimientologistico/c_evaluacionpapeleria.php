<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_evaluacionpapeleria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_evaluacionpapeleria');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_evaluacionpapeleria($page = 'v_evaluacionpapeleria') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
         $cevtransporte = $this->m_evaluacionpapeleria->fm_validarevaluacion($cdocumento);
       //echo json_encode(array('result' => 'guardado'));
        
         $carrayevtransporte= ''; 
        foreach ($cevtransporte as $cevtrans)
        {
            $carrayevtransporte = $cevtrans->total;
        }
        
        if ($carrayevtransporte > 0){
            
            $ocultaxevaluacion = 'style="display:none"';
        }else{
            $ocultaxevaluacion = '';
        }
        
        $cdatosgenerales = $this->m_evaluacionpapeleria->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
       

        
        
            $idevaluacionpapeleria = $this->input->get('idevaluacionpapeleria');
        
            $listartabla = $this->m_evaluacionpapeleria->fm_cargardatosevaluacionpapeleria($cdocumento);
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
//            $inhabilitarespuesta = ' ';
//            if($valor->estadorequerimiento == 'PENDIENTE' || $valor->estadorequerimiento == 'EVALUADO' )
//            {
//                $inhabilitarespuesta = 'disabled="disabled"';
//            }
//            
//            $observacionevaluador ='<div class=" col-md-12"   ><textarea class="form-control"  '.$inhabilitarespuesta.' id="observacionad'.$valor->idpapeleria.'"  name="observacionad'.$valor->idpapeleria.'" rows="2">'.$valor->observacionevaluadorp.'</textarea> </div>' ;
// 
//            $respuestaevaluador = '<select class="form-control input-sm  "   '.$inhabilitarespuesta.' id="respuestaevaluacion'.$valor->idpapeleria.'" name="respuestaevaluacion'.$valor->idpapeleria.'"  >';
//            
//            if ($valor->idrespevaluador){
//               $respuestaevaluador .= '<option value="'.$valor->idrespevaluador.'">'.$valor->respuesta_evaluador.'</option><option value="1">SI</option><option value="2">NO</option></select>';
//            }else{
//                $respuestaevaluador .= '<option value="">SELECCIONE</option><option value="1">SI</option><option value="2">NO</option></select>';
//            }
//            
////style="display:none"
//            //fin estado de la encuensta
//            $comilla = "'";
//            $datos .=  '<tr '.$colorfila.'>'
//                        .'<td>'.$valor->idpapeleria.'</td>'
//                        .'<td>'.$valor->estadorequerimiento.'</td>'
//                        .'<td>'.$valor->nombrecompleto.'</td>'
//                        .'<td>'.$valor->fecha_papeleria.'</td>'
//                        .'<td>'.$valor->cantidad_papeleria.'</td>'
//                        .'<td>'.$valor->observacion_papeleria.'</td>'
//                        .'<td>'.$valor->respuestaadmin.'</td>'
//                        .'<td>'.$valor->observacionadminp.'</td>'
//                        .'<td>'.$valor->estadoevaluacion.'</td>'
//                        .'<td>'.$valor->archivo_papeleria.'</td>'
//                        .'<td>'.$respuestaevaluador.'</td>'
//                        .'<td>'.$observacionevaluador.'</td>'
//                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
//                        .'<td><button type="button" id="guardarevaluacionpapeleria" '.$inhabilitarespuesta.' onclick="fc_guardarevaluacionpapeleria('.$comilla.$valor->idpapeleria.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
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
                                                   //'mostrarestadoevaluacionpapeleria' => $mostrarestadoevaluacionpapeleria,
                                                   //'carraydatosevaluacionpapeleria' => $carraydatosevaluacionpapeleria,
                                                   'idevaluacionpapeleria' => $idevaluacionpapeleria,
                                                    'ocultaxevaluacion' => $ocultaxevaluacion
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarevaluacionpapeleria()
    {
        $cvidpapeleria = $this->input->get('vidpapeleria');
        $cvrespuestaevaluacion = $this->input->get('vrespuestaevaluacion'); 
        $cvobservacionad = $this->input->get('vobservacionad');
        //$cestadoreq = $this->input->get('vestadoreq');

         
      $respuestaevaluadorreq = $this->m_evaluacionpapeleria->fm_guardarevaluacionpapeleria($cvidpapeleria,$cvrespuestaevaluacion,$cvobservacionad);
       //echo json_encode(array('result' => 'guardado'));
        
        $carrayrespreq= ''; 
        foreach ($respuestaevaluadorreq as $respuestaevaluadorsreq)
        {
            $carrayrespreq = $respuestaevaluadorsreq->estadorequerimiento;
        }
        
        echo($carrayrespreq);
    }
    //fin funcion para actualizar
    
    
     public function fc_filtrotabla()
  {
         $cvbuscarfecha = $this->input->get('vbuscarfecha');
         $cvbuscaridpapeleria = $this->input->get('vbuscaridpapeleria');
         $cvestadorequerimiento = $this->input->get('vestadorequerimiento');
         $cdocumento =  $this->session->userdata('documento');
         $listartabla = $this->m_evaluacionpapeleria->fm_busquedaevaluacionpapeleria($cvbuscarfecha,$cvbuscaridpapeleria,$cvestadorequerimiento,$cdocumento);
         
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
            if($valor->estadorequerimiento == 'PENDIENTE' || $valor->estadorequerimiento == 'EVALUADO' )
            {
                $inhabilitarespuesta = 'disabled="disabled"';
            }
            
            $inhabilitarespuesta2 = ' ';
             if($valor->estadorequerimiento == 'CANCELADO')
            {
                $inhabilitarespuesta2 = 'disabled="disabled"';
            }
            
            $observacionevaluador ='<div class=" col-md-12"   ><textarea class="form-control" '.$inhabilitarespuesta2.' '.$inhabilitarespuesta.' id="observacionad'.$valor->idpapeleria.'"  name="observacionad'.$valor->idpapeleria.'" rows="2">'.$valor->observacionevaluadorp.'</textarea> </div>' ;
 
            $respuestaevaluador = '<select class="form-control input-sm  " '.$inhabilitarespuesta2.'  '.$inhabilitarespuesta.' id="respuestaevaluacion'.$valor->idpapeleria.'" name="respuestaevaluacion'.$valor->idpapeleria.'"  >';
            
            if ($valor->idrespevaluador){
               $respuestaevaluador .= '<option value="'.$valor->idrespevaluador.'">'.$valor->respuesta_evaluador.'</option><option value="1">SI</option><option value="2">NO</option></select>';
            }else{
                $respuestaevaluador .= '<option value="">SELECCIONE</option><option value="1">SI</option><option value="2">NO</option></select>';
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
            
             $cancelado2='';
            if ($valor->estadorequerimiento == 'CON RESPUESTA')
            {
                $cancelado2 = 'disabled="disabled" ';
            }
            else
            {
                $cancelado2 = ' ';
            }
            
             $cancelado3='';
            if ($valor->estadorequerimiento == 'EVALUADO')
            {
                $cancelado3 = 'disabled="disabled" ';
            }
            else
            {
                $cancelado3 = '';
            }
            
//style="display:none"
            //fin estado de la encuensta
            $comilla = "'";
            $datos .=  '<tr '.$colorfila.'>'
                        .'<td>'.$valor->idpapeleria.'</td>'
                        .'<td>'.$valor->estadorequerimiento.'</td>'
                        .'<td>'.$valor->nombrecompleto.'</td>'
                        .'<td>'.$valor->fecha_papeleria.'</td>'
                        .'<td>'.$valor->cantidad_papeleria.'</td>'
                        .'<td>'.$valor->observacion_papeleria.'</td>'
                        .'<td>'.$valor->respuestaadmin.'</td>'
                        .'<td>'.$valor->observacionadminp.'</td>'
                        .'<td>'.$valor->estadoevaluacion.'</td>'
                        
                        .'<td>'.$respuestaevaluador.'</td>'
                        .'<td>'.$observacionevaluador.'</td>'
                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
                          .'<td><button type="button" id="guardarevaluacionpapeleria" '.$inhabilitarespuesta.' '.$cancelado3.' '.$cancelado.' onclick="fc_guardarevaluacionpapeleria('.$comilla.$valor->idpapeleria.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>'
                        .'<td><button type="button" '.$cancelado2.' '.$cancelado.' '.$cancelado3.' id="cancelarpapeleria"  onclick="cancelarpap('.$comilla.$valor->idpapeleria.$comilla.')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-sign"></span> Cancelar </button></td>';
            
             
            }
         
         echo($datos);
  }
    
    
    public function fc_cancelarpap()
    {
        $cvidpapeleria= $this->input->get('vidpapeleria');
        $cvidrequeriiento = $this->input->get('vidrequeriiento'); 
        $cvidevaluacion = $this->input->get('videvaluacion');
        $cvidaprobado = $this->input->get('vidaprobado');
        //$cestadoreq = $this->input->get('vestadoreq');

         
$this->m_evaluacionpapeleria->fm_cancelarpap($cvidpapeleria,$cvidrequeriiento,$cvidevaluacion,$cvidaprobado);
    
    }
 
    
    public function fc_salir()
    {
         $this->session->sess_destroy() ;
    }
    
}