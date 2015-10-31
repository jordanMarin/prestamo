<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('banco','createBanco') ?>">
  <fieldset>
    <legend><i class="glyphicon glyphicon-phone"></i> Nuevo banco</legend>
    <?php if(session::getInstance()->hasError('inputBanco')): ?>
    <?php view::getMessageError('inputBanco') ?>
    <?php endif ?>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputBanco')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputBanco')) ? request::getInstance()->getPost('inputBanco') : '' ?>" type="text" class="form-control" id="inputnombre" name="<?php echo bancoTableClass::getNameField(bancoTableClass::NOMBRE, TRUE)?>" placeholder="digite el nombre">
        <?php if(session::getInstance()->hasFlash('inputBanco')): ?>
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







