<?php
include("conexion.php");

//VARIABLES DE USARIO Y PASS
$user=$_POST["usuario"];
$clave=$_POST["password"];

//FUNCION ANTI-INJECTION SQL
$usuario=mysql_real_escape_string($user);
$pass=mysql_real_escape_string($clave);

//QUUERY
$pass=sha1($pass);
$query=sprintf("SELECT * FROM dr_pei_usuario WHERE usuario='$usuario' AND password='$pass'");
$rst=mysql_query($query, $conexion);
$num_registros=mysql_num_rows($rst);

if($num_registros==1){
	$fila=mysql_fetch_array($rst);
	session_start();
	$_SESSION["user-".$sesion_pre.""]=$fila["usuario"];
	$_SESSION["user_nombre-".$sesion_pre.""]=$fila["nombre"];
	$_SESSION["user_apellido-".$sesion_pre.""]=$fila["apellidos"];
	$_SESSION["user_email-".$sesion_pre.""]=$fila["email"];
	header("Location:../index.php");
}elseif($num_registros==0) {
	mysql_close($conexion);
	header("Location:../../login.php?msj=2");
}
?>