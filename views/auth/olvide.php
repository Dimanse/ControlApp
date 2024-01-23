<div class="contenedor olvide">
   <?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu Acceso a ControlApp</p>

        <?php include_once __DIR__ .'/../templates/alertas.php'; ?>

        <form class="formulario" method="POST" action="/olvide" novalidate>
            
        

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

           

            <input class="formulario__submit" type="submit" value="Enviar Instrucciones">
        </form>

        <div class="acciones">
            <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta? Crea una</a>
        </div>
    </div><!--contenedor-sm-->

</div>