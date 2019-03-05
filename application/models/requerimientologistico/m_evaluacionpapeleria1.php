<?php

class M_evaluacionpapeleria extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //esta funcion ejecuta el sp para cargar las ayudas de la pregunta
//    public function fm_ayudas()
//    {
//        $query = $this->db->query('call sp3ayudas("evaluacionpapeleria");');//se coloca el codigo de la ayuda
//        $resultado = $query->result();
//        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        return $resultado;        
//    }
     public function fm_validarevaluacion($mdocumento)
    {
      $query = $this->db->query('call spvalidarevaluacionrequerimiento("'.$mdocumento.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;    
    }
    
    
     public function fm_cargardatosgenerales($mdocumento)
    {
        $query = $this->db->query('call sp3cargardatosgeneralesservidor("'.$mdocumento.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;        
    } 
    
    
     public function fm_busquedaevaluacionpapeleria($mvbuscarfecha,$mvbuscaridrefrigerio,$mvestadorequerimiento,$cdocumento)
    {        
        $query = $this->db->query('call spbusquedaevaluacionpapeleria("'.$mvbuscarfecha.'","'.$mvbuscaridrefrigerio.'", "'.$mvestadorequerimiento.'", "'.$cdocumento.'");');//se llama por procedimiento l almacenado
        $resultado = $query->result();
        $query->next_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;
    }
    

    //esta funcion ejecuta el sp para cargar los datos generales
    public function fm_cargardatosevaluacionpapeleria($mdocumento)
    {
        $query = $this->db->query('call spcargardatosevaluacionpapeleria("'.$mdocumento.'");');
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
//    public function fm_traerestadoevaluacionpapeleria()
//    {
//        $query = $this->db->query('call sptraerestadoevaluacionpapeleria();');
//        $resultado = $query->result();
//        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        return $resultado;        
//    }    
    
    
    //esta funcion actualiza
    public function fm_guardarevaluacionpapeleria($mvidpapeleria,$mvrespuestaevaluacion,$mvobservacionad)
    {
        $query =$this->db->query('call spguardarevaluacionpapeleria('.$mvidpapeleria.','.$mvrespuestaevaluacion.',"'.$mvobservacionad.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
       return $resultado;
    }    
//    
    
    
//     public function fm_guardarevaluacionpapeleria($mvidpapeleria,$mvrespuestaadmin,$mvobservacionad)
//    {
//        $this->db->query('call spguardarevaluacionpapeleria('.$mvidpapeleria.','.$mvrespuestaadmin.',"'.$mvobservacionad.'");');
//    } 
       
}      