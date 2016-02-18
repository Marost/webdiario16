<div class="mainNav">
    <div class="user">
        <a title="" class="leftUserDrop">
            <img src="<?php echo $url_admin; ?>images/user.png" alt="" /></a>
            <span><?php echo $usuario_nombre." ".$usuario_apellido; ?></span>
    </div>
    
    <!-- Sidebar subnav -->
    <ul class="subNav">
        <li><a href="<?php echo $url_admin; ?>paginas/noticias/lista.php" title=""><span class="icos-frames"></span>Noticias</a></li>
        <li><a href="<?php echo $url_admin; ?>paginas/noticias-tag/lista.php" title=""><span class="icos-frames"></span>Noticias - Etiquetas</a></li>
        <li><a href="<?php echo $url_admin; ?>paginas/noticias-seccion/lista.php" title=""><span class="icos-frames"></span>Noticias - Secciones</a></li>
        <li><a href="<?php echo $url_admin; ?>paginas/columnistas/lista.php" title="" ><span class="icos-frames"></span>Columnistas</a></li>
        <li><a href="<?php echo $url_admin; ?>paginas/portada/lista.php" title=""><span class="icos-frames"></span>Edición Impresa</a></li>
        <li><a href="<?php echo $url_admin; ?>paginas/blog/lista.php" title=""><span class="icos-frames"></span>Blog</a></li>
        <?php if($usuario_rol == "admin") { ?>
        <li><a href="<?php echo $url_admin; ?>paginas/usuarios/lista.php" title=""><span class="icos-frames"></span>Usuarios</a></li>
        <?php } ?>
        <li><a href="<?php echo $url_admin; ?>conexion/salir.php" title=""><span class="icos-frames"></span>Salir</a></li>
    </ul>

</div>