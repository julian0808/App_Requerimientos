<?php

class M_evaluacionfotocopia extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    //esta funcion ejecuta el sp para cargar las ayudas de la pregunta
//    public function fm_ayudas()
//    {
//        $query = $this->db->query('call sp3ayudas("evaluacionfotocopia");');//se coloca el codigo de la ayuda
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
    
    
     public function fm_busquedaevaluacionfotocopia($mvbuscarfecha,$mvbuscaridrefrigerio,$mvestadorequerimiento,$cdocumento)
    {        
        $query = $this->db->query('call spbusquedaevaluacionfotocopia("'.$mvbuscarfecha.'","'.$mvbuscaridrefrigerio.'", "'.$mvestadorequerimiento.'", "'.$cdocumento.'");');//se llama por procedimiento l almacenado
        $resultado = $query->result();
        $query->next_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); // Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        return $resultado;
    }
    

    //esta funcion ejecuta el sp para cargar los datos generales
    public function fm_cargardatosevaluacionfotocopia($mdocumento)
    {
        $query = $this->db->query('call spcargardatosevaluacionfotocopia("'.$mdocumento.'");');
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
//    public function fm_traerestadoevaluacionfotocopia()
//    {
//        $query = $this->db->query('call sptraerestadoevaluacionfotocopia();');
//        $resultado = $query->result();
//        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
//        return $resultado;        
//    }    
    
    
    //esta funcion actualiza
    public function fm_guardarevaluacionfotocopia($mvidfotocopia,$mvrespuestaevaluacion,$mvobservacionad)
    {
        $query =$this->db->query('call spguardarevaluacionfotocopia('.$mvidfotocopia.','.$mvrespuestaevaluacion.',"'.$mvobservacionad.'");');
        $resultado = $query->result();
        $query->next_result(); //NO SE TOCAN Estas dos funciones permiten realizar varias consultas en el mismo controlador.
        $query->free_result(); //NO SE TOCAN  Estas dos funciones permiten realizar varias consultas en el mismo controlador.
       return $resultado;
    }    
//    
    
       public function fm_cancelarfot($mvidfotocopia,$mvidrequeriiento,$mvidevaluacion,$mvidaprobado)
    {
        $this->db->query('call spcancelarfot('.$mvidfotocopia.','.$mvidrequeriiento.','.$mvidevaluacion.','.$mvidaprobado.');');
       
    } 
    
//     public function fm_guardarevaluacionfotocopia($mvidfotocopia,$mvrespuestaadmin,$mvobservacionad)
//    {
//        $this->db->query('call spguardarevaluacionfotocopia('.$mvidfotocopia.','.$mvrespuestaadmin.',"'.$mvobservacionad.'");');
//    } 
       
}      