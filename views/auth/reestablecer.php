<div class="contenedor reestablecer">
   <?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu Nuevo Password</p>
        <?php include_once __DIR__ .'/../templates/alertas.php'; ?>

        <?php if($mostrar) { ?>
        <form class="formulario" method="POST" >

            <div class="formulario__campo">
                <label class="formulario__label" for="password">Password</label>
                <input 
                    class="formulario__input"
                    type="password"
                    id="password"
                    placeholder="Tu Password"
                    name="password"
                    >
            </div>

            <input class="boton" type="submit" value="Guardar Password">
        </form>
            
        <?php } ?>
        <div class="acciones">
            <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Crea una</a>
        </div>
    </div><!--contenedor-sm-->

</div>