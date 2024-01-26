<?php if(!$perfil) { ?>
    <h2 class="dashboard__heading"><?php echo $usuario->nombre .' '. $titulo1 ; ?></h2>
    <?php } else { ?>
    <h2 class="dashboard__heading"><?php echo $titulo .' ' . $perfil->nombres; ?></h2>
   

    

<?php } ?>


<?php if($perfil) { ?>
    <div class="dashboard__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/paciente/' . $perfil->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/paciente/' . $perfil->imagen; ?>.png" type="image/png">
                <img loading="lazy" src="<?php echo $_ENV['APP_URL'] . '/img/paciente/' . $perfil->imagen; ?>.png" alt="Imagen del paciente"">
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
                        <span class="bloque__negrita" id="fecha_nacimiento">
                            <?php echo $perfil->fecha; ?> 
                        </span>
                    </div>

                    <div class="bloque__contenido">
                    <div class="bloque__contenedor-boton">
                        <i class="fa-solid fa-cake-candles bloque__enlace"></i>
                            <p class="bloque__menu-texto"> Edad actual</p>
                        </div>
                        <span class="bloque__negrita" id="edad">
                            
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

        <?php if(!$perfil){ ?>
    <div class="dashboard__contenedor">
    <div class=" dashboard__contenedor-texto">
            <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Crea un perfil y empieza a registrar tus niveles de glucemia</p>
        </div>
    
        <div class="dashboard__contenedor-boton dashboard__contenedor-boton--centrado">
            <a class="dashboard__boton" href="/admin/dashboard/crear">
                <i class="fa-solid fa-circle-plus"></i>
                Añadir Perfil
            </a>

        </div>
    </div>
<?php } else { ?>

    <h2 class="dashboard__heading"><?php echo $titulo2 .' de ' . $usuario->nombre ?></h2>

    
    
       
    <?php if(!empty($citas)) { ?>
        <div class="dashboard__contenedor-boton">
            <a class="dashboard__boton" href="/admin/dashboard/crear_cita">
                <i class="fa-solid fa-circle-plus"></i>
                Añadir Niueva Cita
            </a>
        </div>
        <div class="dashboard__contenedor">
                <table class="table">
                    <thead class="table__thead">
                        <tr>
                            <th scope="col" class="table__th">Fecha</th>
                            <th scope="col" class="table__th">Hora</th>
                            <th scope="col" class="table__th">especialista</th>
                            <th scope="col" class="table__th">clinica</th>
                            
                            <th scope="col" class="table__th"></th>
                        </tr>
                    </thead>

                    <tbody class="table__tbody">
                        <?php foreach($citas as $cita) { ?>
                            <tr class="table__tr">
                                <td class="table__td">
                                    <?php echo $cita->fecha; ?>
                                </td>
                                <td class="table__td">
                                    <?php echo $cita->hora; ?>
                                </td>

                                <td class="table__td">
                                    <?php echo $cita->especialista; ?>
                                </td>
                                <td class="table__td">
                                    <?php echo $cita->clinica; ?>
                                </td>
                                

                                
                                
                                <td class="table__td table__td--acciones">
                                    <a class="table__accion table__accion--editar" href="/admin/dashboard/editar_cita?id=<?php echo $cita->id; ?>">
                                    <i class="fa-solid fa-pen-clip"></i>
                                        Editar
                                    </a>

                                    <form method="POST" action="/admin/dashboard/eliminar_cita" class="table__formulario">
                                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                                        <button class="table__accion table__accion--eliminar" type="submit">
                                        <i class="fa-solid fa-trash-can"></i>
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { ?>
                    <div class="dashboard__contenedor-boton">
                        <a class="dashboard__boton" href="/admin/dashboard/crear_cita">
                            <i class="fa-solid fa-circle-plus"></i>
                            Crear Nueva Cita
                        </a>
                    </div>
                    <div class=" dashboard__contenedor-texto">
                        <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Aún no has registrado una cita nueva</p>
                    </div>
                    
            <?php } ?>
        </div> 
       

    <?php 
        // echo $paginacion;
    ?>

<?php } ?>

    </main>
<?php } ?>