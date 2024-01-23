<div class="contenedor mensaje">
   <?php include_once __DIR__ .'/../templates/nombre-sitio.php'; ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina alerta info"><strong>Hola <?php echo $usuario->nombre; ?> </strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>
        <p class="descripcion-pagina alerta info">Presiona aquí:</p> 
        <a href="<?php echo $_ENV['HOST'];?>/reestablecer?token=<?php echo $usuario->token;?>">Reestablecer Password</a>
        
    </div><!--contenedor-sm-->

</div>