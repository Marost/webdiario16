<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//PUBLICIDAD
$rst_notas=mysql_query("SELECT * FROM ".$tabla_suf."_pei_publicidad ORDER BY fecha_publicacion DESC", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="no-js ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="no-js ie8 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html lang="es">
<head>
    <meta charset="UTF-8">

    <title> Clasificados | Diario16</title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="">

    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <!-- PINTEREST -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="libs/pinterest/css/style.css" type="text/css">
    <link rel="stylesheet" href="libs/pinterest/css/default.css" type="text/css">
    <link rel="stylesheet" href="libs/pinterest/js/fancybox/source/jquery.fancybox.css" type="text/css">

    <script src="libs/pinterest/js/modernizr.js" type="text/javascript"></script>

</head>
<body id="home" style="background-color: #C7DFF8">

    <?php require_once("wg-header.php"); ?>

    <div class="container">

        <div id="main-content">

            <div class="destacados-noticias">

                <div id="not-super">

                    <h3 id="titulo-categoria">Clasificados</h3>

                </div>

            </div><!-- FIN GRID DESTACADAS -->

        </div>

        <div class="container" style="width: 850px;">

            <section id="main">

                <div class="wrap group">

                    <div id="box-container">

                        <div id="entry-listing" class="group">

                            <?php while($fila_notas=mysql_fetch_array($rst_notas)){
                                $Nota_titulo=$fila_notas["titulo"];
                                $Nota_contenido=$fila_notas["contenido"];
                                $Nota_usuario=$fila_notas["usuario"];

                                //USUARIO
                                $rst_usuario=mysql_query("SELECT * FROM dr_pei_usuario_datos WHERE usuario='$Nota_usuario'", $conexion);
                                $fila_usuario=mysql_fetch_array($rst_usuario);
                                $Nota_telefono=$fila_usuario["telefono"];
                            ?>
                                <article id="post-189" class="post-189 category-blog-posts entry box format-standard">
                                    <div class="entry-content-cnt">
                                        <div class="entry-content">
                                            <?php echo $Nota_contenido; ?>
                                        </div>
                                    </div>

                                    <div class="entry-desc">
                                        <h1><a><?php echo $Nota_titulo; ?></a></h1>
                                        <p>Contactar al: <strong><?php echo $Nota_telefono; ?></strong></p>
                                    </div>
                                </article>
                            <?php } ?>

                        </div><!-- #entry-listing -->

                    </div>

                </div><!-- .wrap < #main -->

            </section><!--  #main -->

        </div>

        <div class="clear"></div>

    </div>

    <?php require_once("wg-footer.php"); ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/superfish.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/jquery.isotope.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/jquery.fitvids.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/jquery.flexslider-min.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/jquery.formLabels1.0.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/jquery.jplayer.js" type="text/javascript"></script>
    <script src="libs/pinterest/js/jquery.ias.min.js" type="text/javascript"></script>

    <!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="libs/pinterest/js/selectivizr-min.js"></script><![endif]-->
    <script defer src="libs/pinterest/js/scripts.js" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery.ias({
            container   : "#entry-listing",
            item        : ".entry",
            pagination  : ".nav",
            next        : "#nextpage",
            loader  : "libs/pinterest/images/ajax-loader.gif",
            onRenderComplete: function(items) {
                var $newElems = jQuery(items).addClass("newItem");

                $newElems.hide().imagesLoaded(function(){
                    if( jQuery(".flexslider").length > 0) {
                        jQuery(".flexslider").flexslider({
                            'controlNav': true,
                            'directionNav': true
                        });
                    }
                    jQuery(this).show();
                    jQuery('#infscr-loading').fadeOut('normal');
                    jQuery("#entry-listing").isotope('appended', $newElems );
                    loadAudioPlayer();
                });
            }
        });
    </script>

</body>

</html>
