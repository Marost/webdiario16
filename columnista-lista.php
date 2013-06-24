<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=false;
$wg_leido=true;
$wg_impresa=true;
$wg_chica16=true;

//URL
$url_web=$web."columnistas";

//COLUMNISTAS
$rst_columnistas=mysql_query("SELECT * FROM dr_columnista WHERE publicar=1 ORDER BY nombre_completo ASC;", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title> Columnistas | Diario16</title>
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

                <h3 id="titulo-categoria"><?php echo $notInfCat_titulo; ?></h3>
    
            </div>

        </div><!-- FIN GRID DESTACADAS -->

    </div>
             
    <div class="all-news">
           
        <div class="news">
            
            <?php while($fila_columnistas=mysql_fetch_array($rst_columnistas)){
                    $notInf_id=$fila_columnistas["id"];
                    $notInf_url=$fila_columnistas["url"];
                    $notInf_titulo=$fila_columnistas["nombre_completo"];                    
                    $notInf_imagen=$fila_columnistas["foto"];                    
                    $notInf_web=$web."columnista/".$notInf_id."-".$notInf_url;
            ?>
            <div class="box-note wmedia">

                <span class="time-cat">
                    <em class="time"><?php echo notaTiempo($notInf_fecha); ?></em>
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
