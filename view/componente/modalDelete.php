<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmar eliminación</h4>
      </div>
      <div class="modal-body">
        <?php echo $mensaje ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="javascript:$('#formDelete<?php echo $id ?>').submit()" type="button" class="btn btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<form id="formDelete<?php echo $id ?>" action="<?php echo $url ?>" method="POST">
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>