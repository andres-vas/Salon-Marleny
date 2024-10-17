<div class="campo">
    <label for="descripcion_promocion">Descripcion</label>
    <input 
        type="text"
        id="descripcion_promocion"
        placeholder="Descripcion Promocion"
        name="descripcion_promocion"
        value="<?php echo $promocion->descripcion_promocion; ?>"
    />
</div>
<div class="campo">
    <label for="fecha_inicio_promocion">Fecha Inicio Promocion</label>
    <input
        id="fecha_inicio_promocion"
        type="date"
        name="fecha_inicio_promocion" 
        min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
        value="<?php echo $promocion->fecha_inicio_promocion; ?>"
    />
</div>

<div class="campo">
    <label for="fecha_fin_promocion">Fecha Fin Promocion</label>
    <input
        id="fecha_fin_promocion"
        type="date"
        name="fecha_fin_promocion" 
        min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
        value="<?php echo $promocion->fecha_fin_promocion; ?>"
    />
</div>


<div class="campo">
    <label for="id_tipo_descuento">Tipo de Descuento</label>
    <select id="id_tipo_descuento" name="id_tipo_descuento" required>
        <option value="">-- Selecciona un Tipo de Descuento --</option>
        <?php foreach ($tiposDescuentos as $tipo) { ?>
            <option 
                value="<?php echo $tipo->id; ?>" 
                <?php echo $promocion->id_tipo_descuento == $tipo->id ? 'selected' : ''; ?>>
                <?php echo $tipo->descripcion_descuento; ?>
            </option>
        <?php } ?>
    </select>
</div>


<div class="campo">
    <label for="activo_descuento">Estado</label>
    <select id="activo_descuento" name="activo_descuento" required>
        <option value="">-- Selecciona un Estado --</option>
        <option value="A" <?php echo $promocion->activo_descuento == 'A' ? 'selected' : ''; ?>>Activo</option>
        <option value="N" <?php echo $promocion->activo_descuento == 'N' ? 'selected' : ''; ?>>Inactivo</option>
    </select>
</div>
