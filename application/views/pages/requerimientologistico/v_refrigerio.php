<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $titulo ?>  </title>
    <link rel="stylesheet" href="<?php echo BOOTSTRAP, 'css/bootstrap.min.css'; ?>" >
    
    <meta http-equiv="Content-Language" content="es"/>
       <link rel="stylesheet" href="<?php echo(JQUERYUPLOAD11 . '/css/jquery.fileupload.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(JQUERYUPLOAD11 . '/css/jquery.fileupload-ui.css'); ?>" /> 
    

</head>
<body>  

    <div class="container ">
        <!--head-->
        <?php echo($head); ?>
        <!-- fin head-->

        <!--para tener la variable de idvivienda-->
<!--        <input type="text" class="form-control input-sm" id="folio" name="folio"  style="display:none"   placeholder="folio" value="<?php echo($folio); ?>">-->

<!--        <input type="text" class="form-control input-sm" id="idrefrigerio" name="idrefrigerio" style="display: none"     placeholder="rol" value="<?php echo($idrefrigerio); ?>">-->
       <input type="text" class="form-control input-sm" style="display:none"  id="rol" name="rol" placeholder="rol" value="<?php echo($crol); ?>">
        <!--fin para imprimir el folio y llevarlo-->
<hr>

<div class="row">
    <div class="col-md-7 col-md-offset-4">
        <h1>Solicitud de Refrigerio</h1>
    </div>
</div><br>
        <form class="form-group" name="formulario" id="formulario">

<!-- Inicio de barra navegacion dos -->

<div class="row">
<div class="btn-group">
  <button type="button" class="btn btn-primary">Transporte</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_transporte/fc_transporte?idtransporte=0">Solicitud Transporte</a>'; } else{echo '<a  href="../c_transporteadmin/fc_transporteadmin?idtransporteadmin=0">Administrar Trasporte</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluaciontransporte/fc_evaluaciontransporte?idevaluaciontransporte=0">Evaluacion Transporte</a>'; }  ?>   </li>
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-primary">Refrigerio</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_refrigerio/fc_refrigerio?idrefrigerio=0">Solicitud Refrigerio</a>'; } else{echo '<a  href="../c_refrigerioadmin/fc_refrigerioadmin?idrefrigerioadmin=0">Administrar Refrigerio</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluacionrefrigerio/fc_evaluacionrefrigerio?idevaluacionrefrigerio=0">Evaluacion Refrigerio</a>'; }  ?>   </li>
    
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-primary">Fotocopia</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_fotocopia/fc_fotocopia?idfotocopia=0">Solicitud Fotocopia</a>'; } else{echo '<a  href="../c_fotocopiaadmin/fc_fotocopiaadmin?idfotocopiaadmin=0">Administrar Fotocopia</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluacionfotocopia/fc_evaluacionfotocopia?idevaluacionfotocopia=0">Evaluacion Fotocopia</a>'; }  ?>   </li>
    
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-primary">Papeleria</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_papeleria/fc_papeleria?idpapeleria=0">Solicitud Papeleria</a>'; } else{echo '<a  href="../c_papeleriaadmin/fc_papeleriaadmin?idpapeleriaadmin=0">Administrar Papeleria</a>';}  ?>   </li>
    <li> <?php if($crol <> 'adminlogistico') { echo '<a  href="../c_evaluacionpapeleria/fc_evaluacionpapeleria?idevaluacionpapeleria=0">Evaluacion Papeleria</a>'; }  ?>   </li>
  </ul>
</div>
    
    <div class="btn-group">
  <button type="button" class="btn btn-primary">Salir</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li> <a id="salir" href="../../c_login/fc_vlogin" onclick="salir()" ><span class="icon-logout icons icon"></span> Salir </a></li>
    
  </ul>
