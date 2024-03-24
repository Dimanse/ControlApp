<?php if(!$perfil){ ?>
    <div class="dashboard__contenedor">
        <div class=" dashboard__contenedor-texto">
            <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Crea un perfil y registra tu tratamiento médico</p>
        </div>
    
        <div class="dashboard__contenedor-boton dashboard__contenedor-boton--centrado">
            <a class="dashboard__boton" href="/admin/dashboard/crear">
                <i class="fa-solid fa-circle-plus"></i>
                Añadir Perfil
            </a>

        </div>
    </div>
    
<?php } else { ?>

    <?php if(!$tratamientos){ ?>
        <h2 class="dashboard__heading"><?php echo $titulo . ' ' . $usuario->nombre; ?></h2>
    <?php }else{ ?>
        <h2 class="dashboard__heading"><?php echo $titulo1 . ' ' . $usuario->nombre; ?></h2>
    <?php } ?>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/tratamiento/crear">
            <i class="fa-solid fa-circle-plus"></i>
            Añadir Tratamiento
        </a>
    </div>

    <div class="dashboard__contenedor">
        <?php if(!empty($tratamientos)) { ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                       
                        <th scope="col" class="table__th" id="th">Hora</th>
                        <th scope="col" class="table__th">Momento</th>
                        <th scope="col" class="table__th">Cantidad</th>
                        <th scope="col" class="table__th">Formato</th>
                        <th scope="col" class="table__th">Medicamento</th>
                        <th scope="col" class="table__th" id="th-gramos">Gramos</th>
                        <th scope="col" class="table__th" id="th-observaciones">Observaciones:</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach($tratamientos as $tratamiento) { ?>
                        <tr class="table__tr">
                            
                                <td class="table__td" id="td">
                                    <?php echo $tratamiento->hora; ?>
                                </td>
                           
                            <td class="table__td">
                                <?php echo $tratamiento->tiempo; ?>
                            </td>

                            <td class="table__td">
                                 <?php echo $tratamiento->cantidad; ?>
                            </td>
                            <td class="table__td">
                                 <?php echo $tratamiento->formato; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $tratamiento->medicamento;?>
                            </td>
                            <td class="table__td">
                                <?php echo $tratamiento->gramos; ?>
                            </td>

                            <td class="table__td" id="td-observaciones">
                                <?php echo $tratamiento->observaciones; ?>
                            </td>

                            
                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar" href="/admin/tratamiento/editar?id=<?php echo $tratamiento->id; ?>">
                                <i class="fa-solid fa-pen-clip"></i>
                                    Editar
                                </a>

                                <form method="POST" action="/admin/tratamiento/eliminar" class="table__formulario">
                                    <input type="hidden" name="id" value="<?php echo $tratamiento->id; ?>">
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
                <p class="text-center dashboard__menu-texto dashboard__menu-texto--grande">Aún no has registrado tu tratamiento médico</p>
            </div>
        <?php } ?>
    </div>

    <?php 
        // echo $paginacion;
    ?>

<?php } ?>