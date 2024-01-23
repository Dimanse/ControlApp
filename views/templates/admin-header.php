<header class="dashboard__header">
    <div class="dashboard__header-grid">
        <a href="/">
            <h2 class="dashboard__logo">
                ControlApp
            </h2>
            
        </a>

        <?php if(!$perfil) { ?>
            <div class="dashboard__div-usuario">
                <p><span class="dashboard__usuario"><?php echo $usuario->nombre;?></span></p>
            </div>
        <?php } ?>

        <nav class="dashboard__nav">
            <form method="POST" action="/logout" class="dashboard__form">
                <input type="submit" value="Cerrar Sesión" class="dashboard__submit--logout">
            </form>
        </nav>
    </div>
    
</header>