<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $titulo ?>  </title>
    <link rel="stylesheet" href="<?php echo BOOTSTRAP, 'css/bootstrap1.min.css'; ?>" >
    
    <meta http-equiv="Content-Language" content="es"/>
    <script language="javascript" type="text/javascript">
   function MakeStaticHeader(gridId, height, width, headerHeight, isFooter) {
       var tbl = document.getElementById(gridId);
       if (tbl) {
       var DivHR = document.getElementById('DivHeaderRow');
       var DivMC = document.getElementById('DivMainContent');
       var DivFR = document.getElementById('DivFooterRow');

       //*** Set divheaderRow Properties ****
       DivHR.style.height = headerHeight + 'px';
       DivHR.style.width = (parseInt(width) - 16) + 'px';
       DivHR.style.position = 'relative';
       DivHR.style.top = '0px';
       DivHR.style.zIndex = '10';
       DivHR.style.verticalAlign = 'top';

       //*** Set divMainContent Properties ****
       DivMC.style.width = width + 'px';
       DivMC.style.height = height + 'px';
       DivMC.style.position = 'relative';
       DivMC.style.top = -headerHeight + 'px';
       DivMC.style.zIndex = '1';

       //*** Set divFooterRow Properties ****
       DivFR.style.width = (parseInt(width) - 16) + 'px';
       DivFR.style.position = 'relative';
       DivFR.style.top = -headerHeight + 'px';
       DivFR.style.verticalAlign = 'top';
       DivFR.style.paddingtop = '2px';

       if (isFooter) {
        var tblfr = tbl.cloneNode(true);
        tblfr.removeChild(tblfr.getElementsByTagName('tbody')[0]);
        var tblBody = document.createElement('tbody');
        tblfr.style.width = '100%';
        tblfr.cellSpacing = "0";
        //*****In the case of Footer Row *******
        tblBody.appendChild(tbl.rows[tbl.rows.length - 1]);
        tblfr.appendChild(tblBody);
        DivFR.appendChild(tblfr);
        }
       //****Copy Header in divHeaderRow****
       //DivHR.appendChild(tbl.cloneNode(true));
    }
   }
   function OnScrollDiv(Scrollablediv) {
   document.getElementById('DivHeaderRow').scrollLeft = Scrollablediv.scrollLeft;
   document.getElementById('DivFooterRow').scrollLeft = Scrollablediv.scrollLeft;
   }
   </script>
    

</head>
<body>  

    <div class="container ">
        <!--head-->
        <?php echo($head); ?>
        <!-- fin head-->

        <!--para tener la variable de idvivienda-->
<!--        <input type="text" class="form-control input-sm" id="folio" name="folio"  style="display:none"   placeholder="folio" value="<?php echo($folio); ?>">-->
        <input type="text" class="form-control input-sm" style="display:none" id="rol" name="rol" placeholder="rol" value="<?php echo($crol); ?>">
        <input type="text" class="form-control input-sm" style="display:none" id="apellido" name="apellido" placeholder="apellido" value="<?php echo($carraydatosgenerales['eapellido1']); ?>">
<!--        <input type="text" class="form-control input-sm" id="idtransporteadmin" name="idtransporteadmin" style="display: none"     placeholder="rol" value="<?php echo($idtransporteadmin); ?>">-->
       
        <!--fin para imprimir el folio y llevarlo-->
<hr>
        <form class="form-group" name="formulario" id="formulario">

<!-- Inicio de barra navegacion dos -->

<div class="row">
<div class="btn-group">
  <button type="button" class="btn btn-danger">Transporte</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_transporte/fc_transporte?idtransporte=0">Solicitud Transporte</a>'; } else{echo '<a  href="../c_transporteadmin/fc_transporteadmin?idtransporteadmin=0">Administrar Trasporte</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluaciontransporte/fc_evaluaciontransporte?idevaluaciontransporte=0">Evaluacion Transporte</a>'; }  ?>   </li>
