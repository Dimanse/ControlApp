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

    <div class="dashboard__contenedor">
        <?php if(!empty($presiones)) { ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Fecha</th>
                        <th scope="col" class="table__th">Hora</th>
                        <th scope="col" class="table__th">Máxima</th>
                        <th scope="col" class="table__th">Mínima</th>
                        <th scope="col" class="table__th">Observaciones:</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach($presiones as $presion) { ?>
                        <tr class="table__tr">
                            <td class="table__td" id="time">
                                <?php echo $presion->fecha; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $presion->hora; ?>
                            </td>

                            <td class="table__td">
                            <span <?php if($presion->max >= 129 ){ ?>
                            class="table__td--rojo"
                            <?php }else { ?>
                                class="table__td--verde"
                                <?php } ?> > <?php echo $presion->max; ?></span> Sistólica mmHg
                            </td>

                            <td class="table__td">
                            <span <?php if($presion->max >= 84 ){ ?>
                            class="table__td--rojo"
                            <?php }else { ?>
                                class="table__td--verde"
                                <?php } ?> > <?php echo $presion->min; ?></span> Diastólica mmHg
                            </td>

                            <td class="table__td">
                                <?php echo $presion->observaciones; ?>
                            </td>

                            
                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar" href="/admin/presion/editar?id=<?php echo $presion->id; ?>">
                                <i class="fa-solid fa-pen-clip"></i>
                                    Editar
                                </a>

                                <form method="POST" action="/admin/presion/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $presion->id; ?>">
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

            <div class=" dashboard__contenedor-texto">
                <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Aún no has registrado tu presión arterial</p>
            </div>
        <?php } ?>
    </div>

    <?php 
        // echo $paginacion;
    ?>

<?php } ?>