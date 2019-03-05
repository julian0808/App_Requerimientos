<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_principalservidor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // carga la url , que se configura en el config
        $this->load->library('session');//carga la sesión
        $this->load->model('m_principalservidor');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_principalservidor($page = 'v_principalservidor') {

        if (!file_exists('application/views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $cdocumento = $this->session->userdata('documento');
        $cnombre1 = $this->session->userdata('nombre1');
        $capellido1 = $this->session->userdata('apellido1');
        //$cdocumento = $this->input->get('documento');
        $rol = $this->m_principalservidor->fm_cargarrol($cdocumento);
        $crol = '';
        foreach ($rol as $roles)
        {
            $crol =  $roles->rol;
        }
        
       		
                $disabledatrans = 'disabled';
             
                
      

         if($crol <> ''){
        
        	$disabledatrans = '';
        	
        }
        
        if($crol == 'archivo'){
        
        	$disabledatrans = 'disabled';
        	
        }
 
        if($crol == 'todos'){
        
                    $disabledatrans = '';
                  
        	
        }

if ($crol == 'consultahyo'){
$disabledatrans = '';
$disabledco = '';
$disabledh = '';
}
 
if ($crol == 'Cogestor'){
            
        	$disabledh = ''; //acceso hogar
           $disabledco = ''; //Consulta oportunidad
           $disabledatrans = 'disabled';

          
}

if ($crol == 'Adminarchivo'){
            
        	$disabledh = ''; //acceso hogar
           $disabledco = ''; //Consulta oportunidad
           $disabledatrans = '';
           

          
}
        
        
        //Fin ayudas 
        
        $cdatosgenerales = $this->m_principalservidor->fm_cargardatosgenerales($cdocumento);
        $carraydatosgenerales= array('edocumento' => '', 'enombre1' =>'','enombre2' =>'',  'eapellido1' => '','eapellido2' => '','erol' => ''); 
         foreach ($cdatosgenerales as $cdatgen)
         {
             $carraydatosgenerales = array('edocumento' => $cdatgen -> documento, 'enombre1' => $cdatgen -> nombre1,
                                           'enombre2' => $cdatgen -> nombre2,'eapellido1' => $cdatgen -> apellido1,
                                           'eapellido2' => $cdatgen -> apellido2,'erol' => $cdatgen -> rol);
         }
        

        
       //Levantar vista     
        $titulo = 'Principalservidor'; // para el titulo de la vista en la pestaña
        $this->load->view('pages/' . $page,  array('titulo' => $titulo, 
                                                   'foot' => FOOTS, 
                                                   'head' => HEAD, 
                                                   'botonerag' => BOTONERAG, 
                                                   'botoneraa' => BOTONERAA,
                                                   'documento' => $cdocumento,                                                 
                                                   'crol' => $crol,
                                                   'disabledatrans' => $disabledatrans,
                                                   'cnombre1'=>$cnombre1,'capellido1'=>$capellido1
                                                   ));
        //Fin levantar vista
         
    }
    
   
    
    
    function fc_salir()
    {
        $this->session->sess_destroy();
    }
    
   
    
}