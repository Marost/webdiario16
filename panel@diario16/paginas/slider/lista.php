<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES DE URL
$mensaje=$_REQUEST["msj"];

//GALERIA DE JUGADORES
$rst_jugadores=mysql_query("SELECT * FROM ".$tabla_suf."_noticia ORDER BY id DESC LIMIT 15;", $conexion);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

<!-- ELIMINAR  -->
<script type="text/javascript">
function eliminarRegistro(registro) {
    if(confirm("¿Está seguro de borrar este registro?")) {
        document.location.href="s-eliminar.php?id="+registro;
    }
}
</script>

</head>

<body>

<!-- Top line begins -->
<?php require_once("../../w-topline.php"); ?>
<!-- Top line ends -->


<!-- Sidebar begins -->
<div id="sidebar">
    
    <?php require_once("../../w-sidebarmenu.php"); ?>
    
    <!-- Secondary nav -->
    <div class="secNav">
        <div class="secWrapper">
            <div class="secTop">
                <div class="balance">                    
                </div>
            </div>
            
            <div class="divider"><span></span></div>
            
            <!-- Sidebar subnav -->
            <ul class="subNav">
                <li><a href="../entrevistas/lista.php" title=""><span class="icos-frames"></span>Entrevistas</a></li>
                <li><a href="lista.php" title="" class="this"><span class="icos-frames"></span>Jugadores</a></li>
                <li><a href="../noticias/lista.php" title=""><span class="icos-frames"></span>Noticias</a></li>
                <li><a href="../posiciones/lista.php" title=""><span class="icos-frames"></span>Posiciones</a></li>
            </ul>
            
            <div class="divider"><span></span></div>
                    
        </div> 
    </div>
</div>
<!-- Sidebar ends -->    
	
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Slider</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <ul class="middleNavR">
            <li><a href="f-agregar.php" title="Agregar" class="tipN">
                <img src="../../images/icons/middlenav/create.png" alt="" /></a></li>
        </ul>

        <?php if($mensaje=="ok"){ ?>
        <div class="nNote nSuccess">
            <p>El registro se guardo correctamente</p>
        </div>
        <?php }elseif($mensaje=="er"){ ?>
        <div class="nNote nFailure">
            <p>Se produjo un error</p>
        </div>
        <?php }elseif($mensaje=="el"){ ?>
        <div class="nNote nSuccess">
            <p>El registro se elimino correctamente</p>
        </div>
        <?php } ?>

        <!-- Media table sample -->
        <div class="widget">
            <div class="whead"><h6>Slider</h6></div>
            <div class="gallery">
               <ul>
                    <?php while($fila_jugadores=mysql_fetch_array($rst_jugadores)){
                            $galeria_id=$fila_jugadores["id"];
                            $galeria_imagen=$fila_jugadores["imagen"];
                            $galeria_imagen_carpeta=$fila_jugadores["imagen_carpeta"];
                    ?>
                    <li>
                        <a href="javascript:;" class="lightbox" title="">
                            <img src="../../../upload/<?php echo $galeria_imagen_carpeta."thumb/".$galeria_imagen; ?>" alt="" />
                        </a>
                        <div class="actions">
                            <a href="f-editar.php?id=<?php echo $galeria_id; ?>" title="" class="edit">
                                <img src="../../images/icons/update.png" alt="" /></a>
                            <a href="s-eliminar.php?id=<?php echo $galeria_id; ?>" title="" class="remove">
                                <img src="../../images/icons/delete.png" alt="" /></a>
                        </div>
                    </li>
                    <?php } ?>
               </ul> 
           </div>
        </div>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>
