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
$codigo=codigoAleatorio(15,false,true,false);

//SUBIR PORTADA
if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
    $fileName=$_FILES['archivo']['name'];
    $uploadDir="../../../imagenes/upload/";
    $uploadFile=$uploadDir.$fileName;
    $num = 0;
    $imagen = $fileName;
    $extension = end(explode('.',$fileName));
    $onlyName = substr($fileName,0,strlen($fileName)-(strlen($extension)+1));
    $imagen = codigoAleatorio(30,true,true,false).".".$extension;
    $uploadFile = $uploadDir.$imagen;
    move_uploaded_file($_FILES['archivo']['tmp_name'], $uploadFile);
}

//INSERTANDO DATOS
$rst_guardar=mysql_query("INSERT INTO ".$tabla_suf."_pei_publicidad (url, titulo, contenido, recibo_pago, fecha_publicacion, publicar, usuario, codigo) VALUES('$url', '$titulo', '$contenido', '$imagen', '$fecha', $publicar, '$usuario', '$codigo');",$conexion);

$rst_historial=mysql_query("INSERT INTO ".$tabla_suf."_pei_historial_pago(usuario, recibo_pago, fecha_pago, codigo) VALUES('$usuario', '$imagen', '$fecha', '$codigo') ", $conexion);

if (mysql_errno()!=0){
	echo "ERROR: <strong>".mysql_errno()."</strong> - ". mysql_error();
	mysql_close($conexion);
	header("Location:../index.php?msj=erpb");
} else {
	mysql_close($conexion);
	header("Location:../index.php?msj=okpb");
}

?>