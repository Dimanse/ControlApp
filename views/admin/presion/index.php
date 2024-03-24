<?php if(!$perfil){ ?>
    <div class="dashboard__contenedor">
        <div class=" dashboard__contenedor-texto">
            <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Crea un perfil y empieza a registrar tus niveles de presion arterial</p>
        </div>
    
        <div class="dashboard__contenedor-boton dashboard__contenedor-boton--centrado">
            <a class="dashboard__boton" href="/admin/dashboard/crear">
                <i class="fa-solid fa-circle-plus"></i>
                Añadir Perfil
            </a>

        </div>
    </div>
    
<?php } else { ?>


    <h2 class="dashboard__heading"><?php echo $titulo . ' de ' . $usuario->nombre; ?></h2>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/presion/crear">
            <i class="fa-solid fa-circle-plus"></i>
            Añadir Medición
        </a>
    </div>

    <?php if(!$presiones) { ?>

        <div class=" dashboard__contenedor-texto">
            <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Aún no has registrado un perfil glucémico</p>
        </div>
        <?php 
            echo $paginacion;
        ?>

    <?php }else{ ?>
        
        <section class="presiones">
            
            <div class="presiones__grid">
                <?php foreach($presiones as $presion){ ?>

                    <div <?php echo aos_animacion(); ?> class="presion">
                        <!-- <picture>
                            <source srcset="/build/img/esteto.webp" type="image/webp">
                            
                            <img class="presion__imagen" loading="lazy" width="200" height="300" src="/build/img/esteto.jpg" alt="Imagen esteto">
                        </picture> -->
                        <div class="presion__imagen">
                            
                        </div>
                        <div class="presion__informacion">
                            <div class="presion__dia">
                                <div class="presion__fecha-contenedor">
                                    <i class="fa-solid presion__icono presion__icono--fecha fa-calendar-days"></i>
                                    <h4 class="presion__fecha">
                                        <?php echo $presion->fecha; ?>
                                    </h4>
                                </div>
                                <div class="presion__hora-contenedor">
                                    <i class="fa-solid presion__icono presion__icono--hora fa-clock"></i>
                                    <h4 class="presion__hora">
                                        <?php echo $presion->hora; ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="presion__niveles-contenedor">
                                <div class="presion__niveles-max">
                                    <i class="fa-solid presion__icono presion__icono--max fa-plus"></i>
                                    <p class="presion__max <?php if($presion->max >= 129){ ?> presion--rojo <?php }else{ ?> presion--verde <?php } ?>"><?php echo $presion->max ?><span class="presion__max--regular"> Sistólica mmHg</span></p>
                                </div>

                                <div class="presion__niveles-min">
                                    <i class="fa-solid presion__icono presion__icono--min fa-minus"></i>
                                    <p class="presion__min <?php if($presion->min >= 84){ ?> presion--rojo <?php }else{ ?> presion--verde <?php } ?>"><?php echo $presion->min ?><span class="presion__min--regular"> Diastólica mmHg</span></p>
                                </div>
                            </div>

                            <?php if($presion->observaciones){ ?>
                                <div class="presion__observaciones-contenedor">
                                    <i class="fa-solid presion__icono presion__icono--observaciones fa-magnifying-glass"></i>
                                    <div class="presion__observaciones"><?php echo $presion->observaciones; ?></div>
                                </div>

                            <?php } ?>
                            
                            
                        </div>

                        <div class="presion--acciones">
                            <a class="presion__accion presion__accion--editar" href="/admin/presion/editar?id=<?php echo $presion->id; ?>">
                            <i class="fa-solid presion__icono presion__icono--editar fa-pen-clip"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/presion/eliminar" class="presion__formulario">
                                <input type="hidden" name="id" value="<?php echo $presion->id; ?>">
                                <button class="presion__accion presion__accion--eliminar" type="submit">
                                <i class="fa-solid presion__icono presion__icono--editar fa-trash-can"></i>
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </section>
    

        <?php 
            
                echo $paginacion;
            
        ?>
    <?php } ?>

<?php } ?>