<!-- Edit Modal HTML -->
<div id="edit_<?php echo $row['idFixture']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="controller\calendario\edit.php?id=<?php echo $row['idFixture']; ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Fecha</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Goles local</label>
                        <input type="number" class="form-control" name="goleslocal" value="<?php echo $row['GL']; ?>">
                        <label style="margin-top: 10px;">Goles visita</label>
                        <input type="number" class="form-control" name="golesvisita" value="<?php echo $row['GV']; ?>">
                        <input type="hidden" name="idLocal" value="<?php echo $row['idLocal']; ?>">
                        <input type="hidden" name="idVisita" value="<?php echo $row['idVisita']; ?>">
                        <input type="hidden" name="golesLocalOld" value="<?php echo $row['GL']; ?>">
                        <input type="hidden" name="golesVisitaOld" value="<?php echo $row['GV']; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                            <?php 
                                if($row['GL'] != ""): ?>
                                   <button type="submit" name="edit" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Actualizar</button>
                                <?php else: ?>
                                <button type="submit" name="save" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Guardar</button>
                             <?php endif ?>
                            
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>