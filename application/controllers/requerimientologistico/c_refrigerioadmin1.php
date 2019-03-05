<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_refrigerioadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_refrigerioadmin');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_refrigerioadmin($page = 'v_refrigerioadmin') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
        
        
        $cdatosgenerales = $this->m_refrigerioadmin->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
       

        
        
            $idrefrigerioadmin = $this->input->get('idrefrigerioadmin');
        
            $listartabla = $this->m_refrigerioadmin->fm_cargardatosrefrigerioadmin();
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
//            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" id="observacionad'.$valor->idrefrigerio.'"  name="observacionad'.$valor->idrefrigerio.'" rows="2">'.$valor->observacionadminr.'</textarea> </div>' ;
// 
//            $respuesta = '<select class="form-control input-sm  " id="respuestaadmin'.$valor->idrefrigerio.'" name="respuestaadmin'.$valor->idrefrigerio.'"  >';
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
//                        .'<td>'.$valor->idrefrigerio.'</td>'
//                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->idrefrigerio.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
//                   .'<td>'.$valor->estadorequerimiento.'</td>'
//                        .'<td>'.$valor->nombrecompleto.'</td>'
//                        .'<td>'.$valor->fechar.'</td>'
//                        .'<td>'.$valor->horar.'</td>'
//                        .'<td>'.$valor->lugarrefrigerio.'</td>'
//                        .'<td>'.$valor->cantidadr.'</td>'
//                        .'<td>'.$valor->observacionr.'</td>'
//                        .'<td>'.$valor->fecharegistro.'</td>'
//                        .'<td>'.$respuesta.'</td>'
//                        .'<td>'.$observacionadmin.'</td>'
//                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
//                        .'<td><button type="button" id="guardarrefrigerioadmin" onclick="fc_guardarrefrigerioadmin('.$comilla.$valor->idrefrigerio.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
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
                                                   //'mostrarestadorefrigerioadmin' => $mostrarestadorefrigerioadmin,
                                                   //'carraydatosrefrigerioadmin' => $carraydatosrefrigerioadmin,
                                                   'idrefrigerioadmin' => $idrefrigerioadmin
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarrefrigerioadmin()
    {
        $cvidrefrigerio = $this->input->get('vidrefrigerio');
        $cvrespuestaadmin = $this->input->get('vrespuestaadmin'); 
        $cvobservacionad = $this->input->get('vobservacionad');
        //$cestadoreq = $this->input->get('vestadoreq');

         
      $respuestareq = $this->m_refrigerioadmin->fm_guardarrefrigerioadmin($cvidrefrigerio,$cvrespuestaadmin,$cvobservacionad);
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
         $cvbuscaridrefrigerio = $this->input->get('vbuscaridrefrigerio');
         $cvestadorequerimiento = $this->input->get('vestadorequerimiento');
         $listartabla = $this->m_refrigerioadmin->fm_busquedarefrigerioadmin($cvbuscarfecha,$cvbuscaridrefrigerio,$cvestadorequerimiento);
         
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
            
            $observacionadmin ='<div class=" col-md-12" ><textarea class="form-control" '.$inhabilitarespuesta.' id="observacionad'.$valor->idrefrigerio.'"  name="observacionad'.$valor->idrefrigerio.'" rows="2">'.$valor->observacionadminr.'</textarea> </div>' ;
 
            $respuesta = '<select class="form-control input-sm  " '.$inhabilitarespuesta.' id="respuestaadmin'.$valor->idrefrigerio.'" name="respuestaadmin'.$valor->idrefrigerio.'"  >';
            
            if ($valor->idaprobado){
               $respuesta .= '<option value="'.$valor->idaprobado.'">'.$valor->respuestaadmin.'</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
            }else{
                $respuesta .= '<option value="">SELECCIONE</option><option value="1">APROBADO</option><option value="2">NO APROBADO</option></select>';
            }
            
//style="display:none"
            //fin estado de la encuensta
            $comilla = "'";
           $datos .=  '<tr '.$colorfila.'>'
                        .'<td>'.$valor->idrefrigerio.'</td>'
                        //.'<td><input type="text" class="form-control input-sm" id="estadoreq" '.$valor->idrefrigerio.' name="estadoreq"   placeholder="estadoreq" value="'.$valor->estadorequerimiento.'">'.$valor->estadorequerimiento.'</td>'
                   .'<td>'.$valor->estadorequerimiento.'</td>'
                        .'<td>'.$valor->nombrecompleto.'</td>'
                        .'<td>'.$valor->fechar.'</td>'
                        .'<td>'.$valor->horar.'</td>'
                        .'<td>'.$valor->lugarrefrigerio.'</td>'
                        .'<td>'.$valor->cantidadr.'</td>'
                        .'<td>'.$valor->observacionr.'</td>'
                        .'<td>'.$valor->fecharegistro.'</td>'
                        .'<td>'.$respuesta.'</td>'
                        .'<td>'.$observacionadmin.'</td>'
                        //.'<td><a class="btn btn-success btn-sm fancybox" '.$archivo.' id="editar" href="'.DESCARGAR.'/'.$valor->nombre_archivo.'" role="button"><span class="glyphicon glyphicon-download"></span> Descargar</a></td>'
                        .'<td><button type="button" id="guardarrefrigerioadmin" '.$inhabilitarespuesta.' onclick="fc_guardarrefrigerioadmin('.$comilla.$valor->idrefrigerio.$comilla.')" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Guardar </button></td>';
            
             
            }
         
         echo($datos);
  }
    
    
 
    
    public function fc_salir()
    {
         $this->session->sess_destroy() ;
    }
    
}