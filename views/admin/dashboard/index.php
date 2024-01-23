<?php if(!$perfil) { ?>
    <h2 class="dashboard__heading"><?php echo $usuario->nombre .' '. $titulo1 ; ?></h2>
    <?php } else { ?>
    <h2 class="dashboard__heading"><?php echo $titulo .' ' . $perfil->nombres; ?></h2>
   

    

<?php } ?>


<?php if($perfil) { ?>
    <div class="dashboard__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/paciente/' . $perfil->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/paciente/' . $perfil->imagen; ?>.png" type="image/png">
                <img loading="lazy" src="/img/paciente/<?php echo $perfil->imagen; ?>" alt="imagen del paciente">
            </picture>

        
        </div>
        <div class="dashboard__contenedor-boton mb-2-sm">
            <a class="dashboard__enlace" href="/admin/dashboard/editar?id=<?php echo $perfil->id; ?>">
                <i class="fa-solid fa-user-pen"></i>
                <span class="dashboard__menu-texto">
                    Actualizar Perfil
                </span> 
            </a>
        </div>
<?php } ?>


   

<?php if(!$perfil){ ?>
    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/dashboard/crear">
            <i class="fa-solid fa-circle-plus"></i>
            Añadir Perfil
        </a>

    </div>
<?php } ?>

<?php if($perfil){ ?>
    <main class="bloques">
        <div class="bloques__grid">
            <div class="bloque">
                <h3 class="bloque__heading">Datos Personales</h3>

                    
                    <div class="bloque__contenido">
                        <div class="bloque__contenedor-boton">
                            <i class="fa-solid fa-id-card bloque__enlace"></i>
                            <p class="bloque__menu-texto"> Nombre Completo</p>
                        </div>
                            <span class="bloque__negrita">
                                <?php echo $perfil->nombres .' ' . $perfil->apellidos; ?> 
                            </span>
                    </div>

                    <div class="bloque__contenido">
                    <div class="bloque__contenedor-boton">
                        <i class="fa-solid fa-calendar-days bloque__enlace"></i>
                            <p class="bloque__menu-texto"> Fecha de nacimiento</p>
                        </div>
                        <span class="bloque__negrita">
                            <?php echo $perfil->fecha; ?> 
                        </span>
                    </div>


                    <div class="bloque__contenido">
                        <div class="bloque__contenedor-boton">
                            <i class="fa-solid fa-weight-scale bloque__enlace"></i>
                            <p class="bloque__menu-texto"> Peso</p>
                        </div>
                        <span class="bloque__negrita">
                            <?php echo $perfil->peso; ?> kg.
                        </span>
                    </div>

                    <div class="bloque__contenido">
                        <div class="bloque__contenedor-boton">
                            <i class="fa-solid fa-ruler-vertical bloque__enlace"></i>
                            <p class="bloque__menu-texto"> Estatura</p>
                        </div>
                            <span class="bloque__negrita">
                                <?php echo $perfil->estatura; ?> cm.
                            </span>
                    </div>
                
                    
                        
            
            </div>

            <div class="bloque">
                <h3 class="bloque__heading">Información Médica</h3>
                <div class="bloque__contenido">
                    <div class="bloque__contenedor-boton">
                        <i class="fa-solid fa-user-doctor bloque__enlace"></i>
                        <p class="bloque__menu-texto">doctor</p>
                    </div>
                    <span class="bloque__negrita">
                        <?php echo $perfil->doctor; ?>
                    </span>
                </div>

                    <div class="bloque__contenido">
                        <div class="bloque__contenedor-boton">
                            <i class="fa-solid fa-hospital bloque__enlace"></i>
                            <p class="bloque__menu-texto">Clínica</p>
                        </div>
                        <span class="bloque__negrita">
                            <?php echo $perfil->clinica; ?>
                        </span>
                    </div>
            </div>

            <div class="bloque">
                <h3 class="bloque__heading">Observaciones:</h3>
                <div class="bloque__contenido">

                    <?php if(!$perfil->observaciones){ ?>

                        <div class="dashboard__contenedor-boton mb-2-sm">
                            <a class="dashboard__enlace" href="/admin/dashboard/editar?id=<?php echo $perfil->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                <span class="dashboard__menu-texto">
                                    Añade alguna observación
                                </span> 
                            </a>
                        </div>

                    <?php }else{ ?>
                        <div class="bloque__contenido text-center">        
                            <span class="bloque__texto--negrita text-center">
                                <?php echo $perfil->observaciones; ?>
                            </span>
                        </div>
                    <?php } ?>

                </div>   
                
            </div>

            <div class="bloque">
                <h3 class="bloque__heading">Enfermedades</h3>
                <div class="bloque__contenido">

                <?php if(!$perfil->enfermedades){ ?>

                    <div class="dashboard__contenedor-boton mb-2-sm">
                        <a class="dashboard__enlace" href="/admin/dashboard/editar?id=<?php echo $perfil->id; ?>">
                            <i class="fa-solid fa-user-pen"></i>
                            <span class="dashboard__menu-texto">
                                Añade alguna enfermedad
                            </span> 
                        </a>
                    </div>

                <?php }else{ ?>
                    <div id="enfermedades" class="formulario__listado"></div>
                        <input 
                            type="hidden"
                            name="enfermedades"
                            id="tags_input" 
                            value="<?php echo $perfil->enfermedades ?? ''; ?>"> 
                       
                    </div>
                <?php } ?>
            </div>

            
        </div>
    </main>
<?php } ?>