<h1 class="nombre-pagina">Productos</h1>
<p class="descripcion-pagina">Administración de Productos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    use Model\Productos;  // Asegúrate de importar el modelo aquí
use Model\Marca;  // Importación del modelo
?>

<ul class="productos">
    <?php foreach($productos as $producto) { 
        // OBTENER LA MARCA
        $marca = Marca::find($producto->id_marca_producto);
    ?>
    
        <li>
            <p>Código Producto: <span><?php echo $producto->id; ?></span> </p>
            <p>Nompre Producto: <span><?php echo $producto->name_producto; ?></span> </p>
            <p>Marca: 
                <span><?php echo $marca->id; ?></span> - 
                <span>Nombre: <?php echo $marca->nombre_marca; ?></span>
            </p>

            <p>Precio Producto: <span>Q. <?php echo $producto->precio_producto; ?></span> </p>
            <p>Descripcion Producto: <span><?php echo $producto->descripcion_producto; ?></span> </p>
            <p>Fecha Creacion Producto: <span><?php echo $producto->fecha_creacion_producto; ?></span> </p>
            <p>Stock Producto: <span><?php echo $producto->stock_producto; ?></span> </p>

            <div class="acciones">
                <a class="boton" href="/productos/actualizar?id=<?php echo $producto->id; ?>">Actualizar</a>
                <form action="/productos/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>
