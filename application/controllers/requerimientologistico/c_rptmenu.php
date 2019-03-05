<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_rptmenu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('m_rptmenu'); //carga el controlador modelo
        $this->load->model('m_usuariodatosgenerales'); //carga el controlador modelo
        $this->load->model('m_totalusuarios'); //carga el controlador modelo
        $this->load->model('m_historicoanthro'); //carga el controlador modelo
        if ($this->session->userdata('documento') == '') {
            redirect('/c_login/fc_vlogin');
        }
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_rptmenu($page = 'v_rptmenu') {

        if (!file_exists('application/views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        //INICIO TRAER DATOS DEL TITULAR
        $idusuario = $this->input->get('idusuario'); //tomamos el valor del idusuario que viene por get
        $idcita = $this->input->get('idcita');
        $datosusuario = $this->m_usuariodatosgenerales->fm_datosusuario($idusuario); //lo mandasmos a la funcion del modelo para verificar

        $tdatusuario = array('tidusuario' => '',
            'tdoc' => '',
            'tnombre' => '',
            'tfoto' => '');

        foreach ($datosusuario as $filausuario) {
            $tdatusuario = array('tidusuario' => $filausuario->idusuario,
                'tdoc' => $filausuario->documento,
                'tnombre' => $filausuario->nombre1 . ' ' . $filausuario->nombre2 . ' ' . $filausuario->apellido1 . ' ' . $filausuario->apellido2,
                'tfoto' => $filausuario->foto); //se guarda el resultado del ption value en la variable datos
        }
        //FIN TRAER DATOS DEL TITULAR     

        $listartabla = $this->m_rptmenu->fm_calcularrptmenu($idusuario);

        $datos1 = '';

        $a = 0; //para saber el numero de l registro
        $b = 0; //el resultado del modulo para saber si es verde o blanco
        foreach ($listartabla as $valor) {
            $cont = 0;
            ++$cont;
            ++$a;
            $b = $a % 2;

            if ($b === 1) {
                $colorfila = 'class="suscess text-uppercase"';
            } else {
                $colorfila = 'class="text-uppercase"';
            }

//        if ($cont >= $valor->idcita)
//            {
//               $id = $id + 1 ;
//            }

            $datos1 .= '<tr ' . $colorfila . ' id="trr42h">'
                    . '<td class="text-center">' . $valor->idcita . '</td>'
                    . '<td class="text-center">' . $valor->fechaingreso . '</td>'
                    . '<td class="text-center"><button type="button" id="edicion' . $valor->idcita . '" class="btn btn-success btn-xs glyphicon glyphicon-print" onclick="verinforpt(' . $valor->idusuario . ',' . $valor->idcita . ')"><label>&nbsp;Imprimir</label></button></td>'
                    . '</tr>';
        }

        //fin validar si el idusuario existe
        //ESTO LEVANTA LA VISTA     
        $titulo = 'v_rptmenu'; // para el titulo de la vista en la pestaña
        $this->load->view('pages/' . $page, array('titulo' => $titulo, 'foot' => FOOTS, 'head' => HEADTRES, 'botoneracitas1' => BOTONERACITAS1, 'botoneracitas2' => BOTONERACITAS2, 'idusuario' => $idusuario, 'idcita' => $idcita, 'tdatusuario' => $tdatusuario, 'datos1' => $datos1));
        //FIN LEVANTA LA VISTA         
    }

    public function pdf_rpt() {
        $this->load->library('cezpdf');
        $this->load->helper('pdf_helper');
        prep_pdf();
        //INICIO TRAER DATOS DEL TITULAR
        $idusuario = $this->input->get('idusuario'); //tomamos el valor del idusuario que viene por get
        $idcita = $this->input->get('idcita');
        $datosusuario = $this->m_usuariodatosgenerales->fm_datosusuario($idusuario); //lo mandasmos a la funcion del modelo para verificar

        $tdatusuario = array('tidusuario' => '',
            'tdoc' => '',
            'tnombre' => '',
            'tfoto' => '');

        foreach ($datosusuario as $filausuario) {
            $tdatusuario = array('tidusuario' => $filausuario->idusuario,
                'tdoc' => $filausuario->documento,
                'tnombre' => $filausuario->nombre1 . ' ' . $filausuario->nombre2 . ' ' . $filausuario->apellido1 . ' ' . $filausuario->apellido2,
                'tfoto' => $filausuario->foto); //se guarda el resultado del ption value en la variable datos
        }
        //FIN TRAER DATOS DEL TITULAR    

        $anthroexiste = $this->m_historicoanthro->fm_anthroexiste($idusuario, $idcita); //lo mandasmos a la funcion del modelo para verificar
        //ACA USTEDES SI TOCAN - COLOCAN EL NOMBRE DE LAS VARIABLES idresc9mp1 - idresc9mp4a - idresc9mp4b - idresc9mp4c
        $eanthroexiste = array('edatevisit' => '', 'epwt' => '', 'elnht' => '', 'ehc' => '', 'emuac' => '', 'essf' => '', 'etsf' => '', 'ebsf' => '', 'eisf' => '', 'epsf' => '', 'emmsf' => '', 'esesf' => '',
            'ewhz' => '', 'ewaz' => '', 'ehaz' => '', 'ebaz' => '', 'ehcz' => '', 'emuacz' => '', 'etsfz' => '', 'essfz' => '', 'eadp' => '', 'emsexual' => '', 'ecsexual' => '', 'ecc' => '', 'eafisica' => '',
            'epgwt' => '', 'esgesta' => '', 'eclwhz' => '', 'eclhcz' => '', 'eclwaz' => '', 'eclhaz' => '', 'eclbaz' => '', 'eimc' => '', 'eclasf2' => '', 'eclcc' => '', 'eimcpg' => '', 'eclimcpg' => '', 'egpxs' => '',
            'egptot' => '', 'eimccl' => '', 'egrasa' => '', 'eedad' => '', 'eestado' => '');

        foreach ($anthroexiste as $fila) {
            //USTEDES SI TOCAN - LO VERDE LO COLCAN COMO ESTA EN LA TABLA DE LA BD
            $eanthroexiste = array('edatevisit' => $fila->datevisit, 'epwt' => $fila->peso, 'elnht' => $fila->lt, 'ehc' => $fila->pc, 'emuac' => $fila->ppmb, 'essf' => $fila->pss, 'etsf' => $fila->ptr,
                'ebsf' => $fila->pbc, 'eisf' => $fila->pic, 'epsf' => $fila->ppt, 'emmsf' => $fila->pmm, 'esesf' => $fila->pse, 'ewhz' => $fila->ptz, 'ewaz' => $fila->zpe, 'ehaz' => $fila->zte,
                'ebaz' => $fila->zimce, 'ehcz' => $fila->pcz, 'emuacz' => $fila->ppmbz, 'etsfz' => $fila->ptrz, 'essfz' => $fila->pssz, 'eadp' => $fila->adp, 'emsexual' => $fila->msexual,
                'ecsexual' => $fila->csexual, 'ecc' => $fila->cc, 'eafisica' => $fila->afisica, 'epgwt' => $fila->pgwt, 'esgesta' => $fila->sgesta, 'eclwhz' => $fila->clwhz, 'eclhcz' => $fila->clhcz,
                'eclwaz' => $fila->clwaz, 'eclhaz' => $fila->clhaz, 'eclbaz' => $fila->clbaz, 'eimc' => $fila->imc, 'eclasf2' => $fila->clasf, 'eclcc' => $fila->clcc, 'eimcpg' => $fila->imcpg, 'eclimcpg' => $fila->climcpg,
                'egpxs' => $fila->gpxs, 'egptot' => $fila->gptot, 'eimccl' => $fila->imccl, 'egrasa' => $fila->grasa, 'eedad' => $fila->edad, 'eestado' => $fila->estado);
        }


        $this->cezpdf->ezText('Control Nutricional', 18, array('justification' => 'center'));
        $this->cezpdf->ezSetDy(-10);
        $this->cezpdf->ezText('Fecha de visita: ' . $eanthroexiste['edatevisit'], 12, array('justification' => 'left'));
        $this->cezpdf->ezText('Usuario: ' . $tdatusuario['tnombre'], 12, array('justification' => 'left'));
        $this->cezpdf->ezSetDy(-10);
//       $this->cezpdf->ezSetDy(-10);



        if (($eanthroexiste['eedad'] >= 18) && ($eanthroexiste['eestado'] !== "embarazada")) {

            $db_data[] = array('parametro' => 'Peso actual (kg)', 'dato' => $eanthroexiste['epwt'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Estatura (cm)', 'dato' => $eanthroexiste['elnht'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Circunferencia cintura (cm)', 'dato' => $eanthroexiste['ecc'], 'clasf' => utf8_decode($eanthroexiste['eclcc']));
            $db_data[] = array('parametro' => 'IMC (Kg/m2)', 'dato' => $eanthroexiste['eimc'], 'clasf' => utf8_decode($eanthroexiste['eimccl']));
            $db_data[] = array('parametro' => 'Pliegue subescapular (mm)', 'dato' => $eanthroexiste['essf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue tricipital (mm)', 'dato' => $eanthroexiste['etsf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue bicipital (mm)', 'dato' => $eanthroexiste['ebsf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue ileocrestal (mm)', 'dato' => $eanthroexiste['eisf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue pectoral (mm)', 'dato' => $eanthroexiste['epsf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue muslo medio (mm)', 'dato' => $eanthroexiste['emmsf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue supraespinal (mm)', 'dato' => $eanthroexiste['esesf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Adiposidad (%)', 'dato' => $eanthroexiste['egrasa'], 'clasf' => utf8_decode($eanthroexiste['eclasf2']));
            $col_names = array(
                'parametro' => utf8_decode('Parámetro'),
                'dato' => 'Dato',
                'clasf' => utf8_decode('Clasificación')
            );
            $this->cezpdf->ezTable($db_data, $col_names, utf8_decode('Resultados Antropométricos'), array('width' => 500));
            $this->cezpdf->ezStream();
        }

        if ($eanthroexiste['eestado'] == "embarazada") {

            $db_data[] = array('parametro' => utf8_decode('Semanas de gestación'), 'dato' => $eanthroexiste['esgesta'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Peso pregestacional (kg)', 'dato' => $eanthroexiste['epgwt'], 'clasf' => utf8_decode($eanthroexiste['eclcc']));
            $db_data[] = array('parametro' => 'Peso actual (kg)', 'dato' => $eanthroexiste['epwt'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Estatura (cm)', 'dato' => $eanthroexiste['elnht'], 'clasf' => '');
            $db_data[] = array('parametro' => 'IMC Pregestacional(Kg/m2)', 'dato' => $eanthroexiste['eimcpg'], 'clasf' => utf8_decode($eanthroexiste['eclimcpg']));
            $db_data[] = array('parametro' => 'Ganancia peso semana (gr)', 'dato' => $eanthroexiste['egpxs'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Ganancia peso total (kg)', 'dato' => $eanthroexiste['egptot'], 'clasf' => '');
            $db_data[] = array('parametro' => 'IMC (Kg/m2)', 'dato' => $eanthroexiste['eimc'], 'clasf' => utf8_decode($eanthroexiste['eclbaz']));
            $col_names = array(
                'parametro' => utf8_decode('Parámetro'),
                'dato' => 'Dato',
                'clasf' => utf8_decode('Clasificación')
            );
            $this->cezpdf->ezTable($db_data, $col_names, utf8_decode('Resultados Antropométricos'), array('width' => 500));
            $this->cezpdf->ezSetDy(-10);
            $this->cezpdf->ezStream();
        }

        if (($eanthroexiste['eedad'] < 6) && ($eanthroexiste['eestado'] !== "embarazada")) {

            $db_data[] = array('parametro' => 'Peso actual (kg)', 'dato' => $eanthroexiste['epwt'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Estatura (cm)', 'dato' => $eanthroexiste['elnht'], 'clasf' => '');
            $db_data[] = array('parametro' => utf8_decode('Perímetro cefálico (cm)'), 'dato' => $eanthroexiste['ehc'], 'clasf' => '');
            $db_data[] = array('parametro' => utf8_decode('Perímetro del brazo (cm)'), 'dato' => $eanthroexiste['emuac'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue subescapular (mm)', 'dato' => $eanthroexiste['essf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue tricipital (mm)', 'dato' => $eanthroexiste['etsf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Peso/Longitud (puntaje Z)', 'dato' => $eanthroexiste['ewhz'], 'clasf' => utf8_decode($eanthroexiste['eclwhz']));
            $db_data[] = array('parametro' => 'Peso/Edad (puntaje Z)', 'dato' => $eanthroexiste['ewaz'], 'clasf' => utf8_decode($eanthroexiste['eclwaz']));
            $db_data[] = array('parametro' => 'Longitud/Edad (puntaje Z)', 'dato' => $eanthroexiste['ehaz'], 'clasf' => utf8_decode($eanthroexiste['eclhaz']));
            $db_data[] = array('parametro' => 'IMC (puntaje Z)', 'dato' => $eanthroexiste['ebaz'], 'clasf' => utf8_decode($eanthroexiste['eclbaz']));
            $db_data[] = array('parametro' => utf8_decode('Perímetro cefálico/Edad (puntaje Z)'), 'dato' => $eanthroexiste['ehcz'], 'clasf' => utf8_decode($eanthroexiste['eclhcz']));
            $col_names = array(
                'parametro' => utf8_decode('Parámetro'),
                'dato' => 'Dato',
                'clasf' => utf8_decode('Clasificación')
            );
            $this->cezpdf->ezTable($db_data, $col_names, utf8_decode('Resultados Antropométricos'), array('width' => 500));
            $this->cezpdf->ezStream();
        }

        if (($eanthroexiste['eedad'] >= 6) && ($eanthroexiste['eedad'] <= 17) && ($eanthroexiste['eestado'] !== "embarazada")) {

            $db_data[] = array('parametro' => 'Peso actual (kg)', 'dato' => $eanthroexiste['epwt'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Estatura (cm)', 'dato' => $eanthroexiste['elnht'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue subescapular (mm)', 'dato' => $eanthroexiste['essf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Pliegue tricipital (mm)', 'dato' => $eanthroexiste['etsf'], 'clasf' => '');
            $db_data[] = array('parametro' => 'Peso/Edad (puntaje Z)', 'dato' => $eanthroexiste['ewaz'], 'clasf' => utf8_decode($eanthroexiste['eclwaz']));
            $db_data[] = array('parametro' => 'Longitud/Edad (puntaje Z)', 'dato' => $eanthroexiste['ehaz'], 'clasf' => utf8_decode($eanthroexiste['eclhaz']));
            $db_data[] = array('parametro' => 'IMC (puntaje Z)', 'dato' => $eanthroexiste['ebaz'], 'clasf' => utf8_decode($eanthroexiste['eclbaz']));
            $db_data[] = array('parametro' => utf8_decode('Adiposidad'), 'dato' => $eanthroexiste['eadp'], 'clasf' => utf8_decode($eanthroexiste['eclasf2']));
            $col_names = array(
                'parametro' => utf8_decode('Parámetro'),
                'dato' => 'Dato',
                'clasf' => utf8_decode('Clasificación')
            );
            $this->cezpdf->ezTable($db_data, $col_names, utf8_decode('Resultados Antropométricos'), array('width' => 500));
            $this->cezpdf->ezStream();
        }

        $minutaexiste = $this->m_rptmenu->fm_minutaexiste($idusuario, $idcita); //lo mandasmos a la funcion del modelo para verificar
        //ACA USTEDES SI TOCAN - COLOCAN EL NOMBRE DE LAS VARIABLES idresc9mp1 - idresc9mp4a - idresc9mp4b - idresc9mp4c
        $eminutaexiste = array('egrupoalimento' => '', 'eporcion' => '', 'eadesayuno' => '', 'edesayuno' => '', 'eentreda' => '', 'ealmuerzo' => '', 'eentreac' => '', 'ecomida' => '', 'emerienda' => '');

        foreach ($minutaexiste as $fila) {
            //USTEDES SI TOCAN - LO VERDE LO COLCAN COMO ESTA EN LA TABLA DE LA BD
            $eminutaexiste = array('egrupoalimento' => $fila->grupoalimento, 'eporcion' => $fila->cantidad, 'eadesayuno' => $fila->adesayuno, 'edesayuno' => $fila->desayuno, 'eentreda' => $fila->entreda, 'ealmuerzo' => $fila->almuerzo,
                'eentreac' => $fila->entreac, 'ecomida' => $fila->comida, 'emerienda' => $fila->merienda);

            $db_data1[] = array('grupoa' =>utf8_decode ($eminutaexiste['egrupoalimento']), 'totp' =>utf8_decode ($eminutaexiste['eporcion']), 'antesd' =>utf8_decode ($eminutaexiste['eadesayuno']), 'desayuno' =>utf8_decode ($eminutaexiste['edesayuno']), 'entreda' =>utf8_decode ($eminutaexiste['eentreda']), 'almuerzo' =>utf8_decode ($eminutaexiste['ealmuerzo']), 'entreac' =>utf8_decode ($eminutaexiste['eentreac']), 'cena' =>utf8_decode ($eminutaexiste['ecomida']), 'merienda' =>utf8_decode ($eminutaexiste['emerienda']));
        }


        $col_names1 = array(
            'totp' => utf8_decode('Porción '),
            'grupoa' => 'Grupo alimentos',
            'antesd' => 'ADY',
            'desayuno' => 'DY',
            'entreda' => 'EDYA',
            'almuerzo' => 'AL',
            'entreac' => 'EAYC',
            'cena' => 'CN',
            'merienda' => 'MD',
        );

        $this->cezpdf->ezSetDy(-10);
        $this->cezpdf->ezTable($db_data1, $col_names1, utf8_decode('Minuta patrón'), array('width' => 550));
        $this->cezpdf->ezSetDy(-10);
        $this->cezpdf->ezText('ADY: Antes del desayuno', 12, array('justification' => 'left'));
        $this->cezpdf->ezText('DY: Desayuno', 12, array('justification' => 'left'));
        $this->cezpdf->ezText('EDYA: Entre desayuno y almuerzo', 12, array('justification' => 'left'));
        $this->cezpdf->ezText('AL: Almuerzo', 12, array('justification' => 'left'));
        $this->cezpdf->ezText('EAYC: Entre almuerzo y cena', 12, array('justification' => 'left'));
        $this->cezpdf->ezText('CN: Cena', 12, array('justification' => 'left'));
        $this->cezpdf->ezText('MD: Merienda', 12, array('justification' => 'left'));
        $this->cezpdf->ezStream();
    }

}
