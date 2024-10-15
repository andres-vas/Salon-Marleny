<h1 class="nombre-pagina">Promociones</h1>
<p class="descripcion-pagina">Administración de Promociones</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    use Model\Tipo_descuento;  // Asegúrate de importar el modelo aquí
?>

<ul class="promociones">
    <?php foreach($promociones as $promocion) { 
        // Obtener el tipo de descuento correspondiente a la promoción
        $tipoDescuento = Tipo_descuento::find($promocion->id_tipo_descuento);
    ?>
        <li>
            <p>Código Promoción: <span><?php echo $promocion->id; ?></span> </p>
            <p>Descripción Promoción: <span><?php echo $promocion->descripcion_promocion; ?></span> </p>
            <p>Fecha Inicio Promoción: <span><?php echo $promocion->fecha_inicio_promocion; ?></span> </p>
            <p>Fecha Fin Promoción: <span><?php echo $promocion->fecha_fin_promocion; ?></span> </p>

            <p>Tipo Descuento: 
                <span>S<?php echo $tipoDescuento->id; ?></span> - 
                <span>Descripción: <?php echo $tipoDescuento->descripcion_descuento; ?></span>
            </p>

            <p>Estado Promoción: 
                <span>
                    <?php echo $promocion->activo_descuento === 'A' ? 'Activo' : 'Inactivo'; ?>
                </span> 
            </p>

            <div class="acciones">
                <a class="boton" href="/promociones/actualizar?id=<?php echo $promocion->id; ?>">Actualizar</a>
                <form action="/promociones/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $promocion->id; ?>">
                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>
