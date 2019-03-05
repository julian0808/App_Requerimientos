<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $titulo ?>  </title>
    <link rel="stylesheet" href="<?php echo BOOTSTRAP, 'css/bootstrap1.min.css'; ?>" >
    
    <meta http-equiv="Content-Language" content="es"/>
<style>
.btn{
background-color: #5393EB;
border-color: #FFFFFF;
color: #FFFFFF;
}
.btn:hover {
border-color: #5393EB;
background: #FFFFFF;
color: #5393EB;
}


</style>
</head>
<body> 
<!--<body >  -->

    <div class="container ">
        <!--head-->
        <?php echo($head); ?>
        <!-- fin head-->

    
<!--aqui me pinta el rol,el documento, nombre y apellido de  la persona-->
        <input type="text" class="form-control input-sm" id="rol" name="rol" style="display:none"   placeholder="rol" value="<?php echo($crol); ?>"> 
        <input type="text" class="form-control input-sm" id="documento" name="documento" style="display:none" placeholder="rol" value="<?php echo($documento); ?>">
        <input type="text" class="form-control input-sm" id="nombrevs" name="nombrevs" style="display: none" placeholder="rol" value="<?php echo($cnombre1.' '.$capellido1); ?>">
        <!--fin-->
<hr>
        <form class="form-group" name="formulario" id="formulario">

<!--    inicio de la barra de navegación-->
    <div class="navbar-collapse  collapse" id="navbar-main">
        
        <ul class="nav navbar-nav navbar-right">
            
              
              <li><a  href="../c_login/fc_vlogin"><h4><b>Salir</b></h4></a></li>
              </ul>
    </div>
<!--    Fin de la barra de navegación-->
           
<!--aqui inicia el div donde se encuentra el boton de reuerimientos logisticos-->
            <div class="row col-lg-10 col-lg-offset-1">

<!--este boton es el que me lleva al aplicativo de requerimientos logisticos-->
<button type="button" id="logistica"   class="btn btn-lg btn-block" <?php echo $disabledatrans; ?>>LOGI CONTROL </button>



                  
                
            </div>
<!--aqui comienza el div donde se encuentra el boton de reuerimientos logisticos-->

     
            
        

            <!--inicio botonera guardar y actualizar-->
<!--            <?php if($arrayrespuestas['eprincipalservidor']=="")
            {
                echo($botonerag);
            }
            else
            {
                echo($botoneraa);
            }?>   -->
            <!--Fin botonera guardar y actualizar-->

        </form><br> <br> <br><br> <br> <br>  
    
    <!--Inicio Este es el footer NO TOCAR-->
    <?php echo($foot); ?>
    <!--fin del footer NO TOCAR-->
    </div>
    
    <!--Inicio de los enlaces, se llaman las librerias de bootstrap,jbox,-->
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
    <!--Inicio de los enlaces-->
</body>

<script> 

    $(document).ready(function()
    {
    
  

        $("#logistica").click(function ()
        {
         botonanterior();
         if ($("#rol").val()== 'adminlogistico')
         {
            location.href = "../requerimientologistico/c_transporteadmin/fc_transporteadmin?idtransporteadmin=0"   ;
         }
         else
         {
            location.href = "../requerimientologistico/c_transporte/fc_transporte?idtransporte=0" ;                   
         }
          
        
        });


});





</script>
</html>