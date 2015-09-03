<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('prestamo', 'createNegocio') ?>">
  <fieldset>
    <legend><i class="fa fa-street-view"></i> Nuevo cargo</legend>
    <?php if(session::getInstance()->hasError('inputCargo')): ?>
    <?php view::getMessageError('inputCargo') ?>
    <?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCargo')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputCargo" class="col-sm-2 control-label">Cargo</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputCargo')) ? request::getInstance()->getPost('inputCargo') : '' ?>" type="text" class="form-control" id="inputCargo" name="inputCargo" placeholder="Digite el cargo">
        <?php if(session::getInstance()->hasFlash('inputCargo')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
    <div class="form-group text-right">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Insertar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
         
        
      </div>
    </div>
  </fieldset>
</form>