<?php
//URL
$menu_url=$_REQUEST["url"];

//FECHA
$head_fechahora=explode(" ", $fechaActual);
$head_fecha=explode("-", $head_fechahora[0]);
$head_fechaFinal=nombreFechaTotal($head_fecha[0],$head_fecha[1],$head_fecha[2]);
?>
<div id="header-all">

    <div>
      
        <div class="fecha-buscar">

            <div class="interior">

                <div class="fecha"><?php echo $head_fechaFinal; ?> - Lima PE</div>
                <div class="searcher">
                    <form action="buscar.php" method="get" name="busqueda" id="busqueda">
                        <input type="text" value="" name="busqueda" class="searchinput">
                        <button type="submit">Buscar</button>
                    </form>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>

            </div>
            
        </div><!-- fin accesos -->
   
        <div class="diario16pe">
            <h1>
                <a href="/">Noticias del Perú y del mundo. Diario16.pe informa sobre actualidad, política, elecciones, gastronomía, espectáculos y deportes.</a>
            </h1>            

            <div class="clear"></div>

        </div><!-- FIN LOGO BUSCADOR -->

    </div>

    <div class="clear"></div>

    <div class="main-nav" id="main-nav">

        <div class="menu-fixed">

            <div class="menu">

                <em><a href="/">Diario16</a></em>
              
                <ul id="destacados-menu">          
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

                <div class="clear"></div>

            </div>

        </div>

    </div><!-- FIN MENU -->

</div><!-- FIN HEADER -->