<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>
    <div class="barra-servicios">
        <a class="boton" href="/admin">Ver Citas</a>
        <a class="boton" href="/servicios">Ver Servicios</a>
        <a class="boton" href="/servicios/crear">Nuevo Servicio</a>
        <a class="boton" href="/marcas/crear">Nueva Marca</a>
        <a class="boton" href="/marcas">Ver Marcas</a>
        <a class="boton" href="/tipo_descuentos/crear">Nuevo Descuento</a>
        <a class="boton" href="/tipo_descuentos">Ver Descuentos</a>
        <a class="boton" href="/promociones/crear">Nueva Promocion</a>
        <a class="boton" href="/promociones">Ver Promociones</a>
        <a class="boton" href="/productos/crear">Nuevo Producto</a>
        <a class="boton" href="/productos">Ver Productos</a>
    </div>
<?php } ?>