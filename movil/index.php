<?php
require_once("../panel@diario16/conexion/conexion.php");
require_once("../panel@diario16/conexion/funciones.php");

//VARIABLES URL
$menu_url=$_REQUEST["url"];

//NOTICIA DESTACADA
$rst_not_dest=mysql_query("SELECT * FROM dr_noticia WHERE destacada=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_dest=mysql_fetch_array($rst_not_dest);

//VARIABLES
$notDest_id=$fila_not_dest["id"];
$notDest_url=$fila_not_dest["url"];
$notDest_titulo=$fila_not_dest["titulo"];
$notDest_contenido=$fila_not_dest["contenido"];
$notDest_imagen=$fila_not_dest["imagen"];
$notDest_imagen_carpeta=$fila_not_dest["imagen_carpeta"];
$notDest_categoria=$fila_not_dest["categoria"];
$notDest_web=$web."noticia/".$notDest_id."-".$notDest_url;
$notDest_web_img=$web."imagenes/upload/".$notDest_imagen_carpeta."thumb/".$notDest_imagen;

//NOTICIAS
$rst_not_inf=mysql_query("SELECT * FROM dr_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 12", $conexion);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
		<meta name="robots" content="noindex,nofollow">

		<title>Diario16</title>

		<link type="text/css" rel="stylesheet" href="css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
		
		<!-- for the fixed header -->
		<style type="text/css">
			#header,
			#footer
			{
				position: fixed;
				width: 100%;

				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				-ms-box-sizing: border-box;
				-o-box-sizing: border-box;
				box-sizing: border-box;
			}
		</style>
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.mmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				var $menu = $('nav#menu'),
					$html = $('html, body');

				$menu.mmenu();
				$menu.find( 'li > a' ).on(
					'click',
					function()
					{
						var href = $(this).attr( 'href' );

						//	if the clicked link is linked to an anchor, scroll the page to that anchor 
						if ( href.slice( 0, 1 ) == '#' )
						{
							$menu.one(
								'closed.mm',
								function()
								{
									setTimeout(
										function()
										{
											$html.animate({
												scrollTop: $( href ).offset().top
											});	
										}, 10
									);	
								}
							);						
						}
					}
				);
			});
		</script>
	</head>
	<body>
		<div id="page">

			<!-- HEADER -->
			<div id="header" class="mm-fixed-top">
				<a href="#menu"></a>
				<img src="imagenes/logo.png" alt="">
			</div>
			<!-- FIN HEADER -->

			<!-- CONTENIDO -->
			<div id="content">

				<!-- NOTICIA DESTACADA -->
				<div id="not-import" class="<?php echo $notDestCat_url; ?>">

	                <div id="notimp-img">
	                    <img src="<?php echo $notDest_web_img; ?>" alt="" width="100%" >
	                </div>

	                <div id="notimp-dato">	                    
	                    <h2><a href="<?php echo $notDest_web; ?>" title=""><?php echo $notDest_titulo; ?></a></h2>
	                </div>

	            </div>
	            <!-- FIN NOTICIA DESTACADA -->
				
				<!-- LISTA DE NOTICIAS -->
	            <?php while($fila_not_inf=mysql_fetch_array($rst_not_inf)){
                    $notInf_id=$fila_not_inf["id"];
                    $notInf_url=$fila_not_inf["url"];
                    $notInf_titulo=$fila_not_inf["titulo"];
                    $notInf_imagen=$fila_not_inf["imagen"];
                    $notInf_imagen_carpeta=$fila_not_inf["imagen_carpeta"];
                    $notInf_fecha=$fila_not_inf["fecha_publicacion"];
                    if($fila_not_inf["fecha_publicacion"]=="0000-00-00 00:00:00"){
                        $notInf_fecha=$fila_not_inf["fecha"];
                    }else{ $notInf_fecha=notaTiempo($fila_not_inf["fecha_publicacion"]);} 
                    $notInf_web=$web."noticia/".$notInf_id."-".$notInf_url;
                    $notInf_web_img=$web."imagenes/upload/".$notInf_imagen_carpeta."thumb/".$notInf_imagen;
                    $notInf_categoria=$fila_not_inf["categoria"];

                    //SELECCIONAR CATEGORIA
                    $rst_notinf_cat=mysql_query("SELECT * FROM dr_noticia_categoria WHERE id=$notInf_categoria", $conexion);
                    $fila_notinf_cat=mysql_fetch_array($rst_notinf_cat);

                    //VARIABLES
                    $notInfCat_url=$fila_notinf_cat["url"];
                    $notInfCat_titulo=$fila_notinf_cat["categoria"];
                    $notInfCat_web=$web."seccion/".$notInf_categoria."/".$notInfCat_url;
	            ?>
	            <div class="box-note wmedia">

	            	<div class="media-type left">
	                    <a href="<?php echo $notInf_web; ?>">
	                        <img src="<?php echo $notInf_web_img; ?>" alt="" width="100%">
	                    </a>
	                </div>

	                <div class="titulo-time-cat">
	                    <em class="time"><?php echo $notInf_fecha; ?> -</em>
	                    <em class="categoria">
	                      <a href="<?php echo $notInfCat_web; ?>"><?php echo $notInfCat_titulo; ?></a>
	                    </em>
	                    <h2>
	                    	<a href="<?php echo $notInf_web; ?>"><?php echo $notInf_titulo; ?></a>
		                </h2>
	                </div>

	            </div><!-- FIN FLUJO -->
	            <?php } ?>
				<!-- FIN LISTA DE NOTICIAS -->

			</div>
			<!-- FIN CONTENIDO -->
			
			<!-- FOOTER -->
			<div id="footer" class="mm-fixed-bottom">
				Fixed footer :-)
			</div>
			<!-- FIN FOOTER -->

			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li><a href="/" <?php if($menu_url==""){ ?>class="activo"<?php } ?>>Inicio</a></li>
                    <li><a href="seccion/1/politica" <?php if($menu_url=="politica"){ ?>class="activo"<?php } ?>>Política</a></li>
                    <li><a href="seccion/4/economia" <?php if($menu_url=="economia"){ ?>class="activo"<?php } ?>>Economía</a></li>                          
                    <li><a href="seccion/2/actualidad" <?php if($menu_url=="actualidad"){ ?>class="activo"<?php } ?>>Actualidad</a></li>                          
                    <li><a href="seccion/5/internacionales" <?php if($menu_url=="internacionales"){ ?>class="activo"<?php } ?>>Internacionales</a></li>                          
                    <li><a href="seccion/6/deportes" <?php if($menu_url=="deportes"){ ?>class="activo"<?php } ?>>Deportes</a></li>                          
                    <li><a href="seccion/8/espectaculos" <?php if($menu_url=="espectaculos"){ ?>class="activo"<?php } ?>>Espectáculos</a></li>
                    <li><a href="seccion/9/culturales" <?php if($menu_url=="culturales"){ ?>class="activo"<?php } ?>>Culturales</a></li>
                    <li><a href="seccion/7/tecnologia" <?php if($menu_url=="tecnologia"){ ?>class="activo"<?php } ?>>Tecnología</a></li>
				</ul>
			</nav>
			<!-- FIN MENU -->

		</div>
	</body>
</html>