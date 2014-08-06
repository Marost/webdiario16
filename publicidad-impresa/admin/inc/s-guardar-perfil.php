<?php
session_start();
include("../conexion/conexion.php");
include("../conexion/funciones.php");
include("../conexion/verificar_sesion.php");

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$url=getUrlAmigable(eliminarTextoURL($nombre." ".$apellidos));
$telefono=$_POST["telefono"];

//INSERTANDO DATOS
$rst_guardar=mysql_query("UPDATE ".$tabla_suf."_pei_usuario_datos SET url='$url', nombre='$nombre', apellidos='$apellidos', telefono='$telefono' WHERE usuario='$usuario_user'",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:../index.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:../index.php?msj=ok");
}

?>