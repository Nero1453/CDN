<!-- Delete Modal HTML -->
<div id="delete_<?php echo $row['Idgoleador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar Goleador</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro de eliminar jugador?</p>
                    <p class="text-warning"><small>Esta acción es irreversible</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
                    <a href="controller\goleadores\delete.php?id=<?php echo $row['Idgoleador']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Eliminar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['Idgoleador']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="controller\goleadores\edit.php?id=<?php echo $row['Idgoleador']; ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Goles</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <label>Jugador:</label>
                    <input disabled type="text" class="form-control" name="tarea" value="<?php echo $row['Apellido'].' '.$row['Nombre']; ?>">
                  </div>
                <!--<div class="form-group">
                    <label>Equipo:</label>
                    <input type="text" class="form-control" name="tarea" value="<?php echo $row['Equipo']; ?>">
                 </div>-->
                 <div class="form-group">
                    <label>Goles:</label>
                    <input type="text" class="form-control" name="Goles" value="<?php echo $row['Goles']; ?>">
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