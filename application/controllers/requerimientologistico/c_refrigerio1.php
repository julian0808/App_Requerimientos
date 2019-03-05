<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_refrigerio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_refrigerio');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_refrigerio($page = 'v_refrigerio') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
     
        $cdatosgenerales = $this->m_refrigerio->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
        
        $idrefrigerio = $this->input->get('idrefrigerio');
        
        $cdatosrefrigerio = $this->m_refrigerio->fm_cargardatosrefrigerio($idrefrigerio);
        $carraydatosrefrigerio = array('fechar' => '', 'horar' =>'', 'cantidadr' => '','lugarrefrigerio' => '','tiporefrigerio' => '','observacionr' => ''); 
        foreach ($cdatosrefrigerio as $cdatostrans)
        {
            $carraydatosrefrigerio = array('fechar' => $cdatostrans->fechar,
                                          'horar' => $cdatostrans->horar, 
                                          'cantidadr' => $cdatostrans->cantidadr,
                                          'lugarrefrigerio' => $cdatostrans->lugarrefrigerio,
                                          'observacionr'  => $cdatostrans->observacionr
                                          
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
                                                   'carraydatosrefrigerio' => $carraydatosrefrigerio,
                                                   'idrefrigerio' => $idrefrigerio
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarrefrigerio()
    {
        $cvdocumento = $this->input->get('vdocumento');
        $cvfechasr = $this->input->get('vfechasr'); 
        $cvhorasr = $this->input->get('vhorasr');   
        $cvlugarlsr = $this->input->get('vlugarlsr');   
        $cvcantidadpr = $this->input->get('vcantidadpr');   
//        $cvtiporefrigerio = $this->input->get('vtiporefrigerio'); 
        $cvobservacionr = $this->input->get('vobservacionr'); 
         
         
       $cidrefrigerio = $this->m_refrigerio->fm_guardarrefrigerio($cvdocumento,$cvfechasr,$cvhorasr,$cvlugarlsr,$cvcantidadpr,$cvobservacionr);
       //echo json_encode(array('result' => 'guardado'));
        
         $carrayidrefrigerio= ''; 
        foreach ($cidrefrigerio as $cidtrans)
        {
            $carrayidrefrigerio = $cidtrans->idrefrigerio;
        }
        
        echo($carrayidrefrigerio);
        
    }
    //fin funcion para actualizar
    
    
    function fc_salir()
    {
        $this->session->sess_destroy();
    }
    
}