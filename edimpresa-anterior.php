<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=false;
$wg_leido=false;
$wg_impresa=false;
$wg_chica16=false;
$wg_impresaAnt=true;

//VARAIBLES DE URL
$varUrl_anio=$_REQUEST["anio"];
$varUrl_mes=$_REQUEST["mes"];

//NOTICIA DESTACADA
$rst_nota=mysql_query("SELECT * FROM dr_portada WHERE anio=$varUrl_anio AND numero_mes=$varUrl_mes ORDER BY fecha ASC;", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Edición: <?php echo nombreMes($varUrl_mes); ?> del <?php echo $varUrl_anio; ?></title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="" >
    <meta name="keywords" content="">

    <!-- ESTILOS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" >
    <link rel="stylesheet" type="text/css" href="css/estilos-nota.css" >
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- CSS SELECT -->
    <link rel="stylesheet" href="/libs/css3-form/general/light/general-light.css" />

    <!-- CSS SEARCH -->
    <link rel="stylesheet" href="/libs/css3-form/search/light/search-light.css" />

</head>
<body id="nota">

    <?php require_once("wg-header.php"); ?>


<div class="container">
      
        <div id="news" class="news">
        
            <span class="time-pdf">
                <em class="fecha">
                    <?php echo nombreMes($varUrl_mes); ?> del <?php echo $varUrl_anio; ?>
                </em>
            </span>

            <div class="cnt-player">
                
                <ul>
                    <?php while($fila_nota=mysql_fetch_array($rst_nota)){
                            $nota_id=$fila_nota["id"];
                            $nota_fecha=explode("-", $fila_nota["fecha"]);
                            $nota_url=$fila_nota["url"];
                            $nota_imagen=$fila_nota["imagen"];
                            $nota_imagen_carpeta=$fila_nota["imagen_carpeta"];
                            $nota_webImg=$web."imagenes/upload/".$nota_imagen_carpeta."".$nota_imagen;
                            $nota_web=$web."edicion/digital/".$nota_id."/";
                    ?>
                    <li><a href="<?php echo $nota_web; ?>">
                        <img src="<?php echo $nota_webImg; ?>" alt="" width="120" height="130">
                        <?php echo $nota_fecha[2]; ?>
                    </a></li>
                    <?php } ?>
                </ul>

            </div>

            <div class="clear"></div>           
            

        </div>


        <?php require_once("wg-sidebar.php"); ?>

        <div class="clear"></div>

    </div>

    <?php require_once("wg-footer.php"); ?>

<script src="//assets.pinterest.com/js/pinit.js"></script>

</body>
</html>