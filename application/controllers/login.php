<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/////////////// NUEVO LOGIN ///////////////////////////
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();



        $this->load->library('session');

        $this->load->helper('url');

        $this->load->model('Login_model');
    }

    public function loginService() {
        $data = array(
            'usuario' => $this->input->get('usuario'),
            'password' => $this->input->get('password')
        );
        $dataOwner = $this->Login_model->getLoginOwner($data);
        if ($dataOwner) {
            $this->session->set_userdata(array(
                'id' => $dataOwner->idusuario,
                'documento' => $dataOwner->docusuario,
                'invitacion' => $dataOwner->rolinvitacion,
                'desempeno' => $dataOwner->roldesempeno,
                'caso_externo' => $dataOwner->rolderivacioncasosext,
                'requerimiento_archivo' => $dataOwner->rolrequerimientosarchivo,
                'derivacion_casos' => $dataOwner->rolderivacioncasos,
                'papeleria' => $dataOwner->ppapeleria,
                'rolpeleria' => $dataOwner->rolpapeleria,
                'promocion_hogares' => $dataOwner->rolpromocionhogares,
                'calendario' => $dataOwner->pcalendarios,
                'soporte' => $dataOwner->psoporte,
                'evaluacion_lideres' => $dataOwner->rolevaluacionlideres,
                'requerimientos' => $dataOwner->prequerimientos,
                'rolrequerimientos' => $dataOwner->rolrequerimientos,
                'encuentros' => $dataOwner->rolencuentros,
                'pmsfa' => $dataOwner->rolmsfa,
                'inventario' => $dataOwner->pinventarios,
                'primer_nombre' => $dataOwner->nombre,
                'logros' => $dataOwner->plogros,
                'plan_de_busqueda' => $dataOwner->pplandebusqueda,
                'asignacion_cobertura' => $dataOwner->pasigcobertura,
                'biblioteca' => $dataOwner->pmetodologico,
                'encuestas' => $dataOwner->pencuestas,
                'atencion_sedes' => $dataOwner->patencionsedes,
                'cargo' => $dataOwner->cargo,
                'perfil' => $dataOwner->perfil,
                'proceso' => $dataOwner->proceso,
                'pglosario' => $dataOwner->pglosario,
                'pcarguearchivos' => $dataOwner->pcarguearchivos,
                'pinvestigacion' => $dataOwner->pinvestigacion,
                'ambitos' => $dataOwner->pambitos,
                'pcasosext' => $dataOwner->pcasosext,
                'peventos' => $dataOwner->peventos,
                'prequerimientostrf' => $dataOwner->prequerimientostrf,
                'rolrequerimientostrf' => $dataOwner->rolrequerimientostrf,
                'actualizacion_datos' => $dataOwner->pactualizardatos
            ));
            echo json_encode(array('OAUTH' => true));
        } else {
            echo json_encode(array('OAUTH' => false));
        }
    }

    public function closeSession() {
        $this->session->sess_destroy();
        $this->session->session_destroy(id);
        $this->session->unset_userdata('id');
        redirect('');
    }

}
