<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Datos de la Glucemía</legend>

    <div class="formulario__campo">
        <label for="fecha" class="formulario__label">Fecha:</label>
        <input
            type="date"
            class="formulario__input"
            id="fecha"
            name="fecha"
            value="<?php echo $medicion->fecha ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="hora" class="formulario__label">Hora:</label>
        <input
            type="time"
            class="formulario__input"
            id="hora"
            name="hora"
            value="<?php echo $medicion->hora ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo ">
        <legend class="formulario__legend">Momento de la Glucemía</legend>
        <div class="formulario__campo formulario__campo--radio">

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="antes desayunar">Antes de Desayunar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="antes desayunar"
                        name="tiempo"
                        value="Antes de Desayunar"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="despues desayunar">2 Horas Después De Desayunar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues desayunar"
                        name="tiempo"
                        value="2 Horas Después De Desayunar"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="antes almuerzo">Antes de Almorzar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="antes almuerzo"
                        name="tiempo"
                        value="Antes de Almorzar"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="despues almorzar">2 Horas Después De Almorzar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues almorzar"
                        name="tiempo"
                        value="2 Horas Después De Almorzar"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="antes cenar">Antes de Cenar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="antes cenar"
                        name="tiempo"
                        value="Antes de Cenar"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="despues cenar">2 Horas Después De Cenar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues cenar"
                        name="tiempo"
                        value="2 Horas Después De Cenar"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="antes acostarse">Antes de Acostarse</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues desayunar"
                        name="tiempo"
                        value="Antes de Acostarse"
                        
                        >
            </div>

            <div class="formulario__campo--boton-radio">
                        <label class="formulario__label" for="al despertar">Al Despertar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="al despertar"
                        name="tiempo"
                        value="Al Despertar"
                        
                        >
            </div>
        
    </div>

    <div class="formulario__campo">
        <label for="glucemia" class="formulario__label">Medición:</label>
        <input
            type="number"
            class="formulario__input"
            id="glucemia"
            name="glucemia"
            value="<?php echo $medicion->glucemia ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="observaciones" class="formulario__label">Observaciones:</label>
        <input
            type="text"
            class="formulario__input"
            id="observaciones"
            name="observaciones"
            value="<?php echo $medicion->observaciones ?? ''; ?>"
        >
    </div>
    

    
</fieldset>




