<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('barrio', 'createBarrio') ?>">
  <fieldset>
    <legend><i class="glyphicon glyphicon-map-marker"></i> Nuevo barrio</legend>
    <?php if(session::getInstance()->hasError('inputBarrio')): ?>
    <?php view::getMessageError('inputBarrio') ?>
    <?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputBarrio')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputBarrio" class="col-sm-2 control-label">BARRIO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputBarrio')) ? request::getInstance()->getPost('inputBarrio') : '' ?>" type="text" class="form-control" id="inputBarrio" name="inputBarrio" placeholder="Digite el barrio">
        <?php if(session::getInstance()->hasFlash('inputBarrio')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputBarrio')) ? 'has-error has-feedback' : '' ?>">
     
        <label for="inputBarrio" class="col-sm-2 control-label">CIUDAD</label>
        <div class="col-sm-10">
          <select class="form-control" name="<?php echo barrioTableClass::getNameField(barrioTableClass::LOCALIDAD_ID,true) ?>">
            <option value="">Seleccione la ciudad</option>
            <?php $departamento = '' ?>
            <?php foreach ($objCiudad as $ciudad): ?>
            <option value="<?php echo $ciudad->id ?>"><?php echo $ciudad->ciudad . ' - ' . $ciudad->departamento ?></option>
            <?php endforeach ?>
          </select>
         
          <?php if (session::getInstance()->hasFlash('inputBarrio')): ?>
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
      
    <div class="form-group text-right">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">modificar</button>
          <a href="#" class="btn btn-default">Cancelar</a>
        </div>
      </div>
  </fieldset>
</form>