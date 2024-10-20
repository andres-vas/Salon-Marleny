<h1 class="nombre-pagina">Crear Nueva Cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
?>

<div id="app">

    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button class="button" type="button" data-paso="2">Productos</button>
        <button class="button" type="button" data-paso="3">Promociones</button>
        <button type="button" data-paso="4">Información Cita</button>
        <button type="button" data-paso="5">Resumen</button>
    </nav>


    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus Servicios a Continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>

    <div id="paso-2" class="seccion">
        <h2>Productos</h2>
        <p class="text-center">Selecciona tus Produtos a Continuación</p>
        <div id="productos" class="listado-productos"></div>
    </div>

    <div id="paso-3" class="seccion">
        <h2>Promociones</h2>
        <p class="text-center">Selecciona una de Nuestras Promociones Disponibles</p>
        <div id="promociones" class="listado-promociones"></div>
    </div>

    <div id="paso-4" class="seccion">
        <h2>Tus Datos y Cita</h2>
        <p class="text-center">Coloca tus datos y fecha de tu cita</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input
                    id="nombre"
                    type="text"
                    placeholder="Tu Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                />
            </div>

            <div class="campo">
                <label for="fecha">Fecha</label>
                <input
                    id="fecha"
                    type="date"
                    min="<?php echo date('Y-m-d', strtotime('+1 day') ); ?>"
                />
            </div>

            <div class="campo">
                <label for="hora">Hora</label>
                <input
                    id="hora"
                    type="time"
                />
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>" >

            <div class="campo">
                <label for="tipoPagoId">Metodo de Pago</label>
                <select id="tipoPagoId" name="tipoPagoId" required>
                    <option value="">-- Metodos de Pago Disponibles --</option>
                    <?php foreach ($tipopagos as $tipo) { ?>
                        <option 
                            value="<?php echo $tipo->id; ?>" 
                            <?php echo (isset($cita->tipoPagoId) && $cita->tipoPagoId == $tipo->id) ? 'selected' : ''; ?>>
                            <?php echo $tipo->nombre_tipopago; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>



        </form>
    </div>
    <div id="paso-5" class="seccion contenido-resumen">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button 
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>

        <button 
            id="siguiente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

<?php 
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>