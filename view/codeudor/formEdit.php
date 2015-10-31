<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('@codeudor_update') ?>">
  <input type="hidden" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::ID, true) ?>" value="<?php echo $objCodeudor[0]->id ?>">
  <fieldset>
    
<?php if (session::getInstance()->hasError('inputCodeudor')): ?>
  <?php view::getMessageError('inputCodeudor') ?>
<?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCodeudor')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputCodeudor" class="col-sm-2 control-label">TIPO DE DOCUMENTO</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::TIPO_DOCUMENTO_ID, TRUE) ?>">
          <option value="">Seleccione TIPO DOCUMENTO</option>
        <?php foreach ($objTipoDocumento as $tipoDocumento): ?>
            <option <?php echo ($tipoDocumento->id === $objCodeudor[0]->tipo_documento_id) ? 'selected' : '' ?> value="<?php echo $tipoDocumento->id ?>"><?php echo $tipoDocumento->desc_documento ?></option>
        <?php endforeach ?>
        </select>

<?php if (session::getInstance()->hasFlash('inputCodeudor')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnumero_identificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnumero_identificacion" class="col-sm-2 control-label">NUMERO IDENTIFICACION</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->identificacion ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::IDENTIFICACION, true) ?>" 
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::IDENTIFICACION, true) ?>" 
               placeholder="Digite  numero identificacion">
               <?php if (session::getInstance()->hasFlash('inputnumero_identificacion')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->nombre ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::NOMBRE, TRUE) ?>"  
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::NOMBRE, TRUE) ?>" 
               placeholder="digite el nombre">
<?php if (session::getInstance()->hasFlash('inputnombre')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputapellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputapellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->apellidos ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::APELLIDO, TRUE) ?>" 
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::APELLIDO, TRUE) ?>" 
               placeholder="Digite Apellido">
<?php if (session::getInstance()->hasFlash('inputapellido')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->telefono ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::TELEFONO, TRUE) ?>" 
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::TELEFONO, TRUE) ?>" 
               placeholder="Digite numero de telefono">
<?php if (session::getInstance()->hasFlash('inputtelefono')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputmovil')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">MOVIL</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->movil ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::CELULAR, TRUE) ?>"  
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::CELULAR, TRUE) ?>" 
               placeholder="Digite numero de movil">
<?php if (session::getInstance()->hasFlash('inputmovil')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdireccion_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion_cliente" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->direccion ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::DIRECCION, TRUE) ?>"  
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::DIRECCION, TRUE) ?>" 
               placeholder="Digite La direccion">
<?php if (session::getInstance()->hasFlash('inputdireccion_cliente')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcorreo_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo_cliente" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objCodeudor[0]->correo ?>"
               type="text" 
               class="form-control" 
               id="<?php echo codeudorTableClass::getNameField(codeudorTableClass::CORREO, TRUE) ?>"  
               name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::CORREO, TRUE) ?>" 
               placeholder="Digite Correo">
<?php if (session::getInstance()->hasFlash('inputcorreo_cliente')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
<?php endif ?>
      </div>
    </div>

    <label for="inputLocalidad" class="col-sm-2 control-label">LOCALIDAD</label>
    <div class="col-sm-10">
      <select class="form-control" name="<?php echo codeudorTableClass::getNameField(codeudorTableClass::LOCALIDAD_ID, TRUE) ?>">

        <option value="">Seleccione LOCALIDAD</option>

        <?php foreach ($objLocalidad as $localidad): ?>
          <option <?php echo ($localidad->id === $objCodeudor[0]->localidad_id) ? 'selected' : '' ?> value="<?php echo $localidad->id ?>"><?php echo $localidad->nombre ?></option>

        <?php endforeach ?>
      </select>

      <?php if (session::getInstance()->hasFlash('inputLocalidad')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
        </div>
      <div class="form-group text-right">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">MODICAR</button>
          <a href="#" class="btn btn-default">Cancelar</a>
        </div>
      </div>

  </fieldset>
</form>







