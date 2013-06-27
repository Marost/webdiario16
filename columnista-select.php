<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=false;
$wg_leido=false;
$wg_impresa=true;
$wg_chica16=false;

//VARIABLES DE URL
$reqId=$_REQUEST["id"];
$reqUrl=$_REQUEST["url"];

$url_web=$web."columnista/".$reqId."-".$reqUrl;

//COLUMNISTA
$rst_columnista=mysql_query("SELECT * FROM dr_columnista WHERE id=$reqId", $conexion);
$fila_columnista=mysql_fetch_array($rst_columnista);

//VARIABLES
$columnista_titulo=$fila_columnista["nombre_completo"];

//PAGINACION
require("libs/pagination/class_pagination.php");

//INICIO DE PAGINACION
$page = (isset($_GET['page'])) ? intval($_GET['page']) : 1;
$rst_nota        = mysql_query("SELECT COUNT(*) as count FROM dr_columnista_columna WHERE columnista=$reqId ORDER BY fecha DESC, id DESC", $conexion);
$fila_nota       = mysql_fetch_assoc($rst_nota);
$generated      = intval($fila_nota['count']);
$pagination     = new Pagination("10", $generated, $page, $url_web."&page", 1, 0);
$start          = $pagination->prePagination();
$rst_nota        = mysql_query("SELECT * FROM dr_columnista_columna WHERE columnista=$reqId ORDER BY fecha DESC, id DESC LIMIT $start, 10", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title> <?php echo $columnista_titulo; ?> | Diario16</title>
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

    <div id="main-content">
                     
        <div class="destacados-noticias">

            <div id="not-super">

                <h3 id="titulo-categoria"><a href="columnistas">&lt;&lt;</a> <?php echo $columnista_titulo; ?></h3>
    
            </div>

        </div><!-- FIN GRID DESTACADAS -->

    </div>
             
    <div class="all-news">
           
        <div class="news">
            
            <?php while($fila_nota=mysql_fetch_array($rst_nota)){
                    $nota_id=$fila_nota["id"];
                    $nota_url=$fila_nota["url"];
                    $nota_titulo=$fila_nota["titulo"];
                    $nota_contenido=soloDescripcion($fila_nota["contenido"], 150);
                    $nota_fecha=explode("-",$fila_nota["fecha"]);
                    $nota_web=$web."columnista/".$reqId."/".$reqUrl."/".$nota_id."/".$nota_url;
            ?>
            <div class="box-note wmedia">

                <span class="time-cat">
                    <em class="time"><?php echo nombreFecha($nota_fecha[0],$nota_fecha[1],$nota_fecha[2]); ?></em>
                </span>

                <div class="clear"></div>
        
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
