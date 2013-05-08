<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

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

        <form id="submit-form" class="main" method="POST" action="s-guardar.php">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Agregar</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Imagen:</label> </div>
                        <div class="grid9">
                            <div class="widget nomargin">    
                                <div id="uploader">Tu navegador no soporta HTML5.</div>                    
                            </div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="body" align="center">
                            <a href="lista.php?jugador=<?php echo $jugador_id; ?>" class="buttonL bBlack">Cancelar</a>
                            <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                        </div>
                    </div>
                    
                </div>
            </fieldset>

        </form>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>
