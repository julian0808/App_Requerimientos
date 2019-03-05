<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_transporte extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_transporte');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_transporte($page = 'v_transporte') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        
         $cevtransporte = $this->m_transporte->fm_validarevaluacion($cdocumento);
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
        
        $crol =  $this->session->userdata('rol');
     
        $cdatosgenerales = $this->m_transporte->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
        
        
        $idtransporte = $this->input->get('idtransporte');
        
        $cdatostransporte = $this->m_transporte->fm_cargardatostransporte($idtransporte);
        $carraydatostransporte = array('fecha_inicial' => '', 'hora_inicial' =>'', 'lugar_partida' => '','lugar_llegada' => '','cantidad_persona' => '','observacion' => ''); 
        foreach ($cdatostransporte as $cdatostrans)
        {
            $carraydatostransporte = array('fecha_inicial' => $cdatostrans->fecha_inicial,
                                          'hora_inicial' => $cdatostrans->hora_inicial, 
                                          'lugar_partida' => $cdatostrans->lugar_partida,
                                          'lugar_llegada' => $cdatostrans->lugar_llegada,
                                          'cantidad_persona' => $cdatostrans->cantidad_persona,
                                          'observacion'  => $cdatostrans->observacion
                                          );
        }
        
        
        
        
         
        
      
        
        
       //fin que me trae si el requerimiento es llevar o traer a alguien
       //Levantar vista     
        $titulo = 'Principalservidor'; // para el titulo de la vista en la pestaña
        $this->load->view('pages/requerimientologistico/' . $page,  array('titulo' => $titulo, 
                                                   'foot' => FOOTS, 
                                                   'head' => HEAD, 
                                                   'botonerag' => BOTONERAG, 
                                                   'botoneraa' => BOTONERAA,
                                                   'documento' => $cdocumento,  
                                                   'carraydatosgenerales' => $carraydatosgenerales,
                                                   'crol' => $crol,
                                                   'carraydatostransporte' => $carraydatostransporte,
                                                   'idtransporte' => $idtransporte,
                                                   'ocultaxevaluacion' => $ocultaxevaluacion
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardartransporte()
    {
        $cvdocumento = $this->input->post('vdocumento');
        $cvfechast = $this->input->post('vfechast'); 
        $cvhorast = $this->input->post('vhorast');   
        $cvlugarpst = $this->input->post('vlugarpst');   
        $cvlugarlst = $this->input->post('vlugarlst');   
        $cvcantidadpt = $this->input->post('vcantidadpt'); 
        $cvobservaciont = $this->input->post('vobservaciont');   
         
       $cidtransporte = $this->m_transporte->fm_guardartransporte($cvdocumento,$cvfechast,$cvhorast,$cvlugarpst,$cvlugarlst,$cvcantidadpt,$cvobservaciont);
       //echo json_encode(array('result' => 'guardado'));
        
         $carrayidtransporte= ''; 
        foreach ($cidtransporte as $cidtrans)
        {
            $carrayidtransporte = $cidtrans->id_transporte;
        }
        
        echo($carrayidtransporte);
        
    }
    //fin funcion para actualizar
    
    
 
    
    public function fc_salir()
    {
         $this->session->sess_destroy() ;
    }
    
    public function fc_validarevaluacion()
    {
        $cevtransporte = $this->m_transporte->fm_validarevaluacion( $this->session->userdata('documento'));
       //echo json_encode(array('result' => 'guardado'));
        
         $carrayevtransporte= ''; 
        foreach ($cevtransporte as $cevtrans)
        {
            $carrayevtransporte = $cevtrans->total;
        }
        
        echo($carrayevtransporte);
    }
    
}