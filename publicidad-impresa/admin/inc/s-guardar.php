<?php
session_start();
include("../conexion/conexion.php");
include("../conexion/funciones.php");
include("../conexion/verificar_sesion.php");

//DECLARACION DE VARIABLES
$titulo=htmlspecialchars($_POST["titulo"]);
$url=getUrlAmigable(eliminarTextoURL($titulo));
$contenido=$_POST["contenido"];
$fecha=$fechaActual;
$publicar=0;
$usuario=$usuario_user;

//SUBIR PORTADA
if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
	$fileName=$_FILES['archivo']['name'];
	$uploadDir="../../imagenes/upload/";
	$uploadFile=$uploadDir.$fileName;
	$num = 0;
	$name = $fileName;
	$extension = end(explode('.',$fileName));     
	$onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension)+1));
	while(file_exists($uploadDir.$name))
	{
		$num++;         
		$name = $onlyName."".$num.".".$extension; 
	}
	$uploadFile = $uploadDir.$name; 
	move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadFile);
	$name;
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_pei_publicidad (url, titulo, contenido, recibo_pago, fecha_publicacion, publicar, usuario) VALUES('$url', '$titulo', '$contenido', '$name', '$fecha', $publicar, '$usuario');",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:../index.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:../index.php?msj=ok");
}

?>