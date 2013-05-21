<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=true;
$wg_leido=false;
$wg_impresa=true;
$wg_chica16=false;

//VARAIBLES DE URL
$varUrl_id=$_REQUEST["columid"];
$varUrl_url=$_REQUEST["columurl"];
$varUrl_notaid=$_REQUEST["notaid"];
$varUrl_notaurl=$_REQUEST["notaurl"];

//COLUMNISTA
$rst_columnista=mysql_query("SELECT * FROM dr_columnista WHERE id=$varUrl_id;", $conexion);
$fila_columnista=mysql_fetch_array($rst_columnista);

//VARIABLES
$columnista_id=$fila_columnista["id"];
$columnista_titulo=$fila_columnista["nombre_completo"];
$columnista_imagen=$fila_columnista["foto"];

//COLUMNA
$rst_nota=mysql_query("SELECT * FROM dr_columnista_columna WHERE id=$varUrl_notaid;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_id=$fila_nota["id"];
$nota_url=$fila_nota["url"];
$nota_titulo=$fila_nota["titulo"];
$nota_contenido=$fila_nota["contenido"];

//WEB
$nota_web=$web."columnista/".$varUrl_id."/".$varUrl_url."/".$varUrl_notaid."/".$varUrl_notaurl;
$nota_web_img=$web."imagenes/columnistas/".$columnista_imagen;

//FECHA PUBLICACION
$nota_fechaPub=$fila_nota["fecha_publicacion"];
$nota_fechaPubNotFi=explode("-", $nota_fechaPub);
$nota_fechaTotal=nombreFechaTotal($nota_fechaPubNotFi[0],$nota_fechaPubNotFi[1],$nota_fechaPubNotFi[2]);

//MAS NOTICIAS
$rst_masNota=mysql_query("SELECT * FROM dr_columnista_columna WHERE columnista=$varUrl_id ORDER BY fecha DESC, id DESC LIMIT 4;", $conexion);

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

</head>
<body id="nota">

    <?php require_once("wg-header.php"); ?>


<div class="container">
      
    <div id="news" class="news span-16">
    
        <ul class="cat-menu">
            <li><a href="/">Diario16.pe</a></li>
            <li><a class="active" href=""><?php echo $columnista_titulo; ?></a></li>
        </ul>

        <span class="time-cat">
	       <em class="fecha">
            <?php echo $nota_fechaTotal; ?>
          </em>                        
        </span>

        <h1><?php echo $nota_titulo; ?></h1>
                                            
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

        <div class="clear"></div>

        <div class="related-seo">
            <h4>Más</h4>
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

    </div>


    <?php require_once("wg-sidebar.php"); ?>

    <div class="clear"></div>

</div><!-- FIN CONTAINER -->

    <?php require_once("wg-footer.php"); ?>

<script src="//assets.pinterest.com/js/pinit.js"></script>

</body>
</html>
