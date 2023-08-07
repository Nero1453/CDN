<!-- Delete Modal HTML -->
<div id="delete_<?php echo $row['id']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Jugador</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro de eliminar el jugador?</p>
                    <p class="text-warning"><small>Esta acción es irreversible</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                    <a href="controller\players\delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['id']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="controller\players\edit.php?id=<?php echo $row['id']; ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Jugador</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>">
                        <label>Fecha Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>">
                        <!-- <label>Fecha de Baja de Equipo Anterior</label>
                        <input type="date" class="form-control" name="Fecha_baja1" id="Fecha_baja1"> -->
                        <label>Equipo 1</label>
                        <div class="nav-item">
                            <?php $result1 = $mysqli->query("SELECT * FROM tblequipos") or die($mysqli->error); ?>
                                <select class="custom-select custom-select-lg mb-3" name="dropdownEquipo1">
                                        <option selected>Eliga Equipo Nuevo</option>
                                    <?php while ($row = $result1->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php endwhile ?>
                                </select>
                        </div>
                        <label>Equipo 2</label>
                        <div class="nav-item">
                            <?php $result1 = $mysqli->query("SELECT * FROM tblequipos") or die($mysqli->error); ?>
                                <select class="custom-select custom-select-lg mb-3" name="dropdownEquipo2">
                                        <option selected>Eliga Segundo Equipo (Opcional)</option>
                                    <?php while ($row = $result1->fetch_assoc()) : ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php endwhile ?>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <button type="submit" name="edit" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Actualizar</a></button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>