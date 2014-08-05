<?php
session_start();
require_once("conexion/conexion.php");
require_once("conexion/funciones.php");
require_once("conexion/verificar_sesion.php");
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
                            <h1>Envía los datos para publicar en la Edición Impresa</h1>
                        </div> <!-- .entry-intro -->

                        <div class="entry-content group">

                            <form method="post" action="inc/s-guardar.php" id="form-envio">

                                <fieldset>
                                    <label for="">Titulo</label>
                                    <input type="text" name="titulo"/>
                                </fieldset>

                                <fieldset>
                                    <label for="">Contenido de la publicación</label>
                                    <textarea name="contenido" id="" cols="30" rows="10"></textarea>
                                </fieldset>

                                <fieldset>
                                    <label for="">Imagen de recibo de pago</label>
                                    <input type="file" name="archivo"/>
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

<script src="//cdn.ckeditor.com/4.4.3/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'contenido', {
        toolbar: [
            { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
        ]
    });
</script>

</body>
</html>