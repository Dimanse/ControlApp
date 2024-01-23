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

    <h2 class="dashboard__heading"><?php echo $titulo .' de ' . $usuario->nombre ?></h2>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/mediciones/crear">
            <i class="fa-solid fa-circle-plus"></i>
            Añadir Medición
        </a>
    </div>

    <div class="dashboard__contenedor">
        <?php if(!empty($mediciones)) { ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Fecha</th>
                        <th scope="col" class="table__th">Hora</th>
                        <th scope="col" class="table__th">Momento de medición</th>
                        <th scope="col" class="table__th">Glucemía</th>
                        <th scope="col" class="table__th">Observaciones</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach($mediciones as $medicion) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $medicion->fecha; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $medicion->hora; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $medicion->tiempo; ?>
                            </td>

                            <td class="table__td">
                            <span <?php if($medicion->glucemia >= 110 ){ ?>
                            class="table__td--rojo"
                            <?php }else if($medicion->glucemia >= 90) { ?>
                                class="table__td--verde"
                                <?php }else { ?>
                                class="table__td--naranja"
                                <?php }?> > <?php echo $medicion->glucemia; ?></span> mg/dL
                            </td>

                            <td class="table__td">
                                <?php echo $medicion->observaciones; ?>
                            </td>
                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar" href="/admin/mediciones/editar?id=<?php echo $medicion->id; ?>">
                                <i class="fa-solid fa-pen-clip"></i>
                                    Editar
                                </a>

                                <form method="POST" action="/admin/mediciones/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $medicion->id; ?>">
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
                <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Aún no has registrado un perfil glucémico</p>
            </div>
        <?php } ?>
    </div>

    <?php 
        // echo $paginacion;
    ?>

<?php } ?>





