<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$id=$_REQUEST["id"];
$not=$_REQUEST["not"];

mysql_query("DELETE FROM ".$tabla_suf."_blog_noticias WHERE id=$id;", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er&not=$not");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=el&not=$not");
}

?>