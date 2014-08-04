<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=true;
$wg_leido=false;
$wg_impresa=true;
$wg_chica16=false;
$wg_pubjc=true;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Precio de publicidad en edición impresa</title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="" >
    <meta name="keywords" content="">

    <!-- ESTILOS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <link rel="stylesheet" type="text/css" href="css/estilos-nota.css" >
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    
     <!-- Open Graph -->
    <meta property="og:type" content='website' >
    <meta property="og:site_name" content='Diario16.pe' >
    <meta property="og:title" content='<?php echo $nota_titulo; ?>'>
    <meta property="og:description" content='<?php echo soloDescripcion($nota_contenido,150); ?>'>
    <meta property="og:url" content='<?php echo $nota_web; ?>' >
    <meta property="og:image" content='<?php echo $nota_web_img; ?>' >
    <meta property="fb:admins" content='130961786950093'>
    <!-- fin Open Graph -->

</head>
<body id="nota">

    <?php require_once("wg-header.php"); ?>

    <!-- BANNER 960 -->
    <div class="banner-960">
        
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6739008060658295";
            /* Diario16 - Nota Superior */
            google_ad_slot = "7396193858";
            google_ad_width = 728;
            google_ad_height = 90;
            //-->
        </script>
        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>

    </div>
    <!-- FIN BANNER 960 -->

<div class="container">
      
    <div id="news" class="news span-16">

        <ul class="cat-menu">
            <li><a href="/">Diario16.pe</a></li>
            <li><a class="active" href="publicidad-precios.php">Precio de publicidad en edición impresa</a></li>
        </ul>

        <h1>Precio de publicidad en edición impresa</h1>

        <div class="nota-contenido span-13 last">

            <div class="publicidad-precio">
                <h2>Publicidad 1</h2>
                <img src="http://placehold.it/150x200" alt=""/>
                <p>Precio: S/. 100.00</p>
            </div>

            <div class="publicidad-precio">
                <h2>Publicidad 1</h2>
                <img src="http://placehold.it/150x200" alt=""/>
                <p>Precio: S/. 100.00</p>
            </div>

            <div class="publicidad-precio">
                <h2>Publicidad 1</h2>
                <img src="http://placehold.it/150x200" alt=""/>
                <p>Precio: S/. 100.00</p>
            </div>

            <div class="publicidad-precio">
                <h2>Publicidad 1</h2>
                <img src="http://placehold.it/150x200" alt=""/>
                <p>Precio: S/. 100.00</p>
            </div>

            <div class="publicidad-precio">
                <h2>Publicidad 1</h2>
                <img src="http://placehold.it/150x200" alt=""/>
                <p>Precio: S/. 100.00</p>
            </div>

            <div class="publicidad-precio">
                <h2>Publicidad 1</h2>
                <img src="http://placehold.it/150x200" alt=""/>
                <p>Precio: S/. 100.00</p>
            </div>

            <div class="publicidad-info">
                <h2>Forma de pago</h2>
                <p>Para poder publicar en nuestra edición impresa, tendrás que realizar el pago en el siguiente Banco:</p>
                <p>BCP - Cuenta Corriente: 198 - 546465463 - 0 - 20</p>
            </div>

            <div class="publicidad-btnregistro">
                <h2>Elige una opción</h2>

                <div class="sinregistro">
                    <p><a class="btn" href="publicidad-impresa">Registrate</a></p>
                </div>

                <div class="conregistro">
                    <p><a class="btn" href="publicidad-impresa/login.php">Iniciar sesión</a></p>
                </div>

            </div>


        </div><!-- FIN NOTA CONTENIDO -->

        <div class="clear"></div>

    </div>


    <?php require_once("wg-sidebar.php"); ?>

    <div class="clear"></div>

</div>

    <?php require_once("wg-footer.php"); ?>


</body>
</html>
