<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('@banco_update') ?>">
  <fieldset>
    
    <?php if(session::getInstance()->hasError('inputBanco')): ?>
    <?php view::getMessageError('inputBanco') ?>
    <?php endif ?>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input
          value="<?php echo $objBanco[0]->id ?>"
          type="hidden"
          name="<?php echo bancoTableClass::getNameField(bancoTableClass::ID, true) ?>">
        <input
          value="<?php echo $objBanco[0]->nombre ?>"
          type="text"
          class="form-control"
          id="<?php echo bancoTableClass::getNameField(bancoTableClass::NOMBRE, true) ?>"
          name="<?php echo bancoTableClass::getNameField(bancoTableClass::NOMBRE, true) ?>"
          placeholder="digite nombre del banco">
        <?php if(session::getInstance()->hasFlash('inputnombre')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
    
    <div class="form-group text-right">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">MODIFICAR
        </button>
        <a href="#" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>







