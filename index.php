<?php
require_once("panel@diario16/conexion/conexion.php");
require_once("panel@diario16/conexion/funciones.php");

//WIDGETS
$wg_columnistas=true;
$wg_leido=true;
$wg_impresa=true;
$wg_chica16=false;
$wg_columselect=true;

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

//NOTICIA DESTACADA - CATEGORIA
$rst_notdest_cat=mysql_query("SELECT * FROM dr_noticia_categoria WHERE id=$notDest_categoria;", $conexion);
$fila_notdest_cat=mysql_fetch_array($rst_notdest_cat);

//VARIABLES
$notDestCat_url=$fila_notdest_cat["url"];
$notDestCat_titulo=$fila_notdest_cat["categoria"];
$notDestCat_web=$web."seccion/".$notDest_categoria."/".$fila_notdest_cat["url"];

//NOTICIA SUPERIOR 1
$rst_not_sup1=mysql_query("SELECT * FROM dr_noticia WHERE superior_1=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup1=mysql_fetch_array($rst_not_sup1);

//VARIABLES
$notSup1_id=$fila_not_sup1["id"];
$notSup1_url=$fila_not_sup1["url"];
$notSup1_titulo=$fila_not_sup1["titulo"];
$notSup1_imagen=$fila_not_sup1["imagen"];
$notSup1_imagen_carpeta=$fila_not_sup1["imagen_carpeta"];
$notSup1_categoria=$fila_not_sup1["categoria"];
$notSup1_web=$web."noticia/".$notSup1_id."-".$notSup1_url;
$notSup1_web_img=$web."imagenes/upload/".$notSup1_imagen_carpeta."thumb/".$notSup1_imagen;

//CATEGORIA
$fila_notsup1_cat=seleccionTabla($notSup1_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup1Cat_url=$fila_notsup1_cat["url"];
$notSup1Cat_titulo=$fila_notsup1_cat["categoria"];
$notSup1Cat_web=$web."seccion/".$notSup1_categoria."/".$notSup1Cat_url;

//NOTICIA SUPERIOR 2
$rst_not_sup2=mysql_query("SELECT * FROM dr_noticia WHERE superior_2=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup2=mysql_fetch_array($rst_not_sup2);

//VARIABLES
$notSup2_id=$fila_not_sup2["id"];
$notSup2_url=$fila_not_sup2["url"];
$notSup2_titulo=$fila_not_sup2["titulo"];
$notSup2_imagen=$fila_not_sup2["imagen"];
$notSup2_imagen_carpeta=$fila_not_sup2["imagen_carpeta"];
$notSup2_categoria=$fila_not_sup2["categoria"];
$notSup2_web=$web."noticia/".$notSup2_id."-".$notSup2_url;
$notSup2_web_img=$web."imagenes/upload/".$notSup2_imagen_carpeta."thumb/".$notSup2_imagen;

//CATEGORIA
$fila_notsup2_cat=seleccionTabla($notSup2_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup2Cat_url=$fila_notsup2_cat["url"];
$notSup2Cat_titulo=$fila_notsup2_cat["categoria"];
$notSup2Cat_web=$web."seccion/".$notSup2_categoria."/".$notSup2Cat_url;

//NOTICIA SUPERIOR 3
$rst_not_sup3=mysql_query("SELECT * FROM dr_noticia WHERE superior_3=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup3=mysql_fetch_array($rst_not_sup3);

//VARIABLES
$notSup3_id=$fila_not_sup3["id"];
$notSup3_url=$fila_not_sup3["url"];
$notSup3_titulo=$fila_not_sup3["titulo"];
$notSup3_imagen=$fila_not_sup3["imagen"];
$notSup3_imagen_carpeta=$fila_not_sup3["imagen_carpeta"];
$notSup3_categoria=$fila_not_sup3["categoria"];
$notSup3_web=$web."noticia/".$notSup3_id."-".$notSup3_url;
$notSup3_web_img=$web."imagenes/upload/".$notSup3_imagen_carpeta."thumb/".$notSup3_imagen;

//CATEGORIA
$fila_notsup3_cat=seleccionTabla($notSup3_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup3Cat_url=$fila_notsup3_cat["url"];
$notSup3Cat_titulo=$fila_notsup3_cat["categoria"];
$notSup3Cat_web=$web."seccion/".$notSup3_categoria."/".$notSup3Cat_url;

//NOTICIA SUPERIOR 4
$rst_not_sup4=mysql_query("SELECT * FROM dr_noticia WHERE superior_4=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup4=mysql_fetch_array($rst_not_sup4);

//VARIABLES
$notSup4_id=$fila_not_sup4["id"];
$notSup4_url=$fila_not_sup4["url"];
$notSup4_titulo=$fila_not_sup4["titulo"];
$notSup4_imagen=$fila_not_sup4["imagen"];
$notSup4_imagen_carpeta=$fila_not_sup4["imagen_carpeta"];
$notSup4_categoria=$fila_not_sup4["categoria"];
$notSup4_web=$web."noticia/".$notSup4_id."-".$notSup4_url;
$notSup4_web_img=$web."imagenes/upload/".$notSup4_imagen_carpeta."thumb/".$notSup4_imagen;

//CATEGORIA
$fila_notsup4_cat=seleccionTabla($notSup4_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup4Cat_url=$fila_notsup4_cat["url"];
$notSup4Cat_titulo=$fila_notsup4_cat["categoria"];
$notSup4Cat_web=$web."seccion/".$notSup4_categoria."/".$notSup4Cat_url;

//NOTICIA SUPERIOR 5
$rst_not_sup5=mysql_query("SELECT * FROM dr_noticia WHERE superior_5=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup5=mysql_fetch_array($rst_not_sup5);

//VARIABLES
$notSup5_id=$fila_not_sup5["id"];
$notSup5_url=$fila_not_sup5["url"];
$notSup5_titulo=$fila_not_sup5["titulo"];
$notSup5_imagen=$fila_not_sup5["imagen"];
$notSup5_imagen_carpeta=$fila_not_sup5["imagen_carpeta"];
$notSup5_categoria=$fila_not_sup5["categoria"];
$notSup5_web=$web."noticia/".$notSup5_id."-".$notSup5_url;
$notSup5_web_img=$web."imagenes/upload/".$notSup5_imagen_carpeta."thumb/".$notSup5_imagen;

//CATEGORIA
$fila_notsup5_cat=seleccionTabla($notSup5_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup5Cat_url=$fila_notsup5_cat["url"];
$notSup5Cat_titulo=$fila_notsup5_cat["categoria"];
$notSup5Cat_web=$web."seccion/".$notSup5_categoria."/".$notSup5Cat_url;

//NOTICIA SUPERIOR 6
$rst_not_sup6=mysql_query("SELECT * FROM dr_noticia WHERE superior_6=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup6=mysql_fetch_array($rst_not_sup6);

//VARIABLES
$notSup6_id=$fila_not_sup6["id"];
$notSup6_url=$fila_not_sup6["url"];
$notSup6_titulo=$fila_not_sup6["titulo"];
$notSup6_imagen=$fila_not_sup6["imagen"];
$notSup6_imagen_carpeta=$fila_not_sup6["imagen_carpeta"];
$notSup6_categoria=$fila_not_sup6["categoria"];
$notSup6_web=$web."noticia/".$notSup6_id."-".$notSup6_url;
$notSup6_web_img=$web."imagenes/upload/".$notSup6_imagen_carpeta."thumb/".$notSup6_imagen;

//CATEGORIA
$fila_notsup6_cat=seleccionTabla($notSup6_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup6Cat_url=$fila_notsup6_cat["url"];
$notSup6Cat_titulo=$fila_notsup6_cat["categoria"];
$notSup6Cat_web=$web."seccion/".$notSup6_categoria."/".$notSup6Cat_url;

//NOTICIA SUPERIOR 7
$rst_not_sup7=mysql_query("SELECT * FROM dr_noticia WHERE superior_7=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup7=mysql_fetch_array($rst_not_sup7);

//VARIABLES
$notSup7_id=$fila_not_sup7["id"];
$notSup7_url=$fila_not_sup7["url"];
$notSup7_titulo=$fila_not_sup7["titulo"];
$notSup7_imagen=$fila_not_sup7["imagen"];
$notSup7_imagen_carpeta=$fila_not_sup7["imagen_carpeta"];
$notSup7_categoria=$fila_not_sup7["categoria"];
$notSup7_web=$web."noticia/".$notSup7_id."-".$notSup7_url;
$notSup7_web_img=$web."imagenes/upload/".$notSup7_imagen_carpeta."thumb/".$notSup7_imagen;

//CATEGORIA
$fila_notsup7_cat=seleccionTabla($notSup7_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup7Cat_url=$fila_notsup7_cat["url"];
$notSup7Cat_titulo=$fila_notsup7_cat["categoria"];
$notSup7Cat_web=$web."seccion/".$notSup7_categoria."/".$notSup7Cat_url;

//NOTICIA SUPERIOR 8
$rst_not_sup8=mysql_query("SELECT * FROM dr_noticia WHERE superior_8=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup8=mysql_fetch_array($rst_not_sup8);

//VARIABLES
$notSup8_id=$fila_not_sup8["id"];
$notSup8_url=$fila_not_sup8["url"];
$notSup8_titulo=$fila_not_sup8["titulo"];
$notSup8_imagen=$fila_not_sup8["imagen"];
$notSup8_imagen_carpeta=$fila_not_sup8["imagen_carpeta"];
$notSup8_categoria=$fila_not_sup8["categoria"];
$notSup8_web=$web."noticia/".$notSup8_id."-".$notSup8_url;
$notSup8_web_img=$web."imagenes/upload/".$notSup8_imagen_carpeta."thumb/".$notSup8_imagen;

//CATEGORIA
$fila_notsup8_cat=seleccionTabla($notSup8_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup8Cat_url=$fila_notsup8_cat["url"];
$notSup8Cat_titulo=$fila_notsup8_cat["categoria"];
$notSup8Cat_web=$web."seccion/".$notSup8_categoria."/".$notSup8Cat_url;

//NOTICIA SUPERIOR 9
$rst_not_sup9=mysql_query("SELECT * FROM dr_noticia WHERE superior_9=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup9=mysql_fetch_array($rst_not_sup9);

//VARIABLES
$notSup9_id=$fila_not_sup9["id"];
$notSup9_url=$fila_not_sup9["url"];
$notSup9_titulo=$fila_not_sup9["titulo"];
$notSup9_imagen=$fila_not_sup9["imagen"];
$notSup9_imagen_carpeta=$fila_not_sup9["imagen_carpeta"];
$notSup9_categoria=$fila_not_sup9["categoria"];
$notSup9_web=$web."noticia/".$notSup9_id."-".$notSup9_url;
$notSup9_web_img=$web."imagenes/upload/".$notSup9_imagen_carpeta."thumb/".$notSup9_imagen;

//CATEGORIA
$fila_notsup9_cat=seleccionTabla($notSup9_categoria, "id", "dr_noticia_categoria", $conexion);
$notSup9Cat_url=$fila_notsup9_cat["url"];
$notSup9Cat_titulo=$fila_notsup9_cat["categoria"];
$notSup9Cat_web=$web."seccion/".$notSup9_categoria."/".$notSup9Cat_url;

//NOTICIA INFERIOR
$rst_not_inf=mysql_query("SELECT * FROM dr_noticia WHERE publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 30", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Diario16</title>
    <base href="<?php echo $web; ?>">
    <meta name="description" content="">

    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- Open Graph -->
    <meta property="og:type" content='website'>
    <meta property="og:site_name" content='Diario16.pe'>
    <meta property="og:title" content='Diario16.pe'> 
    <meta property="og:description" content=''>
    <meta property="og:url" content='/'> 
    <meta property="og:image" content=''>
    <meta property="fb:admins" content='130961786950093'>
    <!-- fin Open Graph -->

</head>
<body id="home">

    <?php require_once("wg-header.php"); ?>

    <div class="container">

    <div id="main-content">
                     
        <div class="destacados-noticias">

            <div id="not-import" class="<?php echo $notDestCat_url; ?>">

                <div id="notimp-img-trans">
                  <img src="imagenes/fondo-notdest-trans.png" width="480" height="220" alt="Imagen">
                </div>
                
                <div id="notimp-img">
                    <img src="<?php echo $notDest_web_img; ?>" alt="">
                </div>

                <div id="notimp-dato">
                    
                    <h2><a href="<?php echo $notDest_web; ?>" title=""><?php echo $notDest_titulo; ?></a></h2>
                    <p><?php echo soloDescripcion($notDest_contenido, 150); ?></p>

                </div>

                <div id="notimp-categ" class="<?php echo $notDestCat_url; ?>">
                    <a href="<?php echo $notDestCat_web; ?>"><?php echo $notDestCat_titulo; ?></a></div>

            </div>
            
            <div id="not-super">
    
                <div class="noticias"> 
                    <a href="<?php echo $notSup1_web; ?>">
                        <img src="<?php echo $notSup1_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup1Cat_web; ?>"><?php echo $notSup1Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup1Cat_url; ?>">
                        <h2><a href="<?php echo $notSup1_web; ?>">
                            <?php echo $notSup1_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup2_web; ?>">
                        <img src="<?php echo $notSup2_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup2Cat_web; ?>"><?php echo $notSup2Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup2Cat_url; ?>">
                        <h2><a href="<?php echo $notSup2_web; ?>">
                            <?php echo $notSup2_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup3_web; ?>">
                        <img src="<?php echo $notSup3_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup3Cat_web; ?>"><?php echo $notSup3Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup3Cat_url; ?>">
                        <h2><a href="<?php echo $notSup3_web; ?>">
                            <?php echo $notSup3_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup4_web; ?>">
                        <img src="<?php echo $notSup4_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup4Cat_web; ?>"><?php echo $notSup4Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup4Cat_url; ?>">
                        <h2><a href="<?php echo $notSup4_web; ?>">
                            <?php echo $notSup4_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup5_web; ?>">
                        <img src="<?php echo $notSup5_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup5Cat_web; ?>"><?php echo $notSup5Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup5Cat_url; ?>">
                        <h2><a href="<?php echo $notSup5_web; ?>">
                            <?php echo $notSup5_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup6_web; ?>">
                        <img src="<?php echo $notSup6_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup6Cat_web; ?>"><?php echo $notSup6Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup6Cat_url; ?>">
                        <h2><a href="<?php echo $notSup6_web; ?>">
                            <?php echo $notSup6_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup7_web; ?>">
                        <img src="<?php echo $notSup7_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup7Cat_web; ?>"><?php echo $notSup7Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup7Cat_url; ?>">
                        <h2><a href="<?php echo $notSup7_web; ?>">
                            <?php echo $notSup7_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup8_web; ?>">
                        <img src="<?php echo $notSup8_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup8Cat_web; ?>"><?php echo $notSup8Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup8Cat_url; ?>">
                        <h2><a href="<?php echo $notSup8_web; ?>">
                            <?php echo $notSup8_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="noticias"> 
                    <a href="<?php echo $notSup9_web; ?>">
                        <img src="<?php echo $notSup9_web_img; ?>" alt="" width="310" height="174" border="0"></a>
                    <span class="categoria">
                        <a href="<?php echo $notSup9Cat_web; ?>"><?php echo $notSup9Cat_titulo; ?></a>
                    </span>
                    <div class="title <?php echo $notSup9Cat_url; ?>">
                        <h2><a href="<?php echo $notSup9_web; ?>">
                            <?php echo $notSup9_titulo; ?></a></h2>
                        <a href=""><span class="icono-video"></span></a>
                    </div>
                </div>

                <div class="clear"></div>

            </div>

      </div><!-- FIN GRID DESTACADAS -->

    </div>

    <div class="all-news">
           
        <div class="news">
            
            <?php while($fila_not_inf=mysql_fetch_array($rst_not_inf)){
                    $notInf_id=$fila_not_inf["id"];
                    $notInf_url=$fila_not_inf["url"];
                    $notInf_titulo=$fila_not_inf["titulo"];
                    $notInf_contenido=soloDescripcion($fila_not_inf["contenido"], 150);
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

                <span class="time-cat">
                    <em class="time"><?php echo $notInf_fecha; ?></em>
                    <em class="categoria">
                      <a href="<?php echo $notInfCat_web; ?>"><?php echo $notInfCat_titulo; ?></a>
                    </em>
                </span>

                <div class="clear"></div>
        
                <div class="media-type left">
                    <a href="<?php echo $notInf_web; ?>">
                        <img src="<?php echo $notInf_web_img; ?>" alt="" width="200" height="110"><span class="play"></span></a>
                </div>

                <div class="share">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style "
                        addthis:url="<?php echo $notInf_web; ?>"
                        addthis:title="<?php echo $notInf_titulo; ?>" >
                    <a class="addthis_button_compact"></a>
                    </div>
                    <script>var addthis_config = {"data_track_addressbar":true};</script>
                    <script>var addthis_config = {"data_track_clickback": false};</script>
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=mals1990"></script>
                    <!-- AddThis Button END -->
                </div>
        
                <h2><a href="<?php echo $notInf_web; ?>">
                  <?php echo $notInf_titulo; ?></a></h2>
                <p class="intro"><?php echo $notInf_contenido; ?></p>
                <div class="clear"></div>

            </div><!-- FIN FLUJO -->
            <?php } ?>

            <!-- <div class="boton">
                <a target="_blank" href="#">Ver más noticias</a>
            </div> -->

      </div><!-- FIN FLUJOS -->
           

        <?php require_once("wg-sidebar.php"); ?>

        <div class="clear"></div>

        </div><!-- FIN NEWS -->

    </div>

    <?php require_once("wg-footer.php"); ?>
    
</body>

</html>
