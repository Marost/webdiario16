<?php
session_start();
include("../../conexion/conexion.php");
include("../../conexion/funciones.php");
require_once('../../js/plugins/thumbs/ThumbLib.inc.php');

//DECLARACION DE VARIABLES
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$nombre_completo=$nombres." ".$apellidos;
$url=getUrlAmigable(eliminarTextoURL($nombre_completo));
$contenido=$_POST["contenido"];
$dias_pub=$_POST["dias_pub"];
$publicar=1;

//DIAS DE PUBLICACION
if($dias_pub==1){ $dia_lunes=1; }
if($dias_pub==2){ $dia_martes=2; }
if($dias_pub==3){ $dia_miercoles=3; }
if($dias_pub==4){ $dia_jueves=4; }
if($dias_pub==5){ $dia_viernes=5; }
if($dias_pub==6){ $dia_sabado=6; }
if($dias_pub==7){ $dia_domingo=7; }

//SUBIR IMAGEN
if(is_uploaded_file($_FILES['fileInput']['tmp_name'])){ 
	$fileName=$_FILES['fileInput']['name'];
	$uploadDir="../../../imagenes/columnistas/";
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
	move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadFile);  
	$name;
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_columnista (url,
	nombre,
	apellidos,
	nombre_completo,
	foto,
	descripcion,
	publicar,
	dia_lunes,
	dia_martes,
	dia_miercoles,
	dia_jueves,
	dia_viernes,
	dia_sabado,
	dia_domingo) VALUES('$url', 
	'$nombres',
	'$apellidos'
	'".htmlspecialchars($nombre_completo)."', 
	'$contenido', '$imagen', '$imagen_carpeta', '$fecha_publicacion', $publicar, $destacada, $superior, $categoria, '0,$union_tags,0');",$conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:lista.php?msj=er");
} else {
	mysql_close($conexion);
	header("Location:lista.php?msj=ok");
}

?>