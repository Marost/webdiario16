<?php
//LO MAS LEIDO
$rst_leido=mysql_query("SELECT * FROM dr_noticia WHERE STR_TO_DATE(fecha_publicacion, '%Y-%m-%d')=STR_TO_DATE('$fechaActual', '%Y-%m-%d') AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY visitas DESC LIMIT 5;", $conexion);

//EDICION IMPRESA
$rst_edimpresa=mysql_query("SELECT * FROM dr_portada ORDER BY id DESC LIMIT 1;", $conexion);
$fila_edimpresa=mysql_fetch_array($rst_edimpresa);

//VARIABLES
$edimpresa_id=$fila_edimpresa["id"];
$edimpresa_imagen=$fila_edimpresa["imagen"];
$edimpresa_imagen_carpeta=$fila_edimpresa["imagen_carpeta"];
$edimpresa_webImg=$web."imagenes/upload/".$edimpresa_imagen_carpeta."".$edimpresa_imagen;
$edimpresa_web=$web."edicion/digital/".$edimpresa_id."/";

//COLUMNISTAS
if(date("N")==1){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_lunes=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==2){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_martes=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==3){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_miercoles=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==4){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_jueves=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==5){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_viernes=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==6){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_sabado=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==7){ $rst_columselect=mysql_query("SELECT * FROM dr_columnista WHERE dia_domingo=1 AND publicar=1 ORDER BY id ASC;", $conexion);}

?>
<div id="columnr" class="sidebar last">

    <div class="cnt-impresa-d nobck nomrg">
        <a class="twitter-timeline" href="https://twitter.com/Diario16" data-widget-id="351410571381440512">Tweets por @Diario16</a> 

        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    </div>

    <?php if($wg_columnistas==true){ ?>
    <div class="cnt-impresa-d">
        <h4>Columnistas de Hoy</h4>

        <?php while($fila_columselect=mysql_fetch_array($rst_columselect)){
                $columSelect_id=$fila_columselect["id"];
                $columSelect_url=$fila_columselect["url"];
                $columSelect_titulo=$fila_columselect["nombre_completo"];
                $columSelect_imagen=$fila_columselect["foto"];
                
                //COLUMNA
                $rst_columna=mysql_query("SELECT * FROM dr_columnista_columna WHERE columnista=$columSelect_id ORDER BY id DESC LIMIT 1;", $conexion);
                $fila_columna=mysql_fetch_array($rst_columna);

                //VARIABLES
                $columna_id=$fila_columna["id"];
                $columna_url=$fila_columna["url"];
                $columna_titulo=$fila_columna["titulo"];

                //URLS
                $columSelect_webImg=$web."imagenes/columnistas/".$columSelect_imagen;
                $columSelect_webUrl=$web."columnista/".$columSelect_id."/".$columSelect_url."/".$columna_id."/".$columna_url;
        ?>
        <div class="columnistas">
            <div class="img"><img src="<?php echo $columSelect_webImg; ?>" alt="<?php echo $nombre_completo; ?>"></div>
            <div class="datos">
                <div class="nombre"><?php echo $columSelect_titulo; ?></div>
                <div class="titulo">
                    <h2><a href="<?php echo $columSelect_webUrl; ?>">
                        <?php echo $columna_titulo; ?></a></h2></div>
            </div>
        </div>
        <?php } ?>
      
        <div class="boton">
            <a href="columnistas">Ver Columnistas</a>
        </div>
    </div><!-- FIN COLUMNISTAS -->
    <?php } ?>
    
    <?php if($wg_leido==true){ ?>
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
    <?php } ?>
    
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
    
    <?php if($wg_impresa==true){ ?>
    <div class="cnt-impresa-d">
		<h4>Edición Impresa</h4>
		<div class="impresa-eco">
			<a target="_blank" href="<?php echo $edimpresa_web; ?>">
				<img width="308" alt="Diario16 - Edición Impresa" src="<?php echo $edimpresa_webImg; ?>">
			</a>
		</div>
		<div class="boton">
			<a target="_blank" href="<?php echo $edimpresa_web; ?>">Ver Edición Impresa</a>
		</div>
    </div><!-- FIN IMPRESA -->
    <?php } ?>
    
    <?php if($wg_chica16==true){ ?>
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
    <?php } ?>


    <div class="cnt-impresa-d nobck">
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=217179171676130";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-like-box" data-href="https://www.facebook.com/pages/Diario16/130961786950093" data-width="310" data-height="370" data-show-faces="true" data-stream="false" data-show-border="true" data-header="true"></div>

    </div>

    <!-- <div class="tags-portada">
        <h4>Temas destacados</h4>
        <ul>
			<li class=""><a href=""></a></li>
        </ul>
        <div class="clear"></div>
    </div> FIN TAGS  -->
              
</div><!-- FIN SIDEBAR -->