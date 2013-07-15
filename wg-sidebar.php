<?php
//LO MAS LEIDO
//$rst_leido=mysql_query("SELECT * FROM dr_noticia WHERE STR_TO_DATE(fecha_publicacion, '%Y-%m-%d')=STR_TO_DATE('$fechaActual', '%Y-%m-%d') AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY visitas DESC LIMIT 5;", $conexion);

//EDICION IMPRESA
$rst_edimpresa=mysql_query("SELECT * FROM dr_portada ORDER BY id DESC LIMIT 1;", $conexion);
$fila_edimpresa=mysql_fetch_array($rst_edimpresa);

//VARIABLES
$edimpresa_id=$fila_edimpresa["id"];
$edimpresa_imagen=$fila_edimpresa["imagen"];
$edimpresa_imagen_carpeta=$fila_edimpresa["imagen_carpeta"];
$edimpresa_webImg=$web."imagenes/upload/".$edimpresa_imagen_carpeta."".$edimpresa_imagen;
$edimpresa_web=$web."edicion/digital/".$edimpresa_id."/";

//EDICIONES ANTERIORES
$rst_edimpresaAnt=mysql_query("SELECT DISTINCT anio FROM dr_portada", $conexion);

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

    <?php if($wg_impresaAnt==true){ ?>
    <!-- IMPRESA ANTERIORES -->
    <div class="cnt-impresa-d">
        <h4>Ediciones anteriores</h4>
        <form name="busqueda" action="edicion" class="search-form noframe nobtn rsmall">

            <div class="select-wrapper">
                <select name="anio">
                    <option value="">Seleccion año</option>
                    <?php while($fila_edimpresaAnt=mysql_fetch_array($rst_edimpresaAnt)){
                        $fechaAnio=$fila_edimpresaAnt["anio"];
                    ?>
                    <option value="<?php echo $fechaAnio; ?>"><?php echo $fechaAnio; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="select-wrapper">
                <select name="mes">
                    <option value="">Seleccion mes</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>

            <input class="form-btn" value="Ver mes seleccionado" type="submit">

        </form>

    </div>
    <!-- FIN IMPRESA ANTERIORES -->
    <?php } ?>
    
    <!-- TWITTER -->
    <div class="cnt-impresa-d nobck nomrg">

        <a class="twitter-timeline" href="https://twitter.com/Diario16" data-widget-id="351410571381440512">Tweets por @Diario16</a> 

        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    </div>
    <!-- FIN TWITTER -->
    
    <?php if($wg_pubjc==true){ ?>
    <!-- BANNER 310 -->
    <div class="banner-310">
        
        <script type="text/javascript"><!--
            google_ad_client = "ca-pub-6739008060658295";
            /* Diario16 - Sidebar */
            google_ad_slot = "8872927055";
            google_ad_width = 300;
            google_ad_height = 250;
            //-->
        </script>

        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>

    </div>
    <!-- FIN BANNER 310 -->
    <?php } ?>

    <?php if($wg_pubdr==true){ ?>
    <!-- BANNER 310 -->
    <div class="banner-310">
        
        

    </div>
    <!-- FIN BANNER 310 -->
    <?php } ?>

    <?php if($wg_columnistas==true){ ?>
    <!-- COLUMNISTAS -->
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
            <div class="img">
                <img src="<?php echo $columSelect_webImg; ?>" alt="<?php echo $nombre_completo; ?>" width="65" height="75" >
            </div>
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
    </div>
    <!-- FIN COLUMNISTAS -->
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
                            <p><?php echo $leido_visitas; ?></p>
                			<h5><a href="<?php echo $leido_web; ?>"><?php echo $leido_titulo; ?></a></h5>
              			</div>
                  		<div class="clear"></div>
                  		<?php } ?>

                	</div>

              	</div>
                          
            </div><!-- MAS VISTAS -->                    
            
        </div>
    </div><!-- FIN TABS -->
    <?php } ?>

    <hr class="deleted">
    
    <?php if($wg_impresa==true){ ?>
    <!-- IMPRESA -->
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
    </div>
    <!-- FIN IMPRESA -->
    <?php } ?>
    
    <?php if($wg_chica16==true){ ?>
    <!-- CHICA16 -->
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
    </div>
    <!-- FIN CHICA16 -->
    <?php } ?>

    <!-- FACEBOOK -->
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
    <!-- FIN FACEBOOK -->
              
</div><!-- FIN SIDEBAR -->