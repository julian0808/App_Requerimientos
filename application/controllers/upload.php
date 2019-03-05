<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	
        public function __construct() 
        {
                parent::__construct();     
		$this->load->helper(array('form', 'url'));

        }
    
	
	function index()
	{	
		$this->load->view('formulario_carga', array('error' => ' ' ));
	}
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|xlsx|docx|pdf';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('formulario_carga', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$this->load->view('upload_success', $data);
		}
	}	
}