<!--    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>-->
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-danger">Refrigerio</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_refrigerio/fc_refrigerio?idrefrigerio=0">Solicitud Refrigerio</a>'; } else{echo '<a  href="../c_refrigerioadmin/fc_refrigerioadmin?idrefrigerioadmin=0">Administrar Refrigerio</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluacionrefrigerio/fc_evaluacionrefrigerio?idevaluacionrefrigerio=0">Evaluacion Refrigerio</a>'; }  ?>   </li>
    
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-danger">Fotocopia</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_fotocopia/fc_fotocopia?idfotocopia=0">Solicitud Fotocopia</a>'; } else{echo '<a  href="../c_fotocopiaadmin/fc_fotocopiaadmin?idfotocopiaadmin=0">Administrar Fotocopia</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluacionfotocopia/fc_evaluacionfotocopia?idevaluacionfotocopia=0">Evaluacion Fotocopia</a>'; }  ?>   </li>
    
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-danger">Papeleria</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_papeleria/fc_papeleria?idpapeleria=0">Solicitud Papeleria</a>'; } else{echo '<a  href="../c_papeleriaadmin/fc_papeleriaadmin?idpapeleriaadmin=0">Administrar Papeleria</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluacionpapeleria/fc_evaluacionpapeleria?idevaluacionpapeleria=0">Evaluacion Papeleria</a>'; }  ?>   </li>
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-danger">Salir</button>
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
     <li> <a id="salir" href="../../c_login/fc_vlogin" onclick="salir()" ><span class="icon-logout icons icon"></span> Salir </a></li>
    
  </ul>
</div>
</div>
<!-- fin barra navegacion -->
         
<div class="row">
    <div class="col-md-6 col-md-offset-4">
        <h1>Administrar de Transporte</h1>
    </div>
</div><br><br><br>
 <!-- inicio de informacion del usuario --> 
<div class="row">
    
    <div class="col-md-2">
        <label>Documento</label><br>
        <input type="text" class="form-control input-sm" id="documento" name="documento" style="display:none"  placeholder="documento" value="<?php echo $this->session->userdata('documento') ?>"><?php echo $this->session->userdata('documento') ?>
    </div>
    
    <div class="col-md-3">
        <label>Nombre</label><br>
        <input type="text" class="form-control input-sm" id="nomnbre" name="nomnbre" style="display:none"  placeholder="nomnbre" value="<?php echo $this->session->userdata('nombre1') ?>"><?php echo $this->session->userdata('nombre1') ?>
    </div>
    
     <div class="col-md-3">
        <label>Primer apellido</label><br>
        <input type="text" class="form-control input-sm" id="Apellido1" name="Apellido1" style="display:none"  placeholder="Apellido1" value="<?php  echo($carraydatosgenerales['eapellido1']); ?>"><?php  echo($carraydatosgenerales['eapellido1']); ?>
        
    </div>
    
    <div class="col-md-3">
        <label>Segundo apellido</label><br>
        <input type="text" class="form-control input-sm" id="Apellido1" name="Apellido1" style="display:none"  placeholder="Apellido1" value="<?php  echo($carraydatosgenerales['eapellido1']); ?>"><?php  echo($carraydatosgenerales['eapellido2']); ?>
        
    </div>
    
    
<!--    <div class="col-md-3">
        <label>rol</label><br>
        <input type="text" class="form-control input-sm" id="cargo" name="Apellido2" style="display:none"  placeholder="Apellido2" value="<?php echo $this->session->userdata('rol') ?>"><?php echo $this->session->userdata('rol')?>
        
    </div>-->
</div><br><br>
 <!-- fin de informacion del usuario --> 
