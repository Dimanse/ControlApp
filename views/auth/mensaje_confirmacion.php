

<div class="contenedor mensaje">
   <?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina alerta info"><strong>Hola <?php echo $usuario->nombre; ?> </strong> Has Registrado Correctamente tu cuenta en ControlApp; pero es necesario confirmarla</p>
        <p class="descripcion-pagina alerta info">Presiona aquí:</p> 
        <a href="<?php echo $_ENV['HOST'];?>/confirmar?token=<?php echo $usuario->token;?>">Confirmar Cuenta</a>
        
    </div><!--contenedor-sm-->

</div>