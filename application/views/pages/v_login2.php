<!DOCTYPE html>
<html lang="es">
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Login  </title>
        <link rel="stylesheet" href="<?php echo BOOTSTRAP, 'css/bootstrap1.min.css'; ?>" >
        <link rel="stylesheet" href="<?php echo BOOTSTRAP, 'css/style.css'; ?>" >
        
        <meta http-equiv="Content-Language" content="es"/>
        
        
        
        <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo IMAGEN,'icons/favicon.ico';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo VENDOR,'bootstrap/css/bootstrap.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BOOTSTRAP,'fonts/font-awesome-4.7.0/css/font-awesome.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BOOTSTRAP,'fonts/Linearicons-Free-v1.0.0/icon-font.min.css ';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo VENDOR,'animate/animate.css';?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo VENDOR,'css-hamburgers/hamburgers.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo VENDOR,'animsition/css/animsition.min.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo VENDOR,'select2/select2.min.css';?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo VENDOR,'daterangepicker/daterangepicker.css';?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BOOTSTRAP,'css/util.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo BOOTSTRAP,'css/main.css';?>">
<!--===============================================================================================-->

    </head>
    <body>  
        
        <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Ingrese con usuario y contraseña
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20 has-warning" data-validate="Digite documento">
						<input id="documento" class="input100" type="text" name="documento" placeholder="Ingrese documento">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Digite contraseña">
                                            <input class="input100" type="password" name="contrasena" id="contrasena" placeholder="Ingrese contraseña">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="enviar">
							Ingresar
						</button>
					</div>

<!--					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							
						</span>

						<a href="#" class="txt2">
							
						</a>
					</div>

					<div class="w-full text-center">
						<a href="#" class="txt3">
							
						</a>
					</div>-->
				</form>

				<div class="login100-more" style="background-image: url(<?php echo IMAGEN,'medallo.png';?>);"></div>
                                
                                
			</div>
		</div>
	</div>
        
        
<!--        <div class="container">

            head            
            <?php echo($head); ?>
             fin head            
            <br/><br/>
<div class="row">
    <div class=" col-md-offset-4">
    <div class="container well form-group col-md-5">
        
        <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Autenticacion</h3>
            </div>
            <div class="panel-body">
              Por favor digite su usuario y contrasena
            </div>
        </div>

            <div class="form-group">
              <label for="documento">Usuario</label>
              <input id="documento"   name="documento" type="text" class="form-control" placeholder="Digite su usuario">
            </div>
        
            <div class="form-group">
              <label for="contrasena">Constrasena</label>
             <input id="contrasena"  name="contrasena" type="password" class="form-control" placeholder="Digite su Contraseña">
            </div>            
            <button name="enviar" id="enviar" class="btn btn-lg btn-info btn-block" style="background-color: #5393EB;border-color:#5393EB">Ingresar</button>

    </div>
    </div>
</div>


//aqui comienza los nuevos  script
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo VENDOR,'jquery/jquery-3.2.1.min.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo VENDOR,'animsition/js/animsition.min.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo VENDOR,'bootstrap/js/popper.js';?>"></script>
	<script src="<?php echo VENDOR,'bootstrap/js/bootstrap.min.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo VENDOR,'select2/select2.min.js';?>"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo VENDOR,'daterangepicker/moment.min.js';?>"></script>
	<script src="<?php echo VENDOR,'daterangepicker/daterangepicker.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo VENDOR,'countdowntime/countdowntime.js';?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo JS,'main.js';?>"></script>
<!-- aqui terminan-->


<!--fin del row loguin
            INICIO Este es el footer NO TOCAR-->
            <?php// echo($foot); ?>
<!--                fin del footer NO TOCAR-->
          
            <!--INICIO ENLACES - NO TOCAR-->
            <script src="<?php echo BOOTSTRAP, 'js/jquery-1.11.0.js' ?>"></script>
            <script src="<?php echo BOOTSTRAP, 'js/bootstrap.min.js' ?>"></script>
            <script src="<?php echo BOOTSTRAP, 'js/jquery.bootstrap.wizard.js' ?>"></script>
            <script src="<?php echo BOOTSTRAP, 'js/prettify.js' ?>"></script>
            <script src="<?php echo JBOX, 'Source/jBox.min.js' ?>"></script>
            <link href="<?php echo JBOX, 'Source/jBox.css' ?>" rel="stylesheet">
            <script src="<?php echo JSPERFIL, 'jsmensajes.js' ?>"></script>
            <!--FIN ENLACES - NO TOCAR-->
            </body>


            <script>
     $(document).ready(function()
    {               


        $('#enviar').on('click', function() 
        {
                $.ajax({
                  url: "fc_login",
                  type: "GET",
                  data: {documento: $('#documento').val(), 
                  contrasena: $('#contrasena').val()},    
                  dataType: "html",
                  success : function(obj)
                  {       //alert(obj);              
                        if (obj === '1') 
                        {
                            window.location = "../c_principalservidor/fc_principalservidor";//si el usuario es verdadero(que este en la base de datos de usuarios)  te lleva a esta vista
                        } 
                        else if (obj === '0')
                        {
                            mensajito('NO VALIDO', 'Datos incorrectos');//si no concide el usuario y la contraseña sale un mensaje diciendo Datos incorrectos
                        }
                        
                        
                      
                        
                        
                  }
                }); 
        });


    });

  
                                            
                                            
            </script>
</html>