<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Del tratamiento administrado</legend>

    <div class="formulario__campo">
        <label for="hora" class="formulario__label">Hora de la toma del tratamiento</label>
        <input
            type="time"
            class="formulario__input"
            id="hora"
            name="hora"
            placeholder="Horario de ingesta del medicamento"
            value="<?php echo $perfil->hora ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo ">
        <legend class="formulario__legend">Momento de la toma del tratamiento</legend>
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
                        <Después class="formulario__label" for="despues desayunar">Después De Desayunar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues desayunar"
                        name="tiempo"
                        value="Después De Desayunar"
                        
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
                        <label class="formulario__label" for="despues almorzar">Después De Almorzar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues almorzar"
                        name="tiempo"
                        value="Después De Almorzar"
                        
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
                        <label class="formulario__label" for="despues cenar">Después De Cenar</label>
                        <input class="formulario__input--radio"
                        type="radio"
                        id="despues cenar"
                        name="tiempo"
                        value="Después De Cenar"
                        
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

        
    </div>

    <legend class="formulario__legend">Tratamiento</legend>
    <div class="formulario__grid">
        <div class="formulario__campo">
            <label for="cantidad" class="formulario__label">Cantidad</label>
            <input
                type="text"
                class="formulario__input"
                id="cantidad"
                name="cantidad"
                placehold
                value="<?php echo $perfil->cantidad ?? ''; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="formato" class="formulario__label">Formato</label>
            <input
                type="text"
                class="formulario__input"
                id="formato"
                name="formato"
                placeholder="cápsulas, comprimidos"
                value="<?php echo $perfil->formato ?? ''; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="medicamento" class="formulario__label">Nombre del medicamento</label>
            <input
                type="text"
                class="formulario__input"
                id="medicamento"
                name="medicamento"
                Placeholder="Gelocatil, Rivotril, Acetaminofen"
                value="<?php echo $perfil->medicamento ?? ''; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="gramos" class="formulario__label">Gramos del medicamento</label>
            <input
                type="text"
                class="formulario__input"
                id="gramos"
                name="gramos"
                placeholder=" 1 mg., 1 gr., 125 mg.,"
                value="<?php echo $perfil->gramos ?? ''; ?>"
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