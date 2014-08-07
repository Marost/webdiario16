<?php
session_start();
include("../conexion/conexion.php");
include("../conexion/funciones.php");
include("../conexion/verificar_sesion.php");

//DECLARACION DE VARIABLES
$clave=sha1($_POST["clave"]);

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_pei_usuario SET password='$clave' WHERE usuario='$usuario_user'",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:../index.php?msj=erps");
} else {
	mysql_close($conexion);
	header("Location:../index.php?msj=okps");
}

?>