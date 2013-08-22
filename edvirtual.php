<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//PORTADA
$idportada=$_REQUEST["id"];
$fecha=$_REQUEST["url"];
$rst_query=mysql_query("SELECT * FROM dr_portada WHERE id=$idportada AND url='$fecha'", $conexion);
$fila_query=mysql_fetch_array($rst_query);
$num_query=mysql_num_rows($rst_query);
if($num_query==0){header("Location: $web");}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Revista Virtual - Diario 16</title>
  <base href="<?php echo $web; ?>" />
  <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
  <script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-20229980-2']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
</head>
<body>
  <?php 
  if($fila_query["revista"]==""){
    echo "<p align='center' style='padding:10px'><strong>ERROR EN EL SERVIDOR. ESTAMOS SOLUCIONANDO EL PROBLEMA.<br/>DISCULPE LAS MOLESTIAS.<br/>DIARIO16</strong></p>";
  }else{
    echo $fila_query["revista"];
  } ?>

<script src='http://ads60251.hotwords.com/show.jsp?id=60251&cor=FF0000&tag=div&atr=id&vatr=textonota'></script>
</body>
</html>