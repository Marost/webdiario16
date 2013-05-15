<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=true;
$wg_leido=true;
$wg_impresa=true;
$wg_chica16=true;

//VARIABLES DE URL
$urlBuscar=$_REQUEST["busqueda"];
$url_web=$web."buscar.php";

//PAGINACION
require("libs/pagination/class_pagination.php");

if ($urlBuscar==""){
    //INICIO DE PAGINACION
    $page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
    $rst_nota        = mysql_query("SELECT COUNT(*) as count FROM dr_noticia WHERE publicar=1 ORDER BY fecha_publicacion DESC, id DESC", $conexion);
    $fila_nota       = mysql_fetch_assoc($rst_nota);
    $generated      = intval($fila_nota['count']);
    $pagination     = new Pagination("10", $generated, $page, $url_web."?page", 1, 0);
    $start          = $pagination->prePagination();
    $rst_nota        = mysql_query("SELECT * FROM dr_noticia WHERE publicar=1 ORDER BY fecha_publicacion DESC, id DESC LIMIT $start, 10", $conexion);
}elseif($urlBuscar<>""){
    //INICIO DE PAGINACION
    $page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
    $rst_nota        = mysql_query("SELECT COUNT(*) as count FROM dr_noticia WHERE titulo LIKE '%$urlBuscar%' AND publicar=1 ORDER BY fecha_publicacion DESC, id DESC", $conexion);
    $fila_nota       = mysql_fetch_assoc($rst_nota);
    $generated      = intval($fila_nota['count']);
    $pagination     = new Pagination("10", $generated, $page, $url_web."?page", 1, 0);
    $start          = $pagination->prePagination();
    $rst_nota        = mysql_query("SELECT * FROM dr_noticia WHERE titulo LIKE '%$urlBuscar%' AND publicar=1 ORDER BY fecha_publicacion DESC, id DESC LIMIT $start, 10", $conexion);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title> <?php echo $urlBuscar; ?>| Diario16</title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="">

    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- PAGINACION -->
    <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

</head>
<body id="home">

    <?php require_once("wg-header.php"); ?>

    <div class="container">
             
    <div class="all-news">
           
        <div class="news">

            <div class="searcher box_busqueda">

                <h3>Buscar: <span><?php echo $urlBuscar; ?></span></h3>
                
                <form action="buscar.php" method="get" name="busqueda" id="busqueda">
                    <input type="text" value="" name="busqueda" class="searchinput">
                    <button type="submit">Buscar</button>
                </form>
                <div class="clear"></div>

            </div>
            
            <?php while($fila_nota=mysql_fetch_array($rst_nota)){
                    $nota_id=$fila_nota["id"];
                    $nota_url=$fila_nota["url"];
                    $nota_titulo=$fila_nota["titulo"];
                    $nota_contenido=soloDescripcion($fila_nota["contenido"], 150);
                    $nota_imagen=$fila_nota["imagen"];
                    $nota_imagen_carpeta=$fila_nota["imagen_carpeta"];
                    $nota_fecha=$fila_nota["fecha_publicacion"];
                    $nota_web=$web."noticia/".$nota_id."-".$nota_url;
                    $nota_web_img=$web."imagenes/upload/".$nota_imagen_carpeta."thumb/".$nota_imagen;
                    $nota_categoria=$fila_nota["categoria"];

                    //SELECCIONAR CATEGORIA
                    $rst_nota_cat=mysql_query("SELECT * FROM dr_noticia_categoria WHERE id=$nota_categoria", $conexion);
                    $fila_nota_cat=mysql_fetch_array($rst_nota_cat);

                    //VARIABLES
                    $notInfCat_url=$fila_nota_cat["url"];
                    $notInfCat_titulo=$fila_nota_cat["categoria"];
                    $notInfCat_web=$web."seccion/".$nota_categoria."/".$notInfCat_url;
            ?>
            <div class="box-note wmedia">

                <span class="time-cat">
                    <em class="time"><?php echo notaTiempo($nota_fecha); ?></em>
                    <em class="categoria">
                      <a href="<?php echo $notInfCat_web; ?>"><?php echo $notInfCat_titulo; ?></a>
                    </em>
                </span>

                <div class="clear"></div>
        
                <div class="media-type left">
                    <a href="<?php echo $nota_web; ?>">
                        <img src="<?php echo $nota_web_img; ?>" alt="" width="200" height="110"><span class="play"></span></a>
                </div>

                <div class="share">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style "
                        addthis:url="<?php echo $nota_web; ?>"
                        addthis:title="<?php echo $nota_titulo; ?>" >
                    <a class="addthis_button_compact"></a>
                    </div>
                    <script>var addthis_config = {"data_track_addressbar":true};</script>
                    <script>var addthis_config = {"data_track_clickback": false};</script>
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=mals1990"></script>
                    <!-- AddThis Button END -->
                </div>
        
                <h2><a href="<?php echo $nota_web; ?>">
                  <?php echo $nota_titulo; ?></a></h2>
                <p class="intro"><?php echo $nota_contenido; ?></p>
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