<hr>
  <!-- inicio de datos a ingresar --> 
  
  <div class="row">
      <div class="col-md-offset-1 col-md-2">
          <input type="date" class="form-control input-sm" id="buscarfecha" onchange="deshabilitarbuscar()"  name="buscarfecha"  placeholder="buscar por fecha" value="">
      </div>
      
      <div class="col-md-2">
          <input type="text" class="form-control input-sm" id="buscaridtransporte" onchange="deshabilitarbuscar()" name="buscaridtransporte"  placeholder="DIGITE ID TRANSPORTE" value="">
      </div>
      
      <div id="estadorequerimientodiv" >    
              <div class="row col-md-3 ">
                  
                  <select class="form-control input-sm  " id="estadorequerimiento" onchange="deshabilitarbuscar()"  name="estadorequerimiento"  ><!-- onclick="filtrartabla();" onchange="deshabilitarbuscar()" -->
                                                      
                     <option value="">SELECCIONE</option>
                      <option value="1">CON RESPUESTA</option>
                      <option value="2">EVALUADO</option>
                      <option value="3">PENDIENTE</option>
                      <option value="4">CANCELADO</option>
                     
                     <!-- <option value="20">TODAS LAS DIMENSIONES</option>-->
                          
                  </select>
              </div>
          </div>
      
      <div class="col-md-3">
          <button class="btn btn-danger btn-sm" disabled="disabled" type="button" id="buscar" name="buscar"   onclick="filtrartabla();"><span class="glyphicon glyphicon-search" ></span> Buscar </button>
      </div> 
  </div><br><br><br><br>
  
  <div class="panel panel-default" style="width: 100%">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Todos los eventos
                            <div class="pull-right">
                                <div class="btn-group">
                                   
                                   
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
<!--                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Estado req</th>
                                                    <th>Nombre</th>
                                                    <th>Fecha transporte</th>
                                                    <th>Hora de transporte</th>
                                                    <th>Lugar salida</th>
                                                    <th>Lugar llegada</th>
                                                    <th>Cantidad Personas</th>
                                                    <th>Observacion</th>
                                                    <th>Fecha registro</th>
                                                    <th>Respuesta admin</th>
                                                    <th>Observacion Admin</th>
                                                    <th>Guardar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="datos" name="teventos">
                                                <?php echo ($datos) ?>
                                            </tbody>
                                        </table>-->
                                        
                                                                      <div class="form-group">
                       
                   
                   <div id="DivRoot" align="left">
                    <div style="overflow: hidden;" id="DivHeaderRow">
                      <table class="table table-bordered" id="tr24h2" style="table-layout: fixed">
                          <thead>
                              <tr class="success">
                                  <th style="width:100px;">Id Requerimiento</th>
                                  <th style="width:100px;">Estado </th>
                                  <th style="width:100px;">Nombre</th>
                                  <th style="width:100px;">Fecha Transporte</th>
                                  <th style="width:100px;">Hora de transporte</th>
                                  <th style="width:200px;">Lugar Salida</th>
                                  <th style="width:300px;">Lugar llegada</th>
                                  <th style="width:300px;">Cantidad Personas</th>
                                  <th style="width:130px;">Descargar</th>
                                  <th style="width:130px;">Observacion</th>
                                  <th style="width:150px;">Fecha registro</th>
                                  <th style="width:200px;">Respuesta admin</th>
                                  <th style="width:120px;">Observacion Admin</th>
                                  <th style="width:120px;">Guardar</th>
                                  
                                 
                                  
                                                                 
                              </tr>
                          </thead>
                    </table>
                  </div>

                   <div style="overflow:scroll;" onscroll="OnScrollDiv(this)" id="DivMainContent">
                     <table class="table table-bordered table-striped" name="tr24h" id="tr24h" style="table-layout: fixed">
                            <thead>
                              <tr class="success">
                                <th style="width:100px;">Id Requerimiento</th>
                                  <th style="width:100px;">Estado </th>
                                  <th style="width:100px;">Nombre</th>
                                  <th style="width:100px;">Fecha Transporte</th>
                                  <th style="width:100px;">Hora de transporte</th>
                                  <th style="width:200px;">Lugar Salida</th>
                                  <th style="width:300px;">Lugar llegada</th>
                                  <th style="width:300px;">Cantidad Personas</th>
                                  <th style="width:130px;">Descargar</th>
                                  <th style="width:130px;">Observacion</th>
                                  <th style="width:150px;">Fecha registro</th>
                                  <th style="width:200px;">Respuesta admin</th>
                                  <th style="width:120px;">Observacion Admin</th>
                                  <th style="width:120px;">Guardar</th>
                                  
                                  
                              </tr>
                          </thead>
                           <tbody id='datos'>
                      <?php echo($datos); ?>
                           </tbody>
                   </table>  
                   </div>
                   <div id="DivFooterRow" style="overflow:hidden">
                   </div>
                   </div>

           </div>
                                        
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

   <!-- fin de datos a ingresar -->
          

     

        </form>  

<div class="modal fade bs-example-modal-sm" id="modalsinco" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel"><img src="<?php echo IMAGEN, 'cargando.gif'; ?>" alt="Brand"> Buscando...</h4>
        </div>
        <div class="modal-body">
        
        Por favor no cierre este dialogo... hasta que salga el mensaje de finalizacion.
        </div>
    </div>
  </div>
</div>
    
    <!--Inicio Este es el footer NO TOCAR-->
    <?php echo($foot); ?>
    <!--fin del footer NO TOCAR-->
    </div>
    
    <!--Inicio de los enlaces-->
    <script src="<?php echo BOOTSTRAP, 'js/jquery-1.11.0.js' ?>"></script>
    <script src="<?php echo BOOTSTRAP, 'js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo BOOTSTRAP, 'js/jquery.bootstrap.wizard.js' ?>"></script>
    <script src="<?php echo BOOTSTRAP, 'js/prettify.js' ?>"></script>
    <script src="<?php echo JBOX, 'Source/jBox.min.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jsfechas.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jsmensajes.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jsvalidarcampos.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jsvalidarletrasnumeros.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jsbotones.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jscargardatos.js' ?>"></script>
    <script src="<?php echo JSPERFIL, 'jsenviarmail.js' ?>"></script>
    <link href="<?php echo JBOX, 'Source/jBox.css' ?>" rel="stylesheet">
    <!--Inicio de los enlaces-->
