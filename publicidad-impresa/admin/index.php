<?php
session_start();
require_once("conexion/conexion.php");
require_once("conexion/funciones.php");
require_once("conexion/verificar_sesion.php");

//VARIABLES
$Rq_Msj=$_REQUEST["msj"];
$Rq_Usuario=$usuario_user;

//PUBLICIDAD DEL USUARIOS LOGEADO
$rst_notas=mysql_query("SELECT * FROM ".$tabla_suf."_pei_publicidad WHERE usuario='$Rq_Usuario' ORDER BY fecha_publicacion DESC", $conexion);

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html dir="ltr" lang="en-US" class="no-js lt-ie9 lt-ie8 lt-ie7" > <![endif]-->
<!--[if IE 7]>    <html dir="ltr" lang="en-US" class="no-js ie7 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html dir="ltr" lang="en-US" class="no-js ie8 lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html dir="ltr" lang="es-ES" class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Publicidad en edición impresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic|Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/default.css" type="text/css">
    <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css" type="text/css">

    <script src="js/modernizr.js" type="text/javascript"></script>
</head>

<body>

<?php require_once("w-header.php"); ?>

<div id="page">

    <?php if($Rq_Msj<>""){ ?>
    <div class="mensaje">
        <?php if($Rq_Msj=="erpb"){ ?><span class="er">Se ha producido un error al enviar tu publicación. Intentalo de nuevo.</span><?php } ?>
        <?php if($Rq_Msj=="okpb"){ ?><span class="ok">Se ha enviado tu publicación a nuestro editor.</span><?php } ?>
        <?php if($Rq_Msj=="erpr"){ ?><span class="er">Se ha producido un error al actualizar tu datos de perfil. Intentalo de nuevo.</span><?php } ?>
        <?php if($Rq_Msj=="okpr"){ ?><span class="ok">Tu perfil ha sido actualizado satisfactoriamente.</span><?php } ?>
        <?php if($Rq_Msj=="erps"){ ?><span class="er">Se ha producido un error al cambiar tu contraseña. Intentalo de nuevo.</span><?php } ?>
        <?php if($Rq_Msj=="okps"){ ?><span class="ok">Tu contraseña ha sido actualizada satisfactoriamente.</span><?php } ?>
    </div>
    <?php } ?>

    <section id="main">
        <div class="wrap group">
            <div id="box-container">
                <div id="entry-listing" class="group">

                    <?php while($fila_notas=mysql_fetch_array($rst_notas)){
                            $Nota_titulo=$fila_notas["titulo"];
                            $Nota_contenido=$fila_notas["contenido"];
                            $Nota_publicar=$fila_notas["publicar"];
                    ?>
                    <article id="post-189" class="post-189 category-blog-posts entry box format-standard <?php if($Nota_publicar==1){ ?>publicado<?php }else{ ?>nopublicado<?php } ?>">
                        <div class="entry-content-cnt">
                            <div class="entry-content">
                                <?php echo $Nota_contenido; ?>
                            </div>
                        </div>

                        <div class="entry-desc">
                            <h1><a><?php echo $Nota_titulo; ?></a></h1>
                        </div>
                    </article>
                    <?php } ?>

                </div><!-- #entry-listing -->

            </div>
        </div><!-- .wrap < #main -->
    </section><!--  #main -->

    <?php require_once("w-footer.php"); ?>

</div><!-- #page -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/jquery.isotope.js" type="text/javascript"></script>
<script src="js/jquery.fitvids.js" type="text/javascript"></script>
<script src="js/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="js/jquery.formLabels1.0.js" type="text/javascript"></script>
<script src="js/jquery.jplayer.js" type="text/javascript"></script>
<script src="js/jquery.ias.min.js" type="text/javascript"></script>

<!--[if (gte IE 6)&(lte IE 8)]><script type="text/javascript" src="js/selectivizr-min.js"></script><![endif]-->
<script defer src="js/scripts.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery.ias({
        container   : "#entry-listing",
        item        : ".entry",
        pagination  : ".nav",
        next        : "#nextpage",
        loader  : "images/ajax-loader.gif",
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