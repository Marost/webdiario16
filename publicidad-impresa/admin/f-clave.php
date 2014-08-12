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

    <?php require_once("w-header-script.php"); ?>

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
                            <h1>Modifica tu contraseña</h1>
                        </div> <!-- .entry-intro -->

                        <div class="entry-content group">

                            <form method="post" action="inc/s-guardar-clave.php" id="form-envio">

                                <fieldset>
                                    <label for="nombre">Nueva contraseña</label>
                                    <input type="password" name="clave" />
                                </fieldset>

                                <fieldset>
                                    <input type="submit" value="Cambiar contraseña"/>
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

<?php require_once("w-footer-script.php"); ?>

</body>
</html>