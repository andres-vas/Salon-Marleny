<h1 class="nombre-pagina">Tipo de Descuentos</h1>
<p class="descripcion-pagina">Administración de Tipo de Descuentos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="tipo_descuentos">
    <?php foreach($tipo_descuentos as $tipo_descuento) { ?>
        <li>
            <p>Codigo Descuento: <span><?php echo $tipo_descuento->id; ?></span> </p>
            <p>Descripcion Descuento: <span><?php echo $tipo_descuento->descripcion_descuento; ?></span> </p>
            <div class="acciones">
                <a class="boton" href="/tipo_descuentos/actualizar?id=<?php echo $tipo_descuento->id; ?>">Actualizar</a>

                <form action="/tipo_descuentos/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $tipo_descuento->id; ?>">

                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>