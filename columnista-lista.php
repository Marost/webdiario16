<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=false;
$wg_leido=false;
$wg_impresa=true;
$wg_chica16=false;

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

                    <h3 id="titulo-categoria">Columnistas</h3>
        
                </div>

            </div><!-- FIN GRID DESTACADAS -->

        </div>
                 
        <div class="all-news">
               
            <div class="news-columnistas">
                
                <?php while($fila_columnistas=mysql_fetch_array($rst_columnistas)){
                        $notInf_id=$fila_columnistas["id"];
                        $notInf_url=$fila_columnistas["url"];
                        $notInf_titulo=$fila_columnistas["nombre_completo"];                    
                        $notInf_imagen=$fila_columnistas["foto"];                    
                        $notInf_web=$web."columnista/".$notInf_id."-".$notInf_url;
                        $notInf_web_img=$web."imagenes/columnistas/".$notInf_imagen;
                ?>
                <div class="box-note">

                    <div class="media-type left">
                        <a href="<?php echo $notInf_web; ?>">
                            <img src="<?php echo $notInf_web_img; ?>" alt="" width="100" height="100"></a>
                        <h2><a href="<?php echo $notInf_web; ?>"><?php echo $notInf_titulo; ?></a></h2>
                    </div>

                    <div class="clear"></div>

                </div><!-- FIN FLUJO -->
                <?php } ?>

            </div><!-- FIN FLUJOS -->

            <?php require_once("wg-sidebar.php"); ?>

            <div class="clear"></div>

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>

<script src='http://ads60251.hotwords.com/show.jsp?id=60251&cor=FF0000&tag=div&atr=id&vatr=textonota'></script>
    
</body>

</html>
