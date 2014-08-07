<?php
require_once("admin/conexion/conexion.php");
require_once("admin/conexion/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  	<title> Recuperar contraseña | Diario16 </title>
    <meta charset="utf-8">
    
    <?php require_once("wg-header-script.php"); ?>

      <script src="js/smart-form-recuperar.js"></script>

</head>

<body class="woodbg">

	<div class="smart-wrap">
    	<div class="smart-forms smart-container wrap-3">
        
        	<div class="form-header header-red">
            	<h4><img src="<?php echo $web; ?>imagenes/logo.png" alt="logo"></h4>
            </div><!-- end .form-header section -->
            
            <form method="post" action="php/smartprocess-recuperar.php" id="smart-form">
            	<div class="form-body">
                
                    <div class="spacer-b40">
                    	<div class="tagline"><span>Ingresa tu email para recuperar tu contraseña</span></div><!-- .tagline -->
                    </div>

                    <div class="section">
                        <label class="field prepend-icon">
                            <input type="email" name="rciud_email" id="rciud_email" class="gui-input" placeholder="Email">
                            <label class="field-icon"><i class="fa fa-envelope"></i></label>
                        </label>
                    </div><!-- end section -->

                	<div class="section">
                        <div class="smart-widget sm-left sml-120">
                            <label class="field">
                                <input type="text" name="securitycode" id="securitycode" class="gui-input sfcode" placeholder="Ingresa código">
                            </label>
                            <label for="securitycode" class="button captcode">
                                <img src="php/captcha.php" id="captcha" alt="Captcha"/>
                                <span class="refresh-captcha"><i class="fa fa-refresh"></i></span>
                            </label>
                        </div><!-- end .smart-widget section --> 
                    </div><!-- end section -->
                    
					<div class="result spacer-b10"></div><!-- end .result  section -->                     
                    
                    <div class="section progress-section">
                        <div class="progress-bar progress-animated bar-red">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                    </div><!-- end progress section --> 
                                                                                                                
                </div><!-- end .form-body section -->
                <div class="form-footer">
                	<button type="submit" class="button btn-red">Recuperar contaseña</button>
                    <a href="login.php">Inciar sesión</a>
                </div><!-- end .form-footer section -->
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
    
    <div></div><!-- end section -->

</body>
</html>
