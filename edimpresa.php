<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=false;
$wg_leido=false;
$wg_impresa=false;
$wg_chica16=true;

//VARAIBLES DE URL
$varUrl_id=$_REQUEST["id"];

//NOTICIA DESTACADA
$rst_nota=mysql_query("SELECT * FROM dr_portada WHERE id=$varUrl_id;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_id=$fila_nota["id"];
$nota_fecha=$fila_nota["fecha"];
$nota_url=$fila_nota["url"];
$nota_fechaSep=explode("-", $nota_fecha);
$nota_fechaTotal=nombreFechaTotal($nota_fechaSep[0], $nota_fechaSep[1], $nota_fechaSep[2]);
$nota_imagen=$fila_nota["imagen"];
$nota_imagen_carpeta=$fila_nota["imagen_carpeta"];
$nota_pdf=$fila_nota["pdf"];
$nota_pdf_carpeta=$fila_nota["pdf_carpeta"];
$nota_web=$web."edicion/virtual/".$nota_id."/".$nota_url;
$nota_webImg=$web."imagenes/upload/".$nota_imagen_carpeta."".$nota_imagen;
$nota_webPdf=$web."pdf/".$nota_pdf_carpeta."".$nota_pdf;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Edición Digital: <?php echo $nota_fechaTotal; ?></title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="" >
    <meta name="keywords" content="">

    <!-- ESTILOS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <link rel="stylesheet" type="text/css" href="css/estilos-nota.css" >
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/plugins.js"></script>
    
     <!-- Open Graph -->
    <meta property="og:type" content='website' >
    <meta property="og:site_name" content='Diario16.pe' >
    <meta property="og:title" content='<?php echo $nota_titulo; ?>'>
    <meta property="og:description" content='<?php echo soloDescripcion($nota_contenido,150); ?>'>
    <meta property="og:url" content='<?php echo $nota_web; ?>' >
    <meta property="og:image" content='<?php echo $nota_web_img; ?>' >
    <meta property="fb:admins" content='130961786950093'>
    <!-- fin Open Graph -->

    <!-- POPUP -->
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        var jPortada = jQuery.noConflict();
        jPortada(document).on("ready", init);

        function init(){
            jPortada("#portada-imagen").on("click", function(){
                window.open("<?php echo $nota_web; ?>","revista","width=1000,height=625");
            })
        }
    </script>

</head>
<body id="nota">

    <?php require_once("wg-header.php"); ?>


<div class="container">
      
      <div id="news" class="news">
        
        <span class="time-pdf">
            <em class="fecha">
                <?php echo $nota_fechaTotal; ?>
            </em>

            <em class="descargar-pdf">
                <a href="<?php echo $nota_webPdf; ?>" target="_blank">Descargar Edicion Digital</a>
            </em>
        </span>

        <div class="cnt-player">
            <a href="javascript:;" id="portada-imagen">
                <img class="borde-portada-imagen" width="596" src="<?php echo $nota_webImg; ?>" alt="<?php echo $nota_fechaTotal; ?>">
            </a>
        </div>

        <div id="compartir">
            
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style ">
            <a class="addthis_button_facebook_like" fb:like:width="115"></a>
            <a class="addthis_button_tweet"></a>
            <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> 
            <a class="addthis_counter addthis_pill_style"></a>
            </div>
            <script>var addthis_config = {"data_track_addressbar": true};</script>
            <script>var addthis_config = {"data_track_clickback": false};</script>
            <script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5144bb9b5074ce9e"></script>
            <!-- AddThis Button END -->

        </div><!-- FIN COMPARTIR -->

        <div class="clear"></div>
            
            <!--
            <div id="comentarios">
                <div id="disqus_thread"></div>
                <script>
                    var disqus_shortname = 'diario16';
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>
            -->

        </div>


       <?php require_once("wg-sidebar.php"); ?>

          <div class="clear"></div>

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>

<script src="//assets.pinterest.com/js/pinit.js"></script>

</body>
</html>
