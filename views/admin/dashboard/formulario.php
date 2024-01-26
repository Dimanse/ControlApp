<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="nombres" class="formulario__label">Nombre del paciente</label>
        <input
            type="text"
            class="formulario__input"
            id="nombres"
            name="nombres"
            value="<?php echo $perfil->nombres ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="apellidos" class="formulario__label">Apellidos del paciente</label>
        <input
            type="text"
            class="formulario__input"
            id="apellidos"
            name="apellidos"
            value="<?php echo $perfil->apellidos ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="fecha" class="formulario__label">Fecha de nacimiento</label>
        <input
            type="date"
            class="formulario__input"
            id="fecha fecha_formulario"
            name="fecha"
            value="<?php echo $perfil->fecha ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="peso" class="formulario__label">Peso en kilogramos</label>
        <input
            type="number"
            class="formulario__input"
            id="peso"
            name="peso"
            value="<?php echo $perfil->peso ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="estatura" class="formulario__label">Estatura en centimetros</label>
        <input
            type="number"
            class="formulario__input"
            id="estatura"
            name="estatura"
            value="<?php echo $perfil->estatura ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
        >
    </div>

    <?php if(isset($perfil->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/paciente/' . $perfil->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/paciente/' . $perfil->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/paciente/' . $perfil->imagen; ?>.png" alt="Imagen Paciente">
            </picture>
            
        </div>

    <?php } ?>
</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Enfermedades (separadas por coma)</label>
        <input
            type="text"
            class="formulario__input"
            id="tags_input"
            name="enfermedad"
            placeholder="Ej. Diabetes, Presion Alta, Colesterol..."
        >

        <div id="enfermedades" class="formulario__listado"></div>
        <input 
            type="hidden" 
            name="enfermedades" 
            value="<?php echo $perfil->enfermedades ?? ''; ?>">  
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información médica adicional</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                name="doctor"
                placeholder="Nombre completo de tu doctor"
                value="<?php echo $perfil->doctor ?? ''; ?>"
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
                value="<?php echo $perfil->clinica ?? ''; ?>"
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