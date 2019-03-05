<?php

class M_papeleriaadmin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //esta funcion ejecuta el sp para cargar las ayudas de la pregunta
//    public function fm_ayudas()
//    {
//        $query = $this->db->query('call sp3ayudas("papeleriaadmin");');//se coloca el codigo de la ayuda
//        $resultado = $query->result();
//        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        return $resultado;        
//    }
    
    
     public function fm_cargardatosgenerales($mdocumento)
    {
        $query = $this->db->query('call sp3cargardatosgeneralesservidor("'.$mdocumento.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;        
    } 
    
    
     public function fm_busquedapapeleriaadmin($mvbuscarfecha,$mvbuscaridrefrigerio,$mvestadorequerimiento)
    {        
        $query = $this->db->query('call spbusquedapapeleriaadmin("'.$mvbuscarfecha.'","'.$mvbuscaridrefrigerio.'", "'.$mvestadorequerimiento.'");');//se llama por procedimiento l almacenado
        $resultado = $query->result();
        $query->next_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;
    }
    

    //esta funcion ejecuta el sp para cargar los datos generales
    public function fm_cargardatospapeleriaadmin()
    {
        $query = $this->db->query('call spcargardatospapeleriaadmin();');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;        
    }  
    
    public function fm_cargarrol($mdocumento)
    {
        $query = $this->db->query('call sprol("'.$mdocumento.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;        
    }

    //esta funcion ejecuta el sp para cargar si ya tiene respuesta la pregunta
//    public function fm_traerestadopapeleriaadmin()
//    {
//        $query = $this->db->query('call sptraerestadopapeleriaadmin();');
//        $resultado = $query->result();
//        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        return $resultado;        
//    }    
    
    
    //esta funcion actualiza
    public function fm_guardarpapeleriaadmin($mvidpapeleria,$mvrespuestaadmin,$mvobservacionad)
    {
        $query =$this->db->query('call spguardarpapeleriaadmin('.$mvidpapeleria.','.$mvrespuestaadmin.',"'.$mvobservacionad.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
       return $resultado;
    }    
//    
    
    
//     public function fm_guardarpapeleriaadmin($mvidtransporte,$mvrespuestaadmin,$mvobservacionad)
//    {
//        $this->db->query('call spguardarpapeleriaadmin('.$mvidtransporte.','.$mvrespuestaadmin.',"'.$mvobservacionad.'");');
//    } 
       
}      