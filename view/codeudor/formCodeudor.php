<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('codeudor','createCodeudor') ?>">
  <fieldset>
    <?php if (session::getInstance()->hasError('inputTipo_documento')): ?>
      <?php view::getMessageError('inputTipo_documento') ?>
    <?php endif ?>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputTipo_documento')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputTipo_documento" class="col-sm-2 control-label">TIPO DE DOCUMENTO</label>
      <div class="col-sm-10">
        <select class="form-control" name="inputTipo_documento">

          <option value="">Seleccione TIPO DOCUMENTO</option>
          <?php $tipo_documento = '' ?>
          <?php foreach ($objTipo_documento as $tipo_documento): ?>
            <option value="<?php echo $tipo_documento->id ?>"><?php echo $tipo_documento->desc_documento  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputCodeudor')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
    
      
    
  
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputIdentificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnumero_identificacion" class="col-sm-2 control-label">NUMERO IDENTIFICACION</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputIdentificacion')) ? request::getInstance()->getPost('inputIdentificacion') : '' ?>" type="text" class="form-control" id="inputIdentificacion" name="inputIdentificacion" placeholder="Digite  numero identificacion">
        <?php if (session::getInstance()->hasFlash('inputIdentificacion')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputIdentificacion') ?></p>
          <?php session::getInstance()->deleteError('inputIdentificacion') ?>
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
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputApellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputapellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputApellido')) ? request::getInstance()->getPost('inputApellido') : '' ?>" type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Digite Apellido">
        <?php if (session::getInstance()->hasFlash('inputApellido')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputApellido') ?></p>
          <?php session::getInstance()->deleteError('inputApellido') ?>
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
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCelular')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">MOVIL</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputCelular')) ? request::getInstance()->getPost('inputCelular') : '' ?>" type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="Digite numero de movil">
        <?php if (session::getInstance()->hasFlash('inputCelular')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputCelular') ?></p>
          <?php session::getInstance()->deleteError('inputCelular') ?>
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
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCorreo')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo_cliente" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputCorreo')) ? request::getInstance()->getPost('inputCorreo') : '' ?>" type="text" class="form-control" id="inputCorreo" name="inputCorreo" placeholder="Digite Correo">
         <?php if (session::getInstance()->hasFlash('inputCorreo')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputCorreo') ?></p>
          <?php session::getInstance()->deleteError('inputCorreo') ?>
        <?php endif ?>
      </div>
      </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     <?php if (session::getInstance()->hasError('inputLocalidad')): ?>
      <?php view::getMessageError('inputLocalidad') ?>
    <?php endif ?>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputLocalidad')) ? 'has-error has-feedback' : '' ?>">
    
     <label for="inputLocalidad" class="col-sm-2 control-label">LOCALIDAD</label>
      <div class="col-sm-10">
        <select class="form-control" name="inputLocalidad">

          <option value="">Seleccione LOCALIDAD</option>
          <?php $localidad = '' ?>
          <?php foreach ($objLocalidad as $localidad): ?>
            <option value="<?php echo $localidad->id ?>"><?php echo $localidad->nombre  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputLocalidad')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
    
    
    
    
    
    
    
    <div class="form-group text-right">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Insertar</button>
        <a href="<?php echo routing::getInstance()->getUrlWeb('@codeudor_listado') ?>" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>







