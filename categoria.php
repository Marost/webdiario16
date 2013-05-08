<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//VARIABLES DE URL
$reqId=$_REQUEST["id"];
$reqUrl=$_REQUEST["url"];

//NOTICIA SUPERIOR
$rst_not_sup=mysql_query("SELECT * FROM dr_noticia WHERE categoria=$reqId AND (destacada=1 OR superior=1) AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 9", $conexion);

//NOTICIA INFERIOR
$rst_not_inf=mysql_query("SELECT * FROM dr_noticia WHERE categoria=$reqId AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 30", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title> | Diario16</title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="">

    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- Open Graph -->
    <meta property="og:type" content='website'>
    <meta property="og:site_name" content='Diario16.pe'>
    <meta property="og:title" content='Diario16.pe'> 
    <meta property="og:description" content=''>
    <meta property="og:url" content='/'> 
    <meta property="og:image" content=''>
    <meta property="fb:admins" content='130961786950093'>
    <!-- fin Open Graph -->

</head>
<body id="home">

    <?php require_once("wg-header.php"); ?>

    <div class="container">

    <div id="main-content">
                     
        <div class="destacados-noticias">

            <div id="not-super">

                <h3 id="titulo-categoria"><?php echo $reqUrl; ?></h3>
    
                <?php while($fila_not_sup=mysql_fetch_array($rst_not_sup)){
                        $notSup_id=$fila_not_sup["id"];
                        $notSup_url=$fila_not_sup["url"];
                        $notSup_titulo=$fila_not_sup["titulo"];
                        $notSup_imagen=$fila_not_sup["imagen"];
                        $notSup_imagen_carpeta=$fila_not_sup["imagen_carpeta"];
                        $notSup_categoria=$fila_not_sup["categoria"];
                        $notSup_web=$web."noticia/".$notSup_id."-".$notSup_url;
                        $notSup_web_img=$web."imagenes/upload/".$notSup_imagen_carpeta."thumb/".$notSup_imagen;

                        //SELECCIONAR CATEGORIA
                        $rst_notsup_cat=mysql_query("SELECT * FROM dr_noticia_categoria WHERE id=$notSup_categoria", $conexion);
                        $fila_notsup_cat=mysql_fetch_array($rst_notsup_cat);

                        //VARIABLES
                        $notSupCat_url=$fila_notsup_cat["url"];
                        $notSupCat_titulo=$fila_notsup_cat["categoria"];
                        $notSupCat_web=$web."seccion/".$notSup_categoria."/".$notSupCat_url;
                ?>
                <div class="noticias"> 
                    <a href="<?php echo $notSup_web; ?>">
                        <img src="<?php echo $notSup_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSupCat_web; ?>"><?php echo $notSupCat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSupCat_url; ?>">
                        <h2><a href="<?php echo $notSup_web; ?>">
                            <?php echo $notSup_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>
                <?php } ?>

                <div class="clear"></div>

            </div>

      </div><!-- FIN GRID DESTACADAS -->

    </div>
             
    <div class="all-news">
           
        <div class="news">
            
            <?php while($fila_not_inf=mysql_fetch_array($rst_not_inf)){
                    $notInf_id=$fila_not_inf["id"];
                    $notInf_url=$fila_not_inf["url"];
                    $notInf_titulo=$fila_not_inf["titulo"];
                    $notInf_contenido=soloDescripcion($fila_not_inf["contenido"], 150);
                    $notInf_imagen=$fila_not_inf["imagen"];
                    $notInf_imagen_carpeta=$fila_not_inf["imagen_carpeta"];
                    $notInf_fecha=$fila_not_inf["fecha_publicacion"];
                    $notInf_web=$web."noticia/".$notInf_id."-".$notInf_url;
                    $notInf_web_img=$web."imagenes/upload/".$notInf_imagen_carpeta."thumb/".$notInf_imagen;
                    $notInf_categoria=$fila_not_inf["categoria"];

                    //SELECCIONAR CATEGORIA
                    $rst_notinf_cat=mysql_query("SELECT * FROM dr_noticia_categoria WHERE id=$notInf_categoria", $conexion);
                    $fila_notinf_cat=mysql_fetch_array($rst_notinf_cat);

                    //VARIABLES
                    $notInfCat_url=$fila_notinf_cat["url"];
                    $notInfCat_titulo=$fila_notinf_cat["categoria"];
                    $notInfCat_web=$web."seccion/".$notInf_categoria."/".$notInfCat_url;
            ?>
            <div class="box-note wmedia">

                <span class="time-cat">
                    <em class="time"><?php echo notaTiempo($notInf_fecha); ?></em>
                    <em class="categoria">
                      <a href="<?php echo $notInfCat_web; ?>"><?php echo $notInfCat_titulo; ?></a>
                    </em>
                </span>

                <div class="clear"></div>
        
                <div class="media-type left">
                    <a href="<?php echo $notInf_web; ?>">
                        <img src="<?php echo $notInf_web_img; ?>" alt="" width="200" height="110"><span class="play"></span></a>
                </div>

                <div class="share">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style "
                        addthis:url="<?php echo $notInf_web; ?>"
                        addthis:title="<?php echo $notInf_titulo; ?>" >
                    <a class="addthis_button_compact"></a>
                    </div>
                    <script>var addthis_config = {"data_track_addressbar":true};</script>
                    <script>var addthis_config = {"data_track_clickback": false};</script>
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=mals1990"></script>
                    <!-- AddThis Button END -->
                </div>
        
                <h2><a href="<?php echo $notInf_web; ?>">
                  <?php echo $notInf_titulo; ?></a></h2>
                <p class="intro"><?php echo $notInf_contenido; ?></p>
                <div class="clear"></div>

            </div><!-- FIN FLUJO -->
            <?php } ?>

            <div class="boton">
                <a target="_blank" href="#">Ver más noticias</a>
            </div>

      </div><!-- FIN FLUJOS -->
           

        <?php require_once("wg-sidebar.php"); ?>

        <div class="clear"></div>

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>
    
</body>

</html>
