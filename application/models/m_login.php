<?php

class M_login extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }



    //esta funcion se encargar de insertar a la base de datos, los datos enviados desde el controlador
   
    public function validarusuario($data)
    {
      $this->db->where('documento', $data['documento']);
      $this->db->where('contrasena',$data['contrasena']);
       $query = $this->db->get('t_usuarioprotocolo');
       
         if($query->num_rows() > 0)
         {
                $resultado = $query->result();
                $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
                $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
                return $resultado;

         }
         else
         {
             return FALSE;
         }
   }
    
}
       
     
    
   
