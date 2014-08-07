<?php
require_once("admin/conexion/conexion.php");
require_once("admin/conexion/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
  	    <title> Registrate | Diario16 </title>
        <meta charset="utf-8">
    
        <?php require_once("wg-header-script.php"); ?>

        <script src="js/smart-form.js"></script>

    </head>

<body class="woodbg">

	<div class="smart-wrap">
    	<div class="smart-forms smart-container wrap-2">
        
        	<div class="form-header header-red">
            	<h4><img src="<?php echo $web; ?>imagenes/logo.png" alt="logo"></h4>
            </div><!-- end .form-header section -->
            
            <form method="post" action="php/smartprocess.php" id="smart-form">
            	<div class="form-body">
                
                    <div class="spacer-b40">
                    	<div class="tagline"><span>Tus datos personales</span></div><!-- .tagline -->
                    </div>
                
                	<div class="frm-row">
                    
                        <div class="section colm colm6">
                            <label class="field prepend-icon">
                                <input type="text" name="rciud_nombre" id="rciud_nombre" class="gui-input" placeholder="Nombre">
                                <label class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section --> 

                        <div class="section colm colm6">
                            <label class="field prepend-icon">
                                <input type="text" name="rciud_apellidos" id="rciud_apellidos" class="gui-input" placeholder="Apellidos">
                                <label class="field-icon"><i class="fa fa-user"></i></label>  
                            </label>
                        </div><!-- end section --> 
                    
                    </div><!-- end frm-row section -->
                    
                    <div class="frm-row">

                        <div class="section colm colm6">
                            <label class="field prepend-icon">
                                <input type="email" name="rciud_email" id="rciud_email" class="gui-input" placeholder="Email">
                                <label class="field-icon"><i class="fa fa-envelope"></i></label>  
                            </label>
                        </div><!-- end section -->

                        <div class="section colm colm6">
                            <label class="field prepend-icon">
                                <input type="tel" name="rciud_documentonumero" id="rciud_documentonumero" class="gui-input" placeholder="DNI">
                                <label class="field-icon"><i class="fa fa-file-text-o"></i></label>
                            </label>
                        </div><!-- end section -->

                    </div><!-- end frm-row section -->

                	<div class="spacer-b40">
                        <div class="tagline"><span>Contraseña</span></div><!-- .tagline -->
                    </div>

                    <div class="frm-row">
                        
                        <div class="section colm colm6">
                            <label for="password" class="field prepend-icon">
                                <input type="password" name="password" id="password" class="gui-input" placeholder="Crea tu contraseña">
                                <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                            <label for="repeatPassword" class="field prepend-icon">
                                <input type="password" name="repeatPassword" id="repeatPassword" class="gui-input" placeholder="Repite tu contraseña">
                                <label for="repeatPassword" class="field-icon"><i class="fa fa-unlock-alt"></i></label>
                            </label>
                        </div><!-- end section -->

                    </div>

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
                	<button type="submit" class="button btn-red">Registrarme</button>
                    <a href="login.php" style="float: right;">¿Ya tienes una cuenta? Inicia sesión</a>
                    <a href="recuperar.php" style="float: left;">¿Has olvidado tu contraseña?</a>
                </div><!-- end .form-footer section -->
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
    
    <div></div><!-- end section -->

</body>
</html>
