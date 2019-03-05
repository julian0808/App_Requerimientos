<!DOCTYPE html>
<html lang="es">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $titulo ?>  </title>
        <link rel="stylesheet" href="<?php echo BOOTSTRAP, 'css/bootstrap1.min.css'; ?>" >
        <meta charset="utf-8">
        <meta http-equiv="Content-Language" content="es"/>
        <link rel="stylesheet" href="<?php echo(JQUERYUPLOAD . '/css/jquery.fileupload.css'); ?>" />
        <link rel="stylesheet" href="<?php echo(JQUERYUPLOAD . '/css/jquery.fileupload-ui.css'); ?>" />        

    </head>
    <body>  
        <div class="container">
            
<!-- head -->
            <?php echo($head2); ?><br>

        <div class="row">
            <form class="navbar-form navbar-left has-error">
                
                <select class="form-control input-sm" id="buscarcobertura" name="buscarcobertura"  >
                   <?php echo($liscg); ?> 
                </select>
            </form>         
            <form class="navbar-form navbar-left has-error">
                <input type="text" class="form-control input-sm" onKeyPress="return soloNumeros(event)" placeholder="Buscar Folio" name="buscarfolio" id="buscarfolio">
            </form> 
            <form class="navbar-form navbar-left has-error">
                <select class="form-control input-sm" id="buscarestado" name="buscarestado"  >
                   <?php echo($lisestado); ?> 
                </select>
                
            </form> 
            <form class="navbar-form navbar-left has-error"> 
                <button class="btn btn-danger btn-sm" type="button" id="buscar" name="buscar"><span class="glyphicon glyphicon-search"></span> - Buscar!!! </button>
            </form>             
        </div>            
<!-- fin head -->

                <div  class="row">
                    <div class="">
                    <p class="text-right"><small>Te encuentras en la vista  <strong>PRINCIPAL HOGAR</strong></small></p><br>
                    </div>
                </div><br>
<!--para imprimir el folio y llevarlo-->
<input type="text" class="form-control input-sm" id="docanalista" name="docanalista" style="display: none" placeholder="Text input" value="<?php echo($docanalista); ?>">
<!--fin para imprimir el folio y llevarlo-->
            <form class="form-group" name="formulario" id="formulario">
                <div class="row">
                    <div class="form-group form-group-sm">   
                        <div class="form-group  ">
                                              <div class="panel panel-primary">
                           <!-- Default panel contents -->
                           <div class="panel-heading">Hogares Asignados</div>
                           <div class="panel-body">
                               <div id="list"><?php echo($list); ?></div>
                             
                              
                             
                            <table class="table tableborder">
                                <thead>
                                    <tr>
                                        <th>Folio</th>
                                        <th>Momento</th>
                                        <th>Cogestor</th>		
                                        <th>Fecha Cierre</th>
                                        <th>Fecha Manual</th>
                                        <th>Estado</th>
                                        <th>Formato</th>
                                        <th>Observación</th>
                                        <th>Guardar</th>
                                        <th>Descarga Cogestor</th>
                                    </tr>
                                </thead>

                                <tbody id='datos'>
                                    <?php echo($datos); ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div> 


<!--inicio botonera guardar y actualizar NO SE TOCA-->

           <?php echo('<button class="btn btn-danger" type="button" id="salir" name="salir"> <<  Salir  >> </button>');?>
                                

<!--Fin botonera guardar y actualizar NO TOCAR-->

                </form>

 
<!--inicio modal-->
<!-- Modal -->
<div class="modal fade" id="modalAddTracking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Adjuntar archivo</h4>
        <input type="text" class="form-control input-sm" placeholder="nombre archivo" style="display: none" name="nomfolio" id="nomfolio">
      </div>
      <div class="modal-body">
          
          <div>
            <form id="fileUploadFileTacking" action="" method="POST" enctype="multipart/form-data">
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
</div>                   
<!--fin modal--> 
<!--INICIO Este es el footer NO TOCAR-->
            <?php echo($foot); ?>
<!--fin del footer NO TOCAR-->
        </div>
<!--INICIO ENLACES - NO TOCAR-->
        <script src="<?php echo BOOTSTRAP, 'js/jquery-1.11.0.js' ?>"></script>
        <script src="<?php echo BOOTSTRAP, 'js/bootstrap.min.js' ?>"></script>
        <script src="<?php echo BOOTSTRAP, 'js/jquery.bootstrap.wizard.js' ?>"></script>
        <script src="<?php echo BOOTSTRAP, 'js/prettify.js' ?>"></script>
        <script src="<?php echo JBOX, 'Source/jBox.min.js' ?>"></script>
        <link href="<?php echo JBOX, 'Source/jBox.css' ?>" rel="stylesheet">
        <script src="<?php echo (JQUERYUPLOAD . '/js/vendor/jquery.ui.widget.js'); ?>"></script>
        <script src="<?php echo (JQUERYUPLOAD . '/js/jquery.fileupload.js'); ?>"></script>
        <script src="<?php echo (JQUERYUPLOAD . '/js/jquery.fileupload-process.js'); ?>"></script>
        <script src="<?php echo (JQUERYUPLOAD . '/js/jquery.fileupload-validate.js'); ?>"></script>
        <script src="<?php echo (JQUERYUPLOAD . '/js/jquery.fileupload-ui.js'); ?>"></script>         
<!--FIN ENLACES - NO TOCAR-->
    </body>


<script>
function mensajito(titulo, mensaje)
{
new jBox('Notice', {
    title: titulo,
    content: mensaje,
    color: 'black',
    animation: {open: 'flip', close: 'flip'},
    position: {x: 'right', y: 'center'},
    autoClose: 3000
});
}