</div>
</div><br>
<!-- fin barra navegacion -->
         

 <!-- inicio de informacion del usuario --> 
 
 <div class="col-md-2 ">
        <label>id refrigerio</label><br>
        <input type="text" class="form-control input-sm" id="idrefrigerio" name="idrefrigerio" style="display:none"  placeholder="idrefrigerio" value="<?php echo($idrefrigerio); ?>"><?php echo($idrefrigerio); ?>
    </div>
 
    <div class="col-md-2">
        <label>Documento</label><br>
        <input type="text" class="form-control input-sm" id="documento" name="documento" style="display:none"  placeholder="documento" value="<?php echo $this->session->userdata('documento') ?>"><?php echo $this->session->userdata('documento') ?>
    </div>
    
    <div class="col-md-3">
        <label>Nombre</label><br>
        <input type="text" class="form-control input-sm" id="nomnbre" name="nomnbre" style="display:none"  placeholder="nomnbre" value="<?php echo $this->session->userdata('nombre1') ?>"><?php echo $this->session->userdata('nombre1') ?>
    </div>
    
     <div class="col-md-2">
        <label>Primer apellido</label><br>
        <input type="text" class="form-control input-sm" id="Apellido1" name="Apellido1" style="display:none"  placeholder="Apellido1" value="<?php  echo($carraydatosgenerales['eapellido1']); ?>"><?php  echo($carraydatosgenerales['eapellido1']); ?>
        
    </div>
    
    <div class="col-md-3">
        <label>Segundo apellido</label><br>
        <input type="text" class="form-control input-sm" id="Apellido1" name="Apellido1" style="display:none"  placeholder="Apellido1" value="<?php  echo($carraydatosgenerales['eapellido1']); ?>"><?php  echo($carraydatosgenerales['eapellido2']); ?>
        
    </div><br><br><br><hr>
 <!-- fin de informacion del usuario --> 

  <!-- inicio de datos a ingresar --> 
<div class="row col-md-offset-2">
    
     <div id="fechasrdiv" <?php if($carraydatosrefrigerio['fechar']==''){echo('class="col-md-2 has-error"');}else{echo('class="col-md-2"');} ?>>
         <label class="control-label">Fecha del servicio</label><br>
         <input type="date" class="form-control input-sm" id="fechasr" name="fechasr" onchange="validarbolitasytextoformulario('fechasrdiv','fechasr')"  onkeyup="eliminardigito()" placeholder="fechasr" value="<?php  echo($carraydatosrefrigerio['fechar']); ?>">
    </div>
    
    <div id="horasrdiv" <?php if($carraydatosrefrigerio['horar']==''){echo('class="col-md-2 has-error"');}else{echo('class="col-md-2"');} ?>>
        <label class="control-label">Hora del servicio</label><br>
        <input type="time" class="form-control input-sm" id="horasr" name="horasr" onchange="validarbolitasytextoformulario('horasrdiv','horasr')"   placeholder="horasr" value="<?php  echo($carraydatosrefrigerio['horar']); ?>">
    </div>
    
    
    
    <div id="lugarlsrdiv" <?php if($carraydatosrefrigerio['lugarrefrigerio']==''){echo('class="col-md-3 has-error"');}else{echo('class="col-md-3"');} ?>>
        <label class="control-label">Lugar Refrigerio</label><br>
        <input type="text" class="form-control input-sm" id="lugarlsr" onkeypress="return soloLetras(event)" name="lugarlsr" onchange="validarbolitasytextoformulario('lugarlsrdiv','lugarlsr')"   placeholder="Digite lugar de Llegada" value="<?php  echo($carraydatosrefrigerio['lugarrefrigerio']); ?>">
    </div>
    
    <div id="lugarpsrdiv" <?php if($carraydatosrefrigerio['cantidadr']==''){echo('class="col-md-2 has-error"');}else{echo('class="col-md-2"');} ?>>
        <label class="control-label">Cantidad</label><br>
        <input type="text" class="form-control input-sm" id="cantidadpr" onkeypress="return soloNumeros(event)" name="cantidadpr" onchange="validarbolitasytextoformulario('lugarpsrdiv','lugarpsr')"  placeholder="digite la cantidad" value="<?php  echo($carraydatosrefrigerio['cantidadr']); ?>">
    </div>
<!--    <div id="cantidadprdiv" <?php if($carraydatosrefrigerio['tiporefrigerio']==''){echo('class="col-md-2 has-error"');}else{echo('class="col-md-2"');} ?>>
        <label class="control-label">Refrigerio o Papeleria</label><br>
        <input type="text" class="form-control input-sm" id="tiporefrigerio" onkeypress="return soloLetras(event)" name="tiporefrigerio" onchange="validarbolitasytextoformulario('cantidadprdiv','cantidadpr')"   placeholder="Refrigerio o Papeleria" value="<?php  echo($carraydatosrefrigerio['tiporefrigerio']); ?>">
    </div>-->
    
</div>  <br><br>
    
                
        
                   
    
 <div class="container-fluid text-center ">
                               <div class="row">
                                   <div class="form-group  ">  

                                       <!--                    inicio adjuntar- el boton llama el modal-->
                                       <div id="adfil" class="form-group has-error">
                                           <label for="nameFile" class="col-sm-2 control-label">Archivo Adjunto</label>
                                           <div class="col-sm-7">
                                               <input type="text" class="form-control"  id="nameFile" placeholder="No hay archivo adjunto" disabled >
                                           </div>
                                       </div><br><br><br>
                                       <div class="form-group">
                                           <div class="col-sm-offset-0 col-sm-10">
                                               <button  class="btn btn-success" type="button" data-toggle="modal" data-target="#modalAddTracking" id="mod">
                                                   Adjuntar archivo
                                               </button>
                                           </div>
                                       </div>

                                       <!--                    fin adjuntar--> 

                                   </div>
                               </div>
                           </div><br><br>
  
<div id="observacionrdiv" class="row " >
      
          <label class="col-md-offset-5 control-label">Observacion</label><br>
          <textarea class="form-control" id="observacionr" onchange="validarbolitasytextoformulario('observacionrdiv','observacionr')" name="observacionr" rows="4"><?php  echo($carraydatosrefrigerio['observacionr']); ?></textarea>              
     
</div><br><br>

<div class="row">
    <div class="col-md-2 col-md-offset-5">
       <button type="button" id="guardarrefrigerio" disabled="disabled"  name="guardarrefrigerio" class="btn btn-primary">Guardar</button>
 <!--<p>Señor usuario en el momento la pagina no se encuentra disponible para crear un nuevo requerimiento logistico, por favor evaluar los pendientes</p>-->
    </div>
</div>
   <!-- fin de datos a ingresar -->
          

     

        </form>  
    
    <!--Inicio Este es el footer NO TOCAR-->
    <?php echo($foot); ?>
    <!--fin del footer NO TOCAR-->
    
    
    
 
    
 

   <!-- Modal -->
<div class="modal fade" id="modalAddTracking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Adjuntar archivo</h4>
      </div>
      <div class="modal-body">
          
          <div>
              <form id="fileUploadFileTacking" name="fileUploadFileTacking" action="" method="POST" enctype="multipart/form-data">
                      <span class="btn-addFiles fileinput-button btn btn-primary fileinput-button">
                          <i class="fa fa-camera"></i>
                          <span>Seleccionar y cargar</span>
                          <input type="file" name="files[]" multiple>
                      </span><br /><br />
                      <p id="noFile"></p>
                      <div id="progressBarUploadFile" class="progress progress-striped">
                          <div class="progress-bar"  role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
                              <span class="sr-only">5% Complete</span>
                          </div>
                      </div>
            </form>
          </div>
          
      </div>
      <!--
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      -->
    </div>
  </div>