</body>

<script> 
///////////////////////////////////////Funciones que llaman al controlador para guardar y actualizar////////////////////////////////////////////////////////////////////////    

function salir()
   {
       
       $.ajax({
                          url: "fc_salir",
                          type: "GET",
                          data: {},
                      
                          dataType: "html",
                          success : function(obj){                      
                         
                          }
                        }); 
   }
   
   
   
   
         function filtrartabla()
        { mensajedesinco();
                        $.ajax({
                          url: "fc_filtrotabla",
                          type: "GET",
                          data: {
                          vbuscarfecha : $('#buscarfecha').val(),
                          vbuscaridtransporte : $('#buscaridtransporte').val(),
                          vestadorequerimiento : $('#estadorequerimiento').val()},
                          dataType: "html",
                          success : function(obj){
                          $('#datos').html(obj); 
                          terminasinco();
                          }
                        }); 
        }




function validarbolitasytextoformulario(div,campo)
{ //alert(div + ' juanpis ' + campo);
   if(($('#'+ campo).val() == '') )
   { 
       $('#' + div).addClass(' has-error');
   }
   else
   { 
       $('#' + div).removeClass('has-error');
   }
    validarguardartransporteadmin();
}


function validarguardartransporteadmin()
{
    if ($('#fechast').val() != '' && $('#horast').val() != '' && $('#lugarpst').val() != ''&& $('#lugarlst').val() != '' && $('#cantidadpt').val() != '' && $('#estadot').val() != '' )
        
    {
       $('#guardartransporteadmin').prop('disabled', false);
           
   }
   else
   {
       $('#guardartransporteadmin').prop('disabled', true);
      
   }
}



function fc_guardartransporteadmin(idtransporte)
{
    administrativomail(idtransporte, 'Transporte');
                        $.ajax({
                          url: "fc_guardartransporteadmin",
                          type: "GET",
                          data: {vidtransporte :  idtransporte,
                                 vrespuestaadmin : $('#respuestaadmin' + idtransporte).val(),
                                 vobservacionad : $('#observacionad' + idtransporte).val()
                                 },    
                          dataType: "html",
                          success : function(obj){   
                              //location.href = "../c_transporteadmin/fc_transporteadmin?idtransporteadmin="+ obj;
                          filtrartabla();
                          botonguardar();
                          }
                        });                    
 }


    $(document).ready(function()
    {
    
    
    MakeStaticHeader('tr24h', 300, 1100, 52, false);
    
    //NO TOCAR - voler a capitulos                
                $("#salir").click(function ()
                {
                    $.ajax({
                      url: "fc_salir",
                      success : function(obj)
                      {       //alert(obj);              
                        location.href = "../c_login/fc_vlogin";
                      }
                    }); 
                });
                //fin voler a capitulos
    
        

       

        
        $("#actualizar").click(function ()
        {
                        $.ajax({
                          url: "fc_actualizar",
                          type: "GET",
                          data: {vfolio : $('#folio').val(), vvalortransporteadmin : $('#valortransporteadmin').val()},    
                          dataType: "html",
                          success : function(obj){                      
                          botonactualizar();
                          }
                        });                   
        });
        




//para cargar variables capitulo, pregunta,encuestador,vivienda,barra
//control del boton ayuda




});
//

function mensajedesinco()
{
    $('#modalsinco').modal('show');
    $('#sinco').prop('disabled', true);
    $('#buscar').prop('disabled', true);
    $('#volv').prop('disabled', true);   
}

function terminasinco()
{
    
    $('#modalsinco').modal('hide');
    $('#sinco').prop('disabled', false);
    $('#buscar').prop('disabled', false);
    $('#volv').prop('disabled', false);   
}



function deshabilitarbuscar()
    {
        if(($('#buscarfecha').val() !== '') || ($('#buscaridtransporte').val() !=='') || ($('#estadorequerimiento').val() !=='') )
        {
            $('#buscar').prop('disabled',false);  
        }
        else
        {
            $('#buscar').prop('disabled',true);
          
        }
    }

</script>
</html>