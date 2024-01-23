<div class="contenedor login">
   <?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Inicia sesión en ControlApp</p>

        <?php include_once __DIR__ .'/../templates/alertas.php'; ?>

        <form class="formulario" method="POST" action="/login">
            
            

            

            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <input 
                    class="formulario__input"
                    type="email"
                    id="email"
                    placeholder="Tu Email"
                    name="email"
                    >
            </div>

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

            

            <input class="formulario__submit" type="submit" value="Iniciar Sesión">
        </form>

        <div class="acciones">
            <a href="/registro" class="acciones__enlace">Aún no tienes una cuenta? Obtener una.</a>
            <a href="/olvide" class="acciones__enlace">¿Olvidaste tu password?</a>
        </div>
    </div><!--contenedor-sm-->

</div>