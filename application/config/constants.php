<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('JSPERFIL','http://localhost/metodologia2servidor/resources/jsperfil/');
define('JBOX','http://localhost/metodologia2servidor/resources/jBox-0.3.2/');
define('FBOX','http://localhost/metodologia2servidor/resources/fancyBox/');
define('BOOTSTRAP','http://localhost/metodologia2servidor/resources/bootstrap/');
define('VENDOR','http://localhost/metodologia2servidor/resources/vendor/');
define('IMAGEN', 'http://localhost/metodologia2servidor/resources/img/');
define('JS', 'http://localhost/metodologia2servidor/resources/js/');
define('JQUERYUPLOAD11', 'http://localhost/metodologia2servidor/resources/jquery-upload/');
define('DESCARGAR', 'http://localhost/metodologia2servidor/resources/filesUploaded/');

//define('JSPERFIL','http://www.familiamedellin.com.co/metodologia2servidor/resources/jsperfil/');
//define('JBOX','http://www.familiamedellin.com.co/metodologia2servidor/resources/jBox-0.3.2/');
//define('FBOX','http://www.familiamedellin.com.co/metodologia2servidor/resources/fancyBox/');
//define('BOOTSTRAP','http://www.familiamedellin.com.co/metodologia2servidor/resources/bootstrap/');
//define('IMAGEN', 'http://www.familiamedellin.com.co/metodologia2servidor/resources/img/');
//define('JQUERYUPLOAD11', 'http://www.familiamedellin.com.co/metodologia2servidor/resources/jquery-upload/');
//define('DESCARGAR', 'http://www.familiamedellin.com.co/metodologia2servidor/resources/filesUploaded/');
define('FOOTS', '<br><br>
                <img src="'.IMAGEN.'Footer.png">');
define('HEAD', '<div  class="row" id="imghead">
                <img src="'.IMAGEN.'Header.png">
                </div>
                <div><br></div>
                
                
                      ');


define('HEAD3', '<div  class="row" id="imghead">
                <img src="'.IMAGEN.'Header.png">
                </div>  
                      <div id="progressBar" class="progress progress-striped">
                          <div class="progress-bar"  role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
                              <span id="incrementobarra"></span>
                          </div>
                      </div>');




define('HEAD1', '<div  class="row" id="imghead">
                <img src="'.IMAGEN.'Header.png">
                </div>');


define('HEAD2', '<div  class="row" id="imghead">
                <img src="'.IMAGEN.'Header.png">
                </div>');
define('BOTONERAG', '<hr />
                    <div class="row">
                    <div class="form-group ">
                    <div class="col-md-10">
                                <button class="btn btn-primary" type="button" id="anterior" name="anterior"> << Anterior</button>           
                                <button class="btn btn-primary" type="button" id="guardar" disabled=""  name="guardar">Guardar</button>
                                <button class="btn btn-primary" type="button" id="actualizar" disabled="" style="display: none" name="actualizar">Actualizar</button>
                                <button class="btn btn-primary" type="button" id="cancelar" onclick="botoncancelar();" disabled="" name="cancelar">Cancelar</button>
                                <button class="btn btn-primary" type="button" id="siguiente" style="display: none" name="siguiente">Siguiente >></button>
                    </div>
                    <div class="col-md-2">
                                <button class="btn btn-info" type="button" id="capitulos" name="capitulos">Volver a los capitulos</button>
                    </div>
                    </div>');
define('BOTONERAA', '<hr />
                    <div class="row">
                    <div class="form-group ">
                    <div class="col-md-10">
                                <button class="btn btn-primary" type="button" id="anterior" name="anterior"> << Anterior</button>           
                                <button class="btn btn-primary" type="button" id="actualizar" disabled="" name="actualizar">Actualizar</button>
                                <button class="btn btn-primary" type="button" id="cancelar" disabled="" name="cancelar" onclick="botoncancelar();">Cancelar</button>
                                <button class="btn btn-primary" type="button" id="siguiente" name="siguiente">Siguiente >></button>
                    </div>            
                    <div class="col-md-2">
                                <button class="btn btn-info" type="button" id="capitulos" name="capitulos">Volver a los capitulos</button>
                    </div>
                    </div>');

define('BOTONERAC', '<hr />
                  <div class="row">
                  <div class="form-group ">
                              <button class="btn btn-primary" type="button" id="anterior" name="anterior"> << Anterior</button>           
                              <button class="btn btn-primary" type="button" id="actualizar" disabled="" name="actualizar">Actualizar</button>
                              <button class="btn btn-info col-lg-offset-4" type="button" id="capitulos" name="capitulos">Volver a los capitulos</button>
                              <button class="btn btn-primary col-sm-offset-1" type="button" id="cerrar"  name="cerrar">Cerrar capitulo</button>
                  </div>
                  </div>');

define('BOTONERALOGROS', '<hr />
                  <div class="row">
                  <div class="form-group ">
                  <div class="col-md-10">
                              <button class="btn btn-primary" type="button" id="anterior" name="anterior"> << Volver</button>           
                              
                  </div>            
                  <div class="col-md-2">
                              
                  </div>
                  </div>');

//para cargar
define('JQUERYUPLOAD', 'http://familiamedellin.com.co/metodologia2servidor/resources/jquery-upload');
define('DESCARGA' , 'http://familiamedellin.com.co/metodologia2servidor/resources/filesUploaded');
define('LOCALFILES' , '/home/medelli1/public_html/metodologia2servidor/resources/filesUploaded/');

//para los script propios que creamos
//define('JSMSOL', 'http://www.medellinsolidaria.org/ini/resources/jsmsol');


/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */