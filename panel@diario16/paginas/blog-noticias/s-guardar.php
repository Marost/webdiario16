<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$titulo=$_POST["titulo"];
$url=getUrlAmigable(eliminarTextoURL($titulo));
$enlace=$_POST["enlace"];
$blog=$_POST["blog"];

//FECHA Y HORA
$pub_fecha=$_POST["pub_fecha"];
$pub_hora=$_POST["pub_hora"];
$fecha_publicacion=$pub_fecha." ".$pub_hora;
$publicar=1;

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_blog_noticias (url, titulo, enlace, fecha_publicacion, publicar, blog) 
	VALUES('$url', '".htmlspecialchars($titulo)."', '$enlace', '$fecha_publicacion', $publicar, $blog);",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er&not=$blog");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok&not=$blog");
}

?>