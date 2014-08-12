<?php
session_start();
require_once("conexion/conexion.php");
require_once("conexion/funciones.php");
require_once("conexion/verificar_sesion.php");

//HISTORIAL DE PAGO
$rst_pago=mysql_query("SELECT * FROM dr_pei_historial_pago WHERE usuario='$usuario_user'", $conexion);

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
                            <h1>Historial de pago</h1>
                        </div> <!-- .entry-intro -->

                        <div class="entry-content group historial-pago">

                            <table>
                                <thead>
                                    <tr>
                                        <td>Código publicidad</td>
                                        <td>Fecha de Pago</td>
                                        <td>Verificado</td>
                                        <td>Recibo</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php while($fila_pago=mysql_fetch_array($rst_pago)){

                                        //VARIABLES
                                        $pago_id=$fila_pago["id"];
                                        $pago_codigo=$fila_pago["codigo"];
                                        $pago_fecha_pago=$fila_pago["fecha_pago"];
                                        $pago_verificado=$fila_pago["verificado"];
                                        $pago_recibo_pago=$fila_pago["recibo_pago"];

                                        //Url
                                        $Pago_UrlImg=$web."imagenes/upload/".$pago_recibo_pago;
                                    ?>
                                    <tr>
                                        <td class="codigo"><?php echo $pago_codigo; ?></td>
                                        <td><?php echo $pago_fecha_pago; ?></td>
                                        <?php if($pago_verificado==1){ ?>
                                            <td><i class="fa fa-check fa-lg"></i></td>
                                        <?php }else{ ?>
                                            <td><i class="fa fa-times fa-lg"></i></td>
                                        <?php } ?>
                                        <td><a href="<?php echo $Pago_UrlImg; ?>">Ver</a></td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>

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