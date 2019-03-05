<?php

class M_evaluacionrefrigerio extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //esta funcion ejecuta el sp para cargar las ayudas de la pregunta
//    public function fm_ayudas()
//    {
//        $query = $this->db->query('call sp3ayudas("evaluacionrefrigerio");');//se coloca el codigo de la ayuda
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
    
    
     public function fm_busquedaevaluacionrefrigerio($mvbuscarfecha,$mvbuscaridrefrigerio,$mvestadorequerimiento,$cdocumento)
    {        
        $query = $this->db->query('call spbusquedaevaluacionrefrigerio("'.$mvbuscarfecha.'","'.$mvbuscaridrefrigerio.'", "'.$mvestadorequerimiento.'", "'.$cdocumento.'");');//se llama por procedimiento l almacenado
        $resultado = $query->result();
        $query->next_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;
    }
    

    //esta funcion ejecuta el sp para cargar los datos generales
    public function fm_cargardatosevaluacionrefrigerio($mdocumento)
    {
        $query = $this->db->query('call spcargardatosevaluacionrefrigerio("'.$mdocumento.'");');
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
//    public function fm_traerestadoevaluacionrefrigerio()
//    {
//        $query = $this->db->query('call sptraerestadoevaluacionrefrigerio();');
//        $resultado = $query->result();
//        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        return $resultado;        
//    }    
    
    
    //esta funcion actualiza
    public function fm_guardarevaluacionrefrigerio($mvidtransporte,$mvrespuestaevaluacion,$mvobservacionad)
    {
        $query =$this->db->query('call spguardarevaluacionrefrigerio('.$mvidtransporte.','.$mvrespuestaevaluacion.',"'.$mvobservacionad.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
       return $resultado;
    }    
//    
    
    
//     public function fm_guardarevaluacionrefrigerio($mvidtransporte,$mvrespuestaadmin,$mvobservacionad)
//    {
//        $this->db->query('call spguardarevaluacionrefrigerio('.$mvidtransporte.','.$mvrespuestaadmin.',"'.$mvobservacionad.'");');
//    } 
       
}      