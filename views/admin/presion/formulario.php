<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Datos sobre la Presión Arterial</legend>

    <div class="formulario__campo">
        <label for="fecha" class="formulario__label">Fecha:</label>
        <input
            type="date"
            class="formulario__input"
            id="fecha"
            name="fecha"
            value="<?php echo $presion->fecha ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="hora" class="formulario__label">Hora:</label>
        <input
            type="time"
            class="formulario__input"
            id="hora"
            name="hora"
            value="<?php echo $presion->hora ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="max" class="formulario__label">Máxima:</label>
        <input
            type="number"
            class="formulario__input"
            id="max"
            name="max"
            value="<?php echo $presion->max ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="min" class="formulario__label">Mínima:</label>
        <input
            type="number"
            class="formulario__input"
            id="min"
            name="min"
            value="<?php echo $presion->min ?? ''; ?>"
        >
    </div>

    

    <div class="formulario__campo">
        <label for="observaciones" class="formulario__label">Observaciones:</label>
        <input
            type="text"
            class="formulario__input"
            id="observaciones"
            name="observaciones"
            value="<?php echo $presion->observaciones ?? ''; ?>"
        >
    </div>
    

    
</fieldset>