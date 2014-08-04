<?php
require_once("admin/conexion/conexion.php");
require_once("admin/conexion/funciones.php");

//URL
$VerifyId=$_REQUEST["id"];

//VERIFICAR
$qr_verify=mysql_query("SELECT * FROM dr_pei_usuario_datos WHERE activacion_codigo='$VerifyId'", $conexion);
$nm_verify=mysql_num_rows($qr_verify);
$fl_verify=mysql_fetch_array($qr_verify);

//ACTIVACION
$VerExist=$fl_verify["activacion"];

//VERIFICAR SI EXISTE
if($nm_verify>0){

    if($VerExist==0){
        $qr_VExist=mysql_query("UPDATE dr_pei_usuario_datos SET activacion=1 WHERE activacion_codigo='$VerifyId'", $conexion);
        $rpt_VExist=true;
    }elseif($VerExist==1){
        $rpt_VExist=false;
    }

}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
  	<title> Verificación | Diario16 </title>
    <meta charset="utf-8">

    <?php require_once("wg-header-script.php"); ?>
       
</head>

<body class="woodbg">

	<div class="smart-wrap">
    	<div class="smart-forms smart-container wrap-2">
        
        	<div class="form-header header-red">
            	<h4><img src="<?php echo $web; ?>imagenes/logo.png" alt="logo"></h4>
            </div><!-- end .form-header section -->
            
            <div class="form-body">

                <?php if($rpt_VExist==true){ ?>
                <div class="alert notification alert-success spacer-b10"><i class="fa fa-check"></i> Tu cuenta ha sido activada satisfactoriamente.</div>
                <?php }elseif($rpt_VExist==false){ ?>
                <div class="alert notification alert-error spacer-b10"><i class="fa fa-times"></i> Tu cuenta ya fue activada anteriormente.</div>
                <?php } ?>

                <a href="login.php" class="button btn-red">Iniciar sesión</a>

            </div><!-- end .form-body section -->
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
    
    <div></div><!-- end section -->

</body>
</html>
