<h1 class="nombre-pagina">Marcas</h1>
<p class="descripcion-pagina">Administración de Marcas</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="marcas">
    <?php foreach($marcas as $marca) { ?>
        <h3>Informacion Marca</h3>
        <li>      
            <p>Nombre: <span><?php echo $marca->nombre_marca; ?></span> </p>

            <div class="acciones">
                <a class="boton" href="/marcas/actualizar?id=<?php echo $marca->id; ?>">Actualizar</a>

                <form action="/marcas/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $marca->id; ?>">
                    <input type="submit" value="Borrar" class="boton-eliminar">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>
