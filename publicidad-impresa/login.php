<?php
require_once("admin/conexion/conexion.php");
require_once("admin/conexion/funciones.php");

//VARIABLES
$Rq_Msj=$_REQUEST["msj"];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  	<title> Iniciar sesión | Diario16 </title>
    <meta charset="utf-8">

    <?php require_once("wg-header-script.php"); ?>
       
</head>

<body class="woodbg">

	<div class="smart-wrap">
    	<div class="smart-forms smart-container wrap-3">
        
        	<div class="form-header header-red">
                <h4><img src="<?php echo $web; ?>imagenes/logo.png" alt="logo"></h4>
            </div><!-- end .form-header section -->
            
            <form method="post" action="admin/conexion/verificar.php" id="smart-login">
            	<div class="form-body theme-red">

                    <div class="section">
                        <label for="usuario" class="field prepend-icon">
                            <input type="type" name="usuario" id="usuario" class="gui-input" placeholder="Correo electronico">
                            <label for="usuario" class="field-icon"><i class="fa fa-user"></i></label>  
                        </label>
                    </div><!-- end section -->                    
                    
                	<div class="section">
                    	<label for="password" class="field prepend-icon">
                        	<input type="password" name="password" id="password" class="gui-input" placeholder="Contraseña">
                            <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>  
                        </label>
                    </div><!-- end section -->

                    <?php if($Rq_Msj==1){ ?>
                    <div class="alert notification alert-error spacer-b10">
                        <i class="fa fa-times"></i> Tu cuenta todavía no ha sido activada.</div>
                    <?php }elseif($Rq_Msj==2){ ?>
                    <div class="alert notification alert-error spacer-b10">
                        <i class="fa fa-times"></i> El usuario y la contraseña no coinciden.</div>
                    <?php } ?>
                                        
                </div><!-- end .form-body section -->
                <div class="form-footer">
                	<button type="submit" class="button btn-red">Iniciar sesión</button>
                </div><!-- end .form-footer section -->
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
    
    <div></div><!-- end section -->

</body>
</html>
