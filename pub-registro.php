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

    <title>Pon tu publicidad en la Edición Impresa</title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="" >
    <meta name="keywords" content="">

    <!-- ESTILOS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <link rel="stylesheet" type="text/css" href="css/estilos-nota.css" >
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/plugins.js"></script>

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

            <div class="nota-contenido span-13 last">

                <div id="pubedimp-registro">

                    <h3>Ingresar</h3>

                    <form action="" name="peireg-registro" method="POST">

                        <fieldset>
                            <label for="peireg-nombre">Usuario:</label>
                            <input type="text" name="peireg-nombre"/>
                        </fieldset>

                        <fieldset>
                            <label for="peireg-clave">Contraseña:</label>
                            <input type="text" name="peireg-clave"/>
                        </fieldset>

                        <fieldset>
                            <input type="submit" value="Ingresar"/>
                        </fieldset>

                    </form>

                </div>

                <div id="pubedimp-registro">

                    <h3>No te registres, solo deja tus datos</h3>

                    <form action="" name="peireg-registro" method="POST">

                        <fieldset>
                            <label for="peireg-nombre">Usuario:</label>
                            <input type="text" name="peireg-nombre"/>
                        </fieldset>

                        <fieldset>
                            <label for="peireg-clave">Contraseña:</label>
                            <input type="text" name="peireg-clave"/>
                        </fieldset>

                        <fieldset>
                            <input type="submit" value="Ingresar"/>
                        </fieldset>

                    </form>

                </div>

            </div><!-- FIN NOTA CONTENIDO -->

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>

</body>
</html>
