<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  C_principalanalista extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('m_principalanalista');//carga el controlador modelo
    }

    //funcion encargada de llamar a la vista de la pagina 
    public function fc_principalanalista($page = 'v_principalanalista') {

        if (!file_exists('application/views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $mdocanalista = $this->session->userdata('documento');
        $datos = "";
        $lisestado = '<option value="">Todos</option>';
        //listar los estado de la visitas para las bisquedas
        $listarest = $this->m_principalanalista->fm_listarestado();

        foreach ($listarest as $valorestado)
        {
            
        $lisestado .=  '<option value="'.$valorestado->idestado.'">'.$valorestado->nombreestado.'</option>';
                       
        
        }        
        //fin
        $liscg = '<option value="">Todos</option>';
        //listar los cogestores
        $listarcgs = $this->m_principalanalista->fm_listarcgs($mdocanalista);

        foreach ($listarcgs as $valorcgs)
        {
            
        $liscg .=  '<option value="'.$valorcgs->idcobertura.'">'.$valorcgs->nombrecogestor.'</option>';
                       
        
        }        
        //finfm_listartotales

        $list = '';
        //listar los cogestores
        $listotales = $this->m_principalanalista->fm_listartotales($mdocanalista);

        foreach ($listotales as $listotal)
        {
            
        $list .=  '<p><strong>TOTALES POR ANALISTA</strong></p><p class=""><small>Total no efectivas: <strong>'.$listotal->noefe.'</strong></small></p>
                    <p class=""><small>Total efectivas: <strong>'.$listotal->efe.'</strong></small></p>
                    <p class=""><small>Total cerradas: <strong>'.$listotal->ce.'</strong></small></p>';
                       
        
        }        
        //fin        
        
        $titulo = 'Medellin Solidaria'; // para el titulo de la vista en la pestaña
        $this->load->view('pages/' . $page,  array('list' => $list, 'titulo' => $titulo, 'foot' => FOOTS, 'lisestado' => $lisestado, 'liscg' => $liscg, 'head2' => HEAD2, 'botonerag' => BOTONERAG, 'botoneraa' => BOTONERAA, 'datos'=> $datos, 'docanalista'=> $mdocanalista));
        //FIN LEVANTA LA VISTA
    }
    
    public function fc_totales()
    {
        $list = '';
        $mdocanalista = $this->session->userdata('documento');
        $listotales = $this->m_principalanalista->fm_listartotales($mdocanalista);

        foreach ($listotales as $listotal)
        {
            
        $list .=  '<p><strong>TOTALES POR ANALISTA</strong></p>
                   <p class=""><small>Total no efectivas: <strong>'.$listotal->noefe.'</strong></small></p>
                    <p class=""><small>Total efectivas: <strong>'.$listotal->efe.'</strong></small></p>
                    <p class=""><small>Total cerradas: <strong>'.$listotal->ce.'</strong></small></p>';
                       
        
        }        
        //fin        
        echo ($list);
    }


    public function fc_buscar()
    {
        $mdocanalista = $this->session->userdata('documento');
        $cbuscarco = $this->input->get('vbuscarco');
        $cbuscarfo = $this->input->get('vbuscarfo');
        $cbuscares = $this->input->get('vbuscares');

        $listartabla = $this->m_principalanalista->fm_listartabla($mdocanalista,$cbuscarco,$cbuscarfo,$cbuscares);
                
        $datos = '';
        $a = 0;//para saber el numero de l registro
        $b = 0;//el resultado del modulo para saber si es verde o blanco        
        foreach ($listartabla as $valor)
        {
        $cont= 0;
        ++$cont;
        ++$a;
        $b = $a % 2;
        //para colocar el color de la fila
        if($b === 1)
        {
            $colorfila = 'class="success text-uppercase"';
        }
        else
        {
            $colorfila = 'class="text-uppercase"';
        }            
        
        if($valor->estado == 1)
        {
            $cerrada = '<select class="form-control input-sm" id="estadovisita'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" name="estadovisita" onchange="mostaradjuntar('.$valor->idestadoestacion.$valor->folio.$valor->idestacion.')">'
                    . '<option value="1">CERRADA</option>'
                    . '<option value="2">EFECTIVA</option>'
                    . '<option value="3">NO EFECTIVA</option>'
                    . '</select>';
            
            $adjuntar = '<input type="text" class="form-control input-sm" style="display: none" placeholder="Adjuntar Archivo" name="linkadjuntar'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" id="linkadjuntar'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'">'
                    . '<button class="btn btn-success btn-sm" type="button" style="display: none" data-toggle="modal" data-target="#modalAddTracking" id="mod'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" onclick="pasarvalornomfolio('.$valor->idestadoestacion.$valor->folio.$valor->idestacion.');">
                                Adjuntar archivo
                       </button>';
            $btguardar = '<td><button type="button" id="guardar'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" class="btn btn-primary btn-sm" onclick="guardar('.$valor->folio.','.$valor->idestacion.','.$valor->idestadoestacion.','.$valor->idestadoestacion.$valor->folio.$valor->idestacion.')"> <span class="glyphicon glyphicon-ok"></span> - Guardar</button></td>';
            $observa = '<textarea class="form-control" rows="1" id="observacion'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" name="observacion'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'">'.$valor->observacion.'</textarea>';
            $femanual = '<input type="date"  class="form-control input-sm" id="fmanual'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" name="fmanual'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" value="">';
        }   
        else
        {
            $cerrada = $valor->nombreestado;
            
            
            //<a href="'.BASEURL.'resources/filesUploaded/'.$value->adjunto.'" class="btn btn-primary btn-sm" style="'.$veradjun.'" role="button">Adjunto</a>
            if($valor->dirarchivo == 'No Aplica')
            {
                $adjuntar = 'Sin Archivo adjunto';
            }
            else
            {
                $adjuntar = '<a href="'.DESCARGA.'/'.$valor->dirarchivo.'" class="btn btn-primary btn-sm" role="button">Ver Adjunto</a>';
            }
            
            $btguardar = '<td><span class="glyphicon glyphicon-thumbs-up"></span> - OK</td>';
            $observa = '<textarea class="form-control" rows="1" disabled="disabled" id="observacion'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" name="observacion'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'">'.$valor->observacion.'</textarea>';
            $femanual = $valor->fecharegistromanual;
        }
        
        if($valor->banderasincservidor == 1)
        {
            $sincabajo = 'SI';
        }
        else
        {
            $sincabajo = 'NO';
        }
            
        $datos .=  '<tr '.$colorfila.'>'
                    .'<td>'.$valor->folio.'<input style="display:none" type="text" id="folio'.$valor->folio.'" value="'.$valor->folio.'"></td>'
                    .'<td>'.$valor->nomestacion.'<input style="display:none" type="text" id="estacion'.$valor->idestacion.'" value="'.$valor->idestacion.'"></td>'
                    .'<td>'.$valor->nombrecogestor.'<input style="display:none" type="text" id="estadoestacion'.$valor->idestadoestacion.'" value="'.$valor->idestadoestacion.'"></td>'
                    .'<td>'.$valor->fecharegistro.'</td>'
                    .'<td>'.$femanual.'</td>'                
                    .'<td>'.$cerrada.'<input style="display:none" type="text" id="estadovisita'.$valor->idestadoestacion.$valor->folio.$valor->idestacion.'" value="'.$valor->estado.'"></td>'
                    .'<td>'.$adjuntar.'</td>'
                    .'<td>'.$observa.'</td>'                          
                    .$btguardar
                    .'<td>'.$sincabajo.'</td>'
                   .'</tr>';
                       
        
        }
            
        //fin traer una lista de valores        

        
        echo ($datos);
    }
    
    
     public function fc_guardar()
    {
        $cfolio = $this->input->get('vfolio');
        $cidestacion = $this->input->get('videstacion');
        $cidestadoestacion= $this->input->get('videstadoestacion');
        $cestadovisita = $this->input->get('vestadovisita');
        $cdirarchivo = $this->input->get('vlinkadjuntar');
        $cobservacion = $this->input->get('vobservacion');
        $cfmanual = $this->input->get('vfmanual');
        $this->m_principalanalista->fm_actualizarestadovisita($cestadovisita,$cdirarchivo,$cobservacion,$cidestadoestacion,$cfolio,$cidestacion,$cfmanual);
    }
    
  
    function fc_salir()
    {
        $this->session->sess_destroy();
    }
    
    
    } 
    
    

