<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_papeleria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('/requerimientologistico/m_papeleria');//carga el controlador modelo
        if( $this->session->userdata('documento') == '')
       {
           redirect('/c_login/fc_vlogin');
       } 
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_papeleria($page = 'v_papeleria') {

        if (!file_exists('application/views/pages/requerimientologistico/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        
        $cdocumento =  $this->session->userdata('documento');
        $crol =  $this->session->userdata('rol');
     
        $cdatosgenerales = $this->m_papeleria->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
     
        
        
        $idpapeleria = $this->input->get('idpapeleria');
        
        $cdatospapeleria = $this->m_papeleria->fm_cargardatospapeleria($idpapeleria);
        $carraydatospapeleria = array('fechap' => '', 'horap' =>'', 'cantidadp' => '','archivo_papeleria' => '','observacionp' => ''); 
        foreach ($cdatospapeleria as $cdatospape)
        {
            $carraydatospapeleria = array('fechap' => $cdatospape->fecha_papeleria,
                                          'horap' => $cdatospape->hora_papeleria, 
                                          'cantidadp' => $cdatospape->cantidad_papeleria,
                                          'archivo_papeleria' => $cdatospape->archivo_papeleria,
                                          'observacionp'  => $cdatospape->observacion_papeleria
                                          
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
                                                   'carraydatospapeleria' => $carraydatospapeleria,
                                                   'idpapeleria' => $idpapeleria
                                                   ));
        //Fin levantar vista
         
    }
    
    
    //funcion para actualizar
    public function fc_guardarpapeleria()
    {
        $cvdocumento = $this->input->get('vdocumento');
        $cvfechasp = $this->input->get('vfechasp'); 
        $cvhorasp = $this->input->get('vhorasp');   
        $cvcantidadp = $this->input->get('vcantidadp');   
        $cvnameFile = $this->input->get('vnameFile');   
        $cvobservacionp = $this->input->get('vobservacionp'); 
        
         
         
       $cidpapeleria = $this->m_papeleria->fm_guardarpapeleria($cvdocumento,$cvfechasp,$cvhorasp,$cvcantidadp,$cvnameFile,$cvobservacionp);
       //echo json_encode(array('result' => 'guardado'));
        
         $carrayidpapeleria= ''; 
        foreach ($cidpapeleria as $cidpape)
        {
            $carrayidpapeleria = $cidpape->idpapeleria;
        }
        
        echo($carrayidpapeleria);
        
    }
    //fin funcion para actualizar
    
    
    function fc_salir()
    {
        $this->session->sess_destroy();
    }
    
}