<h1 class="nombre-pagina">Nueva Promocion</h1>
<p class="descripcion-pagina">Llena todos los campos para añadir una nueva promocion</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form action="/promociones/crear" method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton" value="Guardar Servicio">
</form>