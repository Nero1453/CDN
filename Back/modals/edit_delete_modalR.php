<!-- Delete Modal HTML -->
<div id="delete_<?php echo $row['id']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Arbitro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro de eliminar el arbitro?</p>
                    <p class="text-warning"><small>Esta acción es irreversible</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                    <a href="controller\referee\delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['id']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="controller\referee\edit.php?id=<?php echo $row['id']; ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Arbitro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>">
                      
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <button type="submit" name="edit" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Actualizar</a></button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>