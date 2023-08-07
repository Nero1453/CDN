<!-- Delete Modal HTML -->
<div id="delete_<?php echo $row['id']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Equipo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro de eliminar el equipo?</p>
                    <p class="text-warning"><small>Esta acción es irreversible</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                    <a href="controller\teams\delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['id']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="controller\teams\edit.php?id=<?php echo $row['id']; ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Equipo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
                        <label>Fecha Inscripcion</label>
                        <input type="date" class="form-control" name="fecha_inscripcion" value="<?php echo $row['fecha_inscripcion']; ?>">
                        <label>Fecha Baja</label>
                        <input type="date" class="form-control" name="fecha_baja" value="<?php echo $row['fecha_baja']; ?>">
                        <div class="form-group">
                            <label>División</label>
                            <div class="nav-item">
                                <?php $resultcampeonatos = $mysqli->query("SELECT * FROM tblcampeonatos"); ?>
                                <select class="custom-select custom-select-lg mb-3" name="dropdown">
                                    <?php while ($row = $resultcampeonatos->fetch_assoc()) : ?>
                                        <option value=<?php echo $row['Id']; ?>>División "<?php echo $row['Nombre']; ?>"</option>
                                    <?php endwhile ?>
                                </select>
                            </div>
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
