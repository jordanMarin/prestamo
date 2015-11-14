<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('negocio','createNegocio') ?>">
  <fieldset>
    
    <?php if(session::getInstance()->hasError('inputCliente')): ?>
    <?php view::getMessageError('inputCliente') ?>
    <?php endif ?>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCliente')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputCliente" class="col-sm-2 control-label">CLIENTE</label>
      <div class="col-sm-10">
        <select class="form-control" name="inputCliente">

          <option value="">Seleccione Cliente</option>
          <?php $cliente = '' ?>
          <?php foreach ($objCliente as $cliente): ?>
            <option value="<?php echo $cliente->id ?>"><?php echo $cliente->nombre  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputCliente')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
   
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputNombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputNombre')) ? request::getInstance()->getPost('inputNombre') : '' ?>" type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="digite el nombre">
         <?php if (session::getInstance()->hasFlash('inputNombre')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputNombre') ?></p>
          <?php session::getInstance()->deleteError('inputNombre') ?>
        <?php endif ?>
      </div>
      </div>
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputDireccion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion_cliente" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputDireccion')) ? request::getInstance()->getPost('inputDireccion') : '' ?>" type="text" class="form-control" id="inputDireccion" name="inputDireccion" placeholder="Digite La direccion">
         <?php if (session::getInstance()->hasFlash('inputDireccion')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputDireccion') ?></p>
          <?php session::getInstance()->deleteError('inputDireccion') ?>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputTelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputTelefono')) ? request::getInstance()->getPost('inputTelefono') : '' ?>" type="text" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Digite numero de telefono">
       <?php if (session::getInstance()->hasFlash('inputTelefono')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTelefono') ?></p>
          <?php session::getInstance()->deleteError('inputTelefono') ?>
        <?php endif ?>
      </div>
      </div>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputIngreso_mensual')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">INGRESO MENSUAL</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputIngreso_mensual')) ? request::getInstance()->getPost('inputIngreso_mensual') : '' ?>" type="text" class="form-control" id="inputIngreso_mensual" name="inputIngreso_mensual" placeholder="Digite ingreso mensual">
        <?php if (session::getInstance()->hasFlash('inputIngreso_mensual')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputIngreso_mensual') ?></p>
          <?php session::getInstance()->deleteError('inputIngreso_mensual') ?>
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







