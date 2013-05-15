<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=true;
$wg_leido=true;
$wg_impresa=true;
$wg_chica16=true;

//VARIABLES DE URL
$reqId=$_REQUEST["id"];
$reqUrl=$_REQUEST["url"];

$url_web=$web."seccion/".$reqId."/".$reqUrl;

//PAGINACION
require("libs/pagination/class_pagination.php");

//INICIO DE PAGINACION
$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$rst_not_inf        = mysql_query("SELECT COUNT(*) as count FROM dr_noticia WHERE categoria=$reqId AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC", $conexion);
$fila_not_inf       = mysql_fetch_assoc($rst_not_inf);
$generated      = intval($fila_not_inf['count']);
$pagination     = new Pagination("10", $generated, $page, $url_web."?page", 1, 0);
$start          = $pagination->prePagination();
$rst_not_inf        = mysql_query("SELECT * FROM dr_noticia WHERE categoria=$reqId AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT $start, 10", $conexion);

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

    <!-- PAGINACION -->
    <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

</head>
<body id="home">

    <?php require_once("wg-header.php"); ?>

    <div class="container">

    <div id="main-content">
                     
        <div class="destacados-noticias">

            <div id="not-super">

                <h3 id="titulo-categoria"><?php echo $reqUrl; ?></h3>
    
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
                <?php $pagination->pagination(); ?>
            </div>

      </div><!-- FIN FLUJOS -->
           

        <?php require_once("wg-sidebar.php"); ?>

        <div class="clear"></div>

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>
    
</body>

</html>