function pasarvalornomfolio(folio)
{
    //alert(folio);
    $('#nomfolio').val(folio);
}

// funcion que permite ir a la vista principal protocolo    
function mostaradjuntar(idfila)
{ //alert(idfila);
    if($('#estadovisita' + idfila).val() == 2)
    {
        //alert('es efectivo');
        $('#mod' + idfila).show(1000);
        $('#linkadjuntar' + idfila).val('');
    }
    else
    {
        $('#mod' + idfila).hide(1000);
        $('#linkadjuntar' + idfila).val('No Aplica');
    }
}

function guardar(folio,idestacion,idestadoestacion,idfila)
{ //alert(idfila);

if($('#estadovisita' + idfila).val() == 1 || $('#linkadjuntar' + idfila).val() == '')
{
    mensajito('No puede guardar!', 'Faltan campos obligatorios o el estado de la visita es CERRADA');
}
else
{

    $.ajax({
                    url: "fc_guardar",
                    type: "GET",
                    data: {vfolio: $('#folio' + folio).val(),
                           videstacion: $('#estacion' + idestacion).val(),
                           videstadoestacion: $('#estadoestacion' + idestadoestacion).val(),
                           vestadovisita: $('#estadovisita' + idfila).val(), 
                           vlinkadjuntar: $('#linkadjuntar' + idfila).val(), 
                           vobservacion: $('#observacion' + idfila).val(),
                           vfmanual: $('#fmanual' + idfila).val()
                          },
                    dataType: "html",
                    success : function(obj){                      
                      $('#guardar' + idfila).prop('disabled', true);
                      $('#estadovisita' + idfila).prop('disabled', true);
                      $('#mod' + idfila).prop('disabled', true);
                      $('#observacion' + idfila).prop('disabled', true);
                      $('#fmanual' + idfila).prop('disabled', true);
                      
                        $.ajax({
                          url: "fc_buscar",
                          type: "GET",
                          data: {vbuscarco : $('#buscarcobertura').val(), vbuscarfo : $('#buscarfolio').val(), vbuscares : $('#buscarestado').val()},    
                          dataType: "html",
                          success : function(obj){                      
                          $('#datos').html(obj);
                          mensajito('Guardado', 'Visita guardada');
                                       $.ajax({
                                        url: "fc_totales",
                                        type: "GET",
                                        dataType: "html",
                                        success : function(obj){                      
                                        $('#list').html(obj);
                                        
                                        }
                                      });
                          }
                        });
                    }
                });
}
}
    

//VALIDACIOND DE NUMEROS Y LETRAS
//SE DEBE COLOCAR ESTO EN EL CAMPO PARA QUE FUNCIONE onKeyPress="return soloNumeros(event)"
function soloNumeros(e) 
{ 
//    alert(e);
var key = window.Event ? e.which : e.keyCode 
if ((key >= 48 && key <= 57) || (key==8)){}
else
{
   okletrasnum('Ingresa solo numeros!!!');
}
return ((key >= 48 && key <= 57) || (key==8)) 
}

//SE DEBE COLOCAR ESTO EN EL CAMPO PARA QUE FUNCIONE onKeyPress="return soloLetras(event)"
function soloLetras(e) 
{ 
//    alert(e);
var key = window.Event ? e.which : e.keyCode

if ((key >= 65 && key <= 90) || (key==8) || (key==32)){}
else
{
   okletrasnum('Ingresa solo letras mayusculas!!!');
}

return ((key >= 65 && key <= 90) || (key==8) || (key==32)) 
}

    //NO TOCAR funcion qmostrar el mensaje de letras o numeros    
    function okletrasnum(mensaje)
    {
    new jBox('Notice', {
        content: mensaje,
        color: 'green',
        animation: {open: 'tada', close: 'flip'},
        position: {x: 'right', y: 'center'},
        autoClose: 2000
    });
    }
//FIN VALIDAR NUMERO LETRAS
///////////////////////////////////////Funciones que llaman al controlador para guardar y actualizar////////////////////////////////////////////////////////////////////////    
    $(document).ready(function()
    {
        uploadFileTracking();//este se debe incluir

        //NO TOCAR - salir                
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
         //fin salir   

        $("#buscar").click(function ()
        {
       if($('#buscarcobertura').val() == '' && $('#buscarfolio').val() == '' && $('#buscarestado').val() == '')
       {
           mensajito('No se puede Buscar!!!','Debes de seleccionar almenos una opcion de busqueda');
       }
       else
       {
                        $.ajax({
                          url: "fc_buscar",
                          type: "GET",
                          data: {vbuscarco : $('#buscarcobertura').val(), vbuscarfo : $('#buscarfolio').val(), vbuscares : $('#buscarestado').val()},    
                          dataType: "html",
                          success : function(obj){                      
                          $('#datos').html(obj);
                          }
                        }); 
        }
        });
                
    });
    
            //desde aca
            function uploadFileTracking ()
            {
                
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
                            $('#linkadjuntar' + $('#nomfolio').val()).val(nameFile);
                            $('#noFile').html('Archivo Cargo Exitosamente!!!');
                            //lleno();
                            //valiguardar();
                            //call ajax service
                        }else{
                            //$.notific8('Error Subiendo la Foto', {life: 5000, horizontalEdge: "top", theme: "danger", heading: " Error :( "});
                            alert('Archivo no valido, intenta de nuevo');
                            $('#noFile').html('No cargado');
                        }
                    }
                });
            }


/////////////////////////////////////// FIN Funciones que llaman al controlador para guardar y actualizar////////////////////////////////////////////////////////////////////////        
</script>
</html>