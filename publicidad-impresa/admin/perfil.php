<?php
session_start();
require_once("conexion/conexion.php");
require_once("conexion/funciones.php");
require_once("conexion/verificar_sesion.php");

//DATOS DE USUARIO
$rst_usuario=mysql_query("SELECT * FROM dr_pei_usuario_datos WHERE usuario='$usuario_user'", $conexion);
$fila_usuario=mysql_fetch_array($rst_usuario);

//VARIABLES
$Usuario_nombre=$fila_usuario["nombre"];
$Usuario_apellidos=$fila_usuario["apellidos"];
$Usuario_dni=$fila_usuario["documento_numero"];
$Usuario_telefono=$fila_usuario["telefono"];

?>
<!doctype html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="no-js ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="no-js ie8 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html dir="ltr" lang="en-US" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Pinfinity Standard Format</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css">

    <script src="js/modernizr.js"></script>
</head>
<body>

<?php require_once("w-header.php"); ?>

<div id="page">

    <section id="main">
        <div class="wrap group">

            <div class="inner-container half group">

                <div class="box-hold group">
                    <article class="post-6 page type-page status-publish hentry entry box" id="post-6">
                        <div class="entry-intro">
                            <h1>Modifica los datos de tu perfil</h1>
                        </div> <!-- .entry-intro -->

                        <div class="entry-content group">

                            <form method="post" action="inc/s-guardar-perfil.php" id="form-envio">

                                <fieldset>
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" value="<?php echo $Usuario_nombre; ?>"/>
                                </fieldset>

                                <fieldset>
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text" name="apellidos" value="<?php echo $Usuario_apellidos; ?>"/>
                                </fieldset>

                                <fieldset>
                                    <label for="dni">DNI</label>
                                    <input type="text" name="dni" disabled value="<?php echo $Usuario_dni; ?>"/>
                                </fieldset>

                                <fieldset>
                                    <label for="email">Email</label>
                                    <input type="text" name="email" disabled value="<?php echo $usuario_user; ?>"/>
                                </fieldset>

                                <fieldset>
                                    <label for="telefono">Teléfono</label>
                                    <input type="text" name="telefono" value="<?php echo $Usuario_telefono; ?>"/>
                                </fieldset>

                                <fieldset>
                                    <input type="submit" value="Enviar datos"/>
                                </fieldset>

                            </form>

                        </div>

                        <div class="social-share group">

                        </div>

                    </article>
                </div> <!-- .box-hold -->


            </div>

        </div> <!-- .wrap < #main -->
    </section> <!--  #main -->

    <?php require_once("w-footer.php"); ?>

</div> <!-- #page -->



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.isotope.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/jquery.formLabels1.0.js"></script>
<script src="js/jquery.jplayer.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr-min.js"></script><![endif]-->
<script defer src="js/scripts.js"></script>
</body>
</html>