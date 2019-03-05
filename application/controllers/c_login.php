<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct() {
        parent::__construct();



        $this->load->library('session');

        $this->load->helper('url');

        $this->load->model('m_login');
    }

    public function fc_login() //cuando se usa el ajax en la viste , le decimos que entre a esta funcion, para que reciba los parametros ewnviados desde la vista
    {
        //se crea un arreglo , en el cual enviaremos los datos recibidos desde la vista , por medio de la variable $data
            $data = array(
                'documento' => $this->input->get('documento'),
                'contrasena' => $this->input->get('contrasena')
            );

            $valusuarios = $this->m_login->validarusuario($data);//se crea la variable $valusuarios, para que vaya a la funcion validarusuario del modelo y se manda lo que se guardo en la variable $data

            if ($valusuarios) 
            {
                //se crea el arreglo en la variable $datossesion inicializandolo como vacios
                $datossesion =array('id' => '',
                                    'documento' => '',
                                    'nombre1' => '',
                                    'apellido1' => '',
                                    'rol' => '');

                foreach ($valusuarios as $valusuario)
                {
                    //aqui recorre todo el arreglo trayendo la informacion que viene desde la base dedatos y que es recibida en el modelo(t_usuariosprotocolo)
                    $datossesion =array('id' => $valusuario->id,
                                        'documento' => $valusuario->documento,
                                        'nombre1' => $valusuario->nombre1,
                                        'apellido1' => $valusuario->apellido1,
                                    	'rol' => $valusuario->rol);
                }        
                $this->session->set_userdata($datossesion);
                //si encuentra que es verdadero el carga un 1 en la vista , permitiendo que el boton ingresar nos direccione a la siguiente vista
                echo (1);
            } 
            else 
            {
                //si encuentra un 0 , quiere decir que es , falso. Es decir que el usuario y/o contraseña no es correcto,lo cual no permite ingresar al sistema
                echo (0);
            }
    }


    
    //esta funcion es la que me carga la vista v_login
        public function fc_vlogin($page = 'v_login') {

        if (!file_exists('application/views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }   
    
    $this->load->view('pages/' . $page,  array( 'foot' => FOOTS, 'head' => HEAD ));// esto me permite que en la vista se carguen las constantes creadas, en este caso el encabezado y el pie de pagina
}
}