

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información para la cita</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <input
                type="date"
                class="formulario__input--sociales"
                name="fecha"
                placeholder="Fecha de la cita"
                value="<?php echo $cita->fecha ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-clock"></i>
            </div>
            <input
                type="time"
                class="formulario__input--sociales"
                name="hora"
                placeholder="Hora de la cita"
                value="<?php echo $cita->hora ?? ''; ?>"
            >
        </div>
    </div>

    
    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="especialista"
                placeholder="oftalmologo, dentista..."
                value="<?php echo $cita->especialista ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-hospital"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="clinica"
                placeholder="Nombre de tu clinica o Ebais"
                value="<?php echo $cita->clinica ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="observaciones"
                placeholder="Observaciones"
                value="<?php echo $perfil->observaciones ?? ''; ?>"
            >
        </div>
    </div>

</fieldset>