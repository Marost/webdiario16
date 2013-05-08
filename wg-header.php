<?php
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
                <a href="/">Noticias del Perú y del mundo. Diario16.pe informa sobre actualidad, política, elecciones, gastronomía, espectáculos y deportes. Tiene blogs y la edición impresa completa. Videos y fotos.</a>
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
                    <li><a href="/" class="activo">Inicio</a></li>              
                    <li><a href="seccion/1/politica">Política</a></li>
                    <li><a href="seccion/4/economia">Economía</a></li>                          
                    <li><a href="seccion/2/actualidad">Actualidad</a></li>                          
                    <li><a href="seccion/5/internacionales">Internacionales</a></li>                          
                    <li><a href="seccion/6/deportes">Deportes</a></li>                          
                    <li><a href="seccion/8/espectaculos">Espectáculos</a></li>
                    <li><a href="seccion/9/culturales">Culturales</a></li>
                    <li><a href="seccion/7/tecnologia">Tecnología</a></li>
                </ul>

                <div class="clear"></div>

            </div>

        </div>

    </div><!-- FIN MENU -->

</div><!-- FIN HEADER -->