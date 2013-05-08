<?php
//LO MAS LEIDO
$rst_leido=mysql_query("SELECT * FROM dr_noticia WHERE STR_TO_DATE(fecha_publicacion, '%Y-%m-%d')=STR_TO_DATE('$fechaActual', '%Y-%m-%d') AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY visitas DESC LIMIT 5;", $conexion);

$rst_tagsDest=mysql_query("SELECT * FROM dr_noticia_tags WHERE ", $conexion);
?>

<div id="columnr" class="sidebar last">                
                    
    <div class="cnt-impresa-d">
    	<h4>Columnistas de Hoy</h4>

      	<div class="columnistas">
        	<div class="img"><img src="http://diario16.pe/imagenes/columnistas/o8dtyl9vhjkajvgudjqd.png" alt=""></div>
        	<div class="datos">
        		<div class="nombre">Juan Sheput</div>
          		<div class="titulo">Un indulto contaminado por el oportunismo</div>
        	</div>
      	</div>

      	<div class="columnistas">
        	<div class="img"><img src="http://diario16.pe/imagenes/columnistas/gixwpciao8rj1sadgy6g.png" alt=""></div>
        	<div class="datos">
          		<div class="nombre">Augusto Ortiz de Zevallos</div>
          		<div class="titulo">Hay solo veinte meses</div>
        	</div>
      	</div>
      
    	<div class="boton">
        	<a target="_blank" href="#">Ver Columnistas</a>
      	</div>
    </div><!-- FIN COLUMNISTAS -->
            
    <div id="cnt-opt-tabs">

        <ul id="tabs-mas">
            <li class="primero">
                <span>Lo más leído:</span>
            </li>
        </ul>

        <div class="tabs-cnt-mas">
            <div id="cntmasvistas">
      
            	<div id="cntnoticias" class="">
                	<div class="cnt-lista">

                		<?php while($fila_leido=mysql_fetch_array($rst_leido)){
                				$leido_id=$fila_leido["id"];
                				$leido_url=$fila_leido["url"];
                				$leido_titulo=$fila_leido["titulo"];
                				$leido_visitas=$fila_leido["visitas"];
                				$leido_web=$web."noticia/".$fila_leido["id"]."-".$leido_url;
                		?>
            			<div class="cnt-agrupado">
                			<h5><a href="<?php echo $leido_web; ?>"><?php echo $leido_titulo; ?></a></h5>
              			</div>
                  		<div class="clear"></div>
                  		<?php } ?>

                	</div>

                	<!-- <div class="boton">
                    	<a href="masvistas.html">Ver todas</a>
                	</div> -->
              	</div>
                          
            </div><!-- MAS VISTAS -->                    
            
        </div>
    </div><!-- FIN TABS -->
    
    <!--    
    <div class="youtubemv" id="youtube">
		<h4>lo más visto en youtube</h4>
		<div class="playermv"></div>
		<ul class="video-lista">
			<li><a class="activovideo" href="#l06spAoJjQQ">Harlem Shake de Backstreet Boys</a></li>
			<li><a  href="#v-l2zl85PHs">Hombre es golpeado por estatua humana</a></li>
			<li><a  href="#6LyuKmrq4lE">Los mejores virales</a></li>
			<li><a  href="#JxhIs-oOYaY">Cantante de One Direction recibe golpe bajo</a></li>
			<li><a  href="#D36JUfE1oYk">Gato conoce a un erizo</a></li>
		</ul>
    </div> FIN YOUTUBE -->

    <hr class="deleted">

    <div class="cnt-impresa-d">
		<h4>Edición Impresa</h4>
		<div class="impresa-eco">
			<a target="_blank" href="#">
				<img width="308" alt="Diario16 - Edición Impresa" src="http://diario16.pe/imagenes/upload/07-04-2013.jpg">
			</a>
		</div>
		<div class="boton">
			<a target="_blank" href="#">Ver Edición Impresa</a>
		</div>
    </div><!-- FIN IMPRESA -->

    <div class="cnt-impresa-d">
		<h4>Chica16</h4>
		<div class="impresa-eco">
			<a target="_blank" href="#">
				<img width="308" alt="Chica16" src="imagenes/chica.jpg">
			</a>
		</div>
		<div class="boton">
			<a target="_blank" href="#">Ver Chica16</a>
		</div>
    </div><!-- FIN IMPRESA -->

    <!-- <div class="tags-portada">
        <h4>Temas destacados</h4>
        <ul>
			<li class="lvl-5"><a href="">Elecciones en Venezuela 2013</a></li>
			<li class="lvl-5"><a href="">Revocación a Villarán</a></li>
			<li class="lvl-5"><a href="">Francisco I</a></li>
			<li class="lvl-5"><a href="">Ollanta Humala</a></li>
			<li class="lvl-4"><a href="">Nicolás Maduro</a></li>
			<li class="lvl-4"><a href="">La Hora del Planeta</a></li>
			<li class="lvl-4"><a href="">Sergio Markarián</a></li>
			<li class="lvl-3"><a href="">Dakar 2014</a></li>
			<li class="lvl-3"><a href="">Eliminatorias Brasil 2014</a></li>
			<li class="lvl-2"><a href="">Copa Libertadores 2013</a></li>
			<li class="lvl-2"><a href="">Descentralizado 2013</a></li>
			<li class="lvl-1"><a href="">Al fondo hay sitio</a></li>
        </ul>
        <div class="clear"></div>
    </div> FIN TAGS  -->
              
</div><!-- FIN SIDEBAR -->