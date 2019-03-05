<?php

class M_transporte extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
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

    //esta funcion ejecuta el sp para cargar los datos generales
    public function fm_cargardatostransporte($midtransporte)
    {
        $query = $this->db->query('call spcargardatostransporte('.$midtransporte.');');
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
    public function fm_traerestadotransporte()
    {
        $query = $this->db->query('call sptraerestadotransporte();');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;        
    }    
    
    
    //esta funcion actualiza
    public function fm_guardartransporte($mvdocumento,$mvfechast,$mvhorast,$mvlugarpst,$mvlugarlst,$mvcantidadpt,$mvestadot,$mvobservaciont)
    {
        $query =$this->db->query('call spguardartransporte('.$mvdocumento.',"'.$mvfechast.'","'.$mvhorast.'","'.$mvlugarpst.'","'.$mvlugarlst.'",'.$mvcantidadpt.','.$mvestadot.',"'.$mvobservaciont.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
       return $resultado;
    }    
    
       
}      