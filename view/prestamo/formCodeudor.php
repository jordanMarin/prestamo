<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('prestamo','createCodeudor') ?>">
  <fieldset>
    <legend><i class="glyphicon glyphicon-phone"></i> Nuevo codeudor</legend>
    <?php if(session::getInstance()->hasError('inputCodeudor')): ?>
    <?php view::getMessageError('inputCodeudor') ?>
    <?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCodeudor')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputCodeudor" class="col-sm-2 control-label">TIPO DE DOCUMENTO</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::TIPO_DOCUMENTO_ID,TRUE)?>">

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
    
      
    
  
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnumero_identificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnumero_identificacion" class="col-sm-2 control-label">NUMERO IDENTIFICASION</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputnumero_identificacion')) ? request::getInstance()->getPost('inputnumero_identificacion') : '' ?>" type="text" class="form-control" id="inputnumero_identificacion" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::NUMERO_IDENTIFICACION, true)?>" placeholder="Digite  numero identificacion">
        <?php if(session::getInstance()->hasFlash('inputnumero_identificacion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    
     
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputnombre')) ? request::getInstance()->getPost('inputnombre') : '' ?>" type="text" class="form-control" id="inputnombre" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::NOMBRE_CODEUDOR, TRUE)?>" placeholder="digite el nombre">
        <?php if(session::getInstance()->hasFlash('inputnombre')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputapellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputapellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputapellido')) ? request::getInstance()->getPost('inputapellido') : '' ?>" type="text" class="form-control" id="inputapellido" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::APELL_CODEUDOR,TRUE)?>" placeholder="Digite Apellido">
        <?php if(session::getInstance()->hasFlash('inputapellido')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputtelefono')) ? request::getInstance()->getPost('inputtelefono') : '' ?>" type="text" class="form-control" id="inputtelefono" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::TELEFONO_CODEUDOR,TRUE)?>" placeholder="Digite numero de telefono">
        <?php if(session::getInstance()->hasFlash('inputtelefono')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputmovil')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">MOVIL</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputmovil')) ? request::getInstance()->getPost('inputmovil') : '' ?>" type="text" class="form-control" id="inputmovil" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::MOVIL_CODEUDOR,TRUE)?>" placeholder="Digite numero de movil">
        <?php if(session::getInstance()->hasFlash('inputmovil')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdireccion_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion_cliente" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputdireccion_cliente')) ? request::getInstance()->getPost('inputcorreo_cliente') : '' ?>" type="text" class="form-control" id="inputdireccion_cliente" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::DIRECCION_CODEUDOR,TRUE)?>" placeholder="Digite La direccion">
        <?php if(session::getInstance()->hasFlash('inputdireccion_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcorreo_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo_cliente" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputcorreo_cliente')) ? request::getInstance()->getPost('inputcorreo_cliente') : '' ?>" type="text" class="form-control" id="inputcorreo_cliente" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::CORREO_CODEUDOR,TRUE)?>" placeholder="Digite Correo">
        <?php if(session::getInstance()->hasFlash('inputcorreo_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     <label for="inputLocalidad" class="col-sm-2 control-label">LOCALIDAD</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::LOCALIDAD_ID,TRUE)?>">

          <option value="">Seleccione LOCALIDAD</option>
          <?php $localidad = '' ?>
          <?php foreach ($objLocalidad as $localidad): ?>
            <option value="<?php echo $localidad->id ?>"><?php echo $localidad->nombre  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputLocalidad')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    
    
    
    
    
    
    
    <div class="form-group text-right">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Insertar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>