</div>                    <!--fin modal-->
    
    
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
    <link href="<?php echo JBOX, 'Source/jBox.css' ?>" rel="stylesheet">
    <script src="<?php echo (JQUERYUPLOAD11 . '/js/vendor/jquery.ui.widget.js'); ?>"></script>
      <script src="<?php echo (JQUERYUPLOAD11 . '/js/jquery.fileupload.js'); ?>"></script>
    <script src="<?php echo (JQUERYUPLOAD11 . '/js/jquery.fileupload-process.js'); ?>"></script>
    <script src="<?php echo (JQUERYUPLOAD11 . '/js/jquery.fileupload-validate.js'); ?>"></script>
    <script src="<?php echo (JQUERYUPLOAD11 . '/js/jquery.fileupload-ui.js'); ?>"></script>
    <!--Inicio de los enlaces-->
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
   
   function uploadFileTracking ()
   {
       //alert('juanpis');
       $('#fileUploadFileTacking').fileupload({
           url: '../uploadhandlerfile/index/',
           disableImageResize: false,
           maxFileSize: 50000000, //bytes 20mb!
           maxChunkSize: 50000000, //bytes 20mb!
           autoUpload: true,
           dataType: 'json',
           imageMinWidth: 180,
           imageMinHeight: 180,
           maxNumberOfFiles: 1,
           acceptFileTypes: /(\.|\/)(gif|jpe?g|png|pdf)$/i,
           add: function (e, data) {
               data.submit();
           },
           progressall: function (e, data) {
               var progress = parseInt(data.loaded / data.total * 100, 10);
               $('#progressBarUploadFile .progress-bar').css('width', progress + '%');
           },
           done: function (e, data) {
               if(data.result.files.length > 0){
                   var name = data.result.files[0].name;
                   var url = data.result.files[0].url;
                   nameFile = name;
                   pathFile = url;
                   //alert('Archivo Cargo Exitosamente!!!');
                   $('#nameFile').val(nameFile);
                   $('#noFile').html('Archivo Cargo Exitosamente!!!');
                  
                   //valiguardar();
                   //call ajax service
               }else{
                   //$.notific8('Error Subiendo la Foto', {life: 5000, horizontalEdge: "top", theme: "danger", heading: " Error 😞 "});
                   alert('Archivo no valido, intenta de nuevo');
                   $('#noFile').html('No cargado');
               }
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
    validarguardarrefrigerio();
}


function validarguardarrefrigerio()
{
    if ($('#fechasr').val() != '' && $('#horasr').val() != '' && $('#lugarpsr').val() != ''&& $('#lugarlsr').val() != '' && $('#cantidadpr').val() != '' )
        
    {
       $('#guardarrefrigerio').prop('disabled', false);
           
   }
   else
   {
       $('#guardarrefrigerio').prop('disabled', true);
      
   }
}


    $(document).ready(function()
    {
    
    
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
    
        

        $("#guardarrefrigerio").click(function ()
        {
                        $.ajax({
                          url: "fc_guardarrefrigerio",
                          type: "GET",
                          data: {vdocumento : $('#documento').val(),
                                 vfechasr : $('#fechasr').val(),
                                 vhorasr : $('#horasr').val(),
                                 vlugarlsr : $('#lugarlsr').val(),
                                 vcantidadpr : $('#cantidadpr').val(),
                                 vnameFile : $('#nameFile').val(),
                                 vobservacionr : $('#observacionr').val()},    
                          dataType: "html",
                          success : function(obj){   
                              location.href = "../c_refrigerio/fc_refrigerio?idrefrigerio="+ obj;
                          botonguardar();
                          alert('Requerimiento guardado exitosamente!!!');
                          }
                        });                    
        });

        
        $("#actualizar").click(function ()
        {
                        $.ajax({
                          url: "fc_actualizar",
                          type: "GET",
                          data: {vfolio : $('#folio').val(), vvalorrefrigerio : $('#valorrefrigerio').val()},    
                          dataType: "html",
                          success : function(obj){                      
                          botonactualizar();
                          }
                        });                   
        });
        

        $("#efectividad").click(function ()
        {
         botonsiguiente();
         location.href = "../c_vermapa/fc_vvermapa?vidcogestor=&vfdesde=&vfhasta=&vfolio=&vbuscares=";  
         //location.href = "../c_vermapa/fc_vvermapa?vidcogestor="+ $('#documento').val()&vfdesde=&vfhasta=&vfolio=&vbuscares=";                 

        });
              
        $("#hogar").click(function ()
        {
         botonanterior();
         location.href = "../consultahogar/c_consultahogar/fc_consultahogar?folio=0&idintegrante=0";  
        //location.href = "../c_capitulosintegrantes/fc_capitulosintegrantes?folio=" + $('#folio').val()+ "&idintegrante="+"&idintegrante=0";                    
        });
        
         $("#archivo").click(function ()
        {
         botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
        location.href = "../efectividadarchivo/c_principalarchivo/fc_principalarchivo";                    
        });
        
        $("#oportunidades").click(function ()
        {
         botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
        location.href = "../fichero/c_directorioaliado/fc_directorioaliado?documento="+ $('#documento').val() + "&identidad=0" ;                  
        });
        
        $("#oportunidadescon").click(function ()
        {
         botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
        location.href = "../fichero/c_consultardirectorioaliado/fc_consultardirectorioaliado?documento="+ $('#documento').val() + "&identidad=0"   ;                  
        });
        
         $("#acif").click(function ()
        {
         botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
        location.href = "../acercaroportunidadcif/c_consultarhogarcif/fc_consultarhogarcif?&folio=0"+ "&idintegrante=0" + "&documento="+ $('#documento').val() ;                  
        });
        
        $("#cif").click(function ()
        {
         botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
        location.href = "http://www.familiamedellin.com.co/modulo_inventario/modulo_cif/index.php/login/index/<?php echo $this->session->userdata('documento');?>/<?php echo $this->session->userdata('nombre1');?>/<?php echo $this->session->userdata('rol');?>" ;                  
        });
        
        $("#m3").click(function ()
        {
         botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
        location.href = "http://www.familiamedellin.com.co/modulo_inventario/modulo_cif/index.php/login/index/<?php echo $this->session->userdata('documento');?>/<?php echo $this->session->userdata('nombre1');?>/<?php echo $this->session->userdata('rol');?>" ;                  
        });
        
         $("#m67").click(function ()
        {
         botonanterior();
       //  location.href = "http://127.0.0.1/servidor/bv_2.0/form.php?action2=login&user2=<?php echo $this->session->userdata('documento');?>";  
         location.href = "http://www.familiamedellin.com.co/modulo_inventario/bv_2.0/form.php?action2=login&user2=<?php echo $this->session->userdata('documento');?>";  
        
        });
        
        
         $("#activarfolio").click(function ()
        {
       //     alert('jumm');
       //  botonanterior();
         //location.href = "../c_c2p1/fc_c2p1?folio=" + $('#folio').val();  
       location.href = "../consultahogar/c_controlhogar/fc_controlhogar?folio=0&idintegrante=0&documento="+ $('#documento').val();                  
        });
// 

//condicial , para controlar los roles de cada hogar
 /*   if ($('#rol').val()=== 'hogar')
{
    $('#efectividad').prop('disabled', true);
    $('#archivo').prop('disabled', true);
    $('#hogar').prop('disabled', false);
    $('#oportunidades').prop('disabled', true);
    $('#cif').prop('disabled', true);
}
 else if ($('#rol').val() === 'archivo')
{
   $('#efectividad').prop('disabled', true);
   $('#hogar').prop('disabled', true); 
   $('#archivo').prop('disabled', false);
   $('#oportunidades').prop('disabled', true);
   $('#cif').prop('disabled', true);
}
else if ($('#rol').val() === 'efectividad')
{
   $('#efectividad').prop('disabled', false);
   $('#hogar').prop('disabled', true); 
   $('#archivo').prop('disabled', true);
   $('#oportunidades').prop('disabled', true);
   $('#cif').prop('disabled', true);
}
else if ($('#rol').val() === 'oportunidadadmin')
{
   $('#efectividad').prop('disabled', true);
   $('#hogar').prop('disabled', true); 
   $('#archivo').prop('disabled', true);
   $('#oportunidades').prop('disabled', false);
   $('#cif').prop('disabled', true);
}
else if ($('#rol').val() === 'Auxiliar')
{
   $('#efectividad').prop('disabled', true);
   $('#hogar').prop('disabled', true); 
   $('#archivo').prop('disabled', true);
   $('#oportunidades').prop('disabled', true);
   $('#cif').prop('disabled', false);
}
else
{
   $('#efectividad').prop('disabled', false);
   $('#hogar').prop('disabled', false); 
   $('#archivo').prop('disabled', false);
   $('#oportunidades').prop('disabled', false);
   $('#cif').prop('disabled', false);
}
*/




//para cargar variables capitulo, pregunta,encuestador,vivienda,barra
//control del boton ayuda


uploadFileTracking();

});
//


function mensajito2(titulo, mensaje)
{
new jBox('Notice', {
    title: titulo,
    content: mensaje,
    color: 'red',
    animation: {open: 'flip', close: 'flip'},
    position: {x: 'right', y: 'center'},
    autoClose: 9000
});
}


function eliminardigito()
{
    $('#fechasr').val('');
     mensajito2('', 'no puedes digitar la fecha, debes presionar clic y elegirla desde el calendario');
    
}

</script>
</html>