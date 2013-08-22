<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=true;
$wg_leido=false;
$wg_impresa=true;
$wg_chica16=false;
$wg_pubjc=true;

//VARAIBLES DE URL
$varUrl_id=$_REQUEST["id"];

//NOTICIA DESTACADA
$rst_nota=mysql_query("SELECT * FROM dr_noticia WHERE id=$varUrl_id;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_id=$fila_nota["id"];
$nota_url=$fila_nota["url"];
$nota_titulo=$fila_nota["titulo"];
$nota_contenido=$fila_nota["contenido"];
$nota_categoria=$fila_nota["categoria"];
$nota_tags=$fila_nota["tags"];
$nota_visitas=$fila_nota["visitas"];

//VIDEO
$nota_video=$fila_nota["video"];
$nota_video_tipo=$fila_nota["tipo_video"];
$nota_video_mostrar=$fila_nota["mostrar_video"];
$nota_video_carpeta=$fila_nota["carpeta_video"];

//IMAGEN
$nota_imagen=$fila_nota["imagen"];
$nota_imagen_carpeta=$fila_nota["imagen_carpeta"];
$nota_imagen_mostrar=$fila_nota["mostrar_imagen"];

//URLS
$nota_web=$web."noticia/".$nota_id."-".$nota_url;
$nota_web_img=$web."imagenes/upload/".$nota_imagen_carpeta."".$nota_imagen;

//FECHA PUBLICACION
if($fila_nota["fecha_publicacion"]<>"0000-00-00 00:00:00"){
    $nota_fechaPub=$fila_nota["fecha_publicacion"];
    $nota_fechaPubNot=explode(" ", $nota_fechaPub);
    $nota_fechaPubNotFi=explode("-", $nota_fechaPubNot[0]);
    $nota_fechaTotal=nombreFechaTotal($nota_fechaPubNotFi[0],$nota_fechaPubNotFi[1],$nota_fechaPubNotFi[2]);
    $nota_fechaFinal=$nota_fechaTotal." a las ".$nota_fechaPubNot[1];
}else{
    $nota_fechaFinal=$fila_nota["fecha"];
}

// CATEGORIA
$rst_cat=mysql_query("SELECT * FROM dr_noticia_categoria WHERE id=$nota_categoria;", $conexion);
$fila_cat=mysql_fetch_array($rst_cat);

//VARIABLES
$cat_url=$fila_cat["url"];
$cat_titulo=$fila_cat["categoria"];

//MAS NOTICIAS
$rst_masNota=mysql_query("SELECT * FROM dr_noticia WHERE categoria=$nota_categoria ORDER BY fecha_publicacion DESC, id DESC LIMIT 4;", $conexion);

//TAGS
$tags=explode(",", $nota_tags);    //SEPARACION DE ARRAY CON COMAS
$rst_tags=mysql_query("SELECT * FROM dr_noticia_tags ORDER BY nombre ASC;", $conexion);

//SLIDER
$rst_slide=mysql_query("SELECT * FROM dr_noticia_slide WHERE noticia=$nota_id ORDER BY orden ASC;", $conexion);
$num_slide=mysql_num_rows($rst_slide);

//CONTADOR DE VISITAS
//$rst_cont=mysql_query("UPDATE dr_noticia SET visitas=$nota_visitas+1 WHERE id=$varUrl_id;", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title><?php echo $nota_titulo; ?></title>
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

    <!-- VIDEO -->
    <script src="libs/flowplayer/flowplayer-3.2.12.min.js"></script>

    <!-- LIBRERIA -->
    <script src="libs/royalslider/jquery-1.8.3.min.js"></script>
    <script src="libs/royalslider/jquery.royalslider.min.js"></script>
    <link href="libs/royalslider/royalslider.css" rel="stylesheet">
    <link href="libs/royalslider/skins/default/rs-default.css" rel="stylesheet">

    <script>
    jQuery(document).ready(function($) {
        $('#galeria-noticia').royalSlider({
            fullscreen: {
              enabled: false
            },
            controlNavigation: 'thumbnails',
            autoScaleSlider: true, 
            autoScaleSliderWidth: 960,     
            autoScaleSliderHeight: 850,
            loop: true,
            imageScaleMode: 'fit-if-smaller',
            navigateByClick: true,
            numImagesToPreload:2,
            arrowsNav:true,
            arrowsNavAutoHide: true,
            arrowsNavHideOnTouch: true,
            keyboardNavEnabled: true,
            fadeinLoadedSlide: true,
            globalCaption: true,
            globalCaptionInside: false,
            thumbs: {
              appendSpan: true,
              firstMargin: true,
              paddingBottom: 4
            }
        });
    });
    </script>

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
            <li><a class="active" href="seccion/<?php echo $nota_categoria."/".$cat_url; ?>"><?php echo $cat_titulo; ?></a></li>
        </ul>

        <span class="time-cat">
	       <em class="fecha">
            <?php echo $nota_fechaFinal; ?>
          </em>                        
        </span>

        <h1><?php echo $nota_titulo; ?></h1>
                                            
        <div class="cnt-player">
            <?php if($nota_video_mostrar==1){ ?>
                <?php echo tipoVideo($nota_video_tipo, $nota_video_carpeta, $nota_video, $nota_imagen, $nota_imagen_carpeta, $nota_id, 600, 374, $web); ?>
            <?php }elseif($num_slide>0){ ?>
                <div id="galeria-noticia" class="royalSlider rsDefault">
                    <?php while($fila_slide=mysql_fetch_array($rst_slide)){
                            $slide_imagen=$fila_slide["imagen"];
                            $slide_imagen_carpeta=$fila_slide["imagen_carpeta"];
                    ?>
                    <a class="rsImg" href="imagenes/upload/<?php echo $slide_imagen_carpeta."".$slide_imagen; ?>">
                        <img width="96" height="72" class="rsTmb" src="imagenes/upload/<?php echo $slide_imagen_carpeta."thumb/".$slide_imagen; ?>">
                    </a>
                    <?php } ?>
                </div>
            <?php }else{ ?>
                <img width="600" height="374" src="<?php echo $nota_web_img; ?>" alt="<?php echo $nota_titulo; ?>">
            <?php } ?>
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


        <div class="nota-contenido span-13 last">
            <div id="textonota">
                <?php echo $nota_contenido; ?>
            </div>
        </div><!-- FIN NOTA CONTENIDO -->
        
        <!-- BANNER 600 -->
        <div class="banner-600">
            
            <script type="text/javascript"><!--
                google_ad_client = "ca-pub-3674889010429322";
                google_ad_slot = "4399901146";
                google_ad_width = 336;
                google_ad_height = 280;
                //-->
            </script>
            <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>

        </div>
        <!-- FIN BANNER 600 -->

        <div class="clear"></div>

            <div class="tags">
                <strong>Tags:</strong>
                <?php while($fila_tags=mysql_fetch_array($rst_tags)){
                        $tags_id=$fila_tags["id"];
                        $tags_url=$fila_tags["url"];
                        $tags_nombre=$fila_tags["nombre"];
                        if(in_array($tags_id, $tags)){
                ?>
                <span class="tags">
                    <a href="/tag/<?php echo $tags_id."-".$tags_url; ?>"><?php echo $tags_nombre; ?></a>
                </span>,
                <?php }} ?>
            </div>          

            <div class="related-seo">
                <h4>Más en <?php echo $cat_titulo; ?></h4>
                <ul class="sociales otrasnotas">
                    <?php while($fila_masNota=mysql_fetch_array($rst_masNota)){
                            $masNota_id=$fila_masNota["id"];
                            $masNota_url=$fila_masNota["url"];
                            $masNota_titulo=$fila_masNota["titulo"];
                            $masNota_web=$web."noticia/".$masNota_id."-".$masNota_url;
                    ?>
                    <li>
                        <h3><a href="<?php echo $masNota_web; ?>"><?php echo $masNota_titulo; ?></a></h3>
                    </li>
                    <?php } ?>
                </ul>
            </div><!-- FIN RELACIONADAS -->

            <div id="comentarios">

                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    var disqus_shortname = 'diario16';
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
            </div>                    

        </div>


       <?php require_once("wg-sidebar.php"); ?>

          <div class="clear"></div>

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>

<script src="//assets.pinterest.com/js/pinit.js"></script>

<script src='http://ads60251.hotwords.com/show.jsp?id=60251&cor=FF0000&tag=div&atr=id&vatr=textonota'></script>

</body>
</html>
