<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_fotocopia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_fotocopia');//carga el controlador modelo
        if( $this->session->userdata('documento') == '')
       {
           redirect('/c_login/fc_vlogin');
       } 
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_fotocopia($page = 'v_fotocopia') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
     
        $cdatosgenerales = $this->m_fotocopia->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
     
        
        
        $idfotocopia = $this->input->get('idfotocopia');
        
        $cdatosfotocopia = $this->m_fotocopia->fm_cargardatosfotocopia($idfotocopia);
        $carraydatosfotocopia = array('fechaf' => '', 'horaf' =>'', 'cantidadf' => '','archivo_fotocopia' => '','observacionf' => ''); 
        foreach ($cdatosfotocopia as $cdatostrans)
        {
            $carraydatosfotocopia = array('fechaf' => $cdatostrans->fecha_fotocopia,
                                          'horaf' => $cdatostrans->hora_fotocopia, 
                                          'cantidadf' => $cdatostrans->cantidad_fotocopia,
                                          'archivo_fotocopia' => $cdatostrans->archivo_fotocopia,
                                          'observacionf'  => $cdatostrans->observacion_fotocopia
                                          
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
                                                   'carraydatosfotocopia' => $carraydatosfotocopia,
                                                   'idfotocopia' => $idfotocopia
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarfotocopia()
    {
        $cvdocumento = $this->input->get('vdocumento');
        $cvfechasf = $this->input->get('vfechasf'); 
        $cvhorasf = $this->input->get('vhorasf');   
        $cvcantidadpf = $this->input->get('vcantidadpf');   
        $cvnameFile = $this->input->get('vnameFile');   
        $cvobservacionf = $this->input->get('vobservacionf'); 
        
         
         
       $cidfotocopia = $this->m_fotocopia->fm_guardarfotocopia($cvdocumento,$cvfechasf,$cvhorasf,$cvcantidadpf,$cvnameFile,$cvobservacionf);
       //echo json_encode(array('result' => 'guardado'));
        
         $carrayidfotocopia= ''; 
        foreach ($cidfotocopia as $cidtrans)
        {
            $carrayidfotocopia = $cidtrans->idfotocopia;
        }
        
        echo($carrayidfotocopia);
        
    }
    //fin funcion para actualizar
    
    
    function fc_salir()
    {
        $this->session->sess_destroy();
    }
    
}