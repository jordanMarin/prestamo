<?php

use mvc\session\sessionClass as session ?>
<?php
use mvc\routing\routingClass as routing ?>
  <?php
  use mvc\request\requestClass as request ?>
  <?php
  use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('@cliente_update') ?>">
  <input type="hidden" name="<?php echo clienteTableClass::getNameField(clienteTableClass::ID, true) ?>" value="<?php echo $objCliente[0]->id ?>">
<?php if (session::getInstance()->hasError('inputCliente')): ?>
  <?php view::getMessageError('inputCliente') ?>
<?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCliente')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputCliente" class="col-sm-3 control-label">Tipo de documento</label>
      <div class="col-sm-9">
        <select class="form-control" name="<?php echo clienteTableClass::getNameField(clienteTableClass::TIPO_DOCUMENTO_ID, true) ?>">
          <option value="">Seleccione un tipo de documento</option>
          <?php foreach ($objTipoDocumento as $tipoDocumento): ?>
            <option <?php echo ($tipoDocumento->id === $objCliente[0]->tipo_documento_id) ? 'selected' : '' ?> value="<?php echo $tipoDocumento->id ?>"><?php echo $tipoDocumento->desc_documento ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputCliente')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>

  
   <div class="form-group <?php echo (session::getInstance()->hasFlash('inputidentificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputidentificacion" class="col-sm-3 control-label">Numero identificacion</label>
      <div class="col-sm-9">
        <input value="<?php echo $objCliente[0]->identificacion ?>"
               type="text" 
               class="form-control" 
               id="<?php echo clienteTableClass::getNameField(clienteTableClass::IDENTIFICACION, true) ?>"  
               name="<?php echo clienteTableClass::getNameField(clienteTableClass::IDENTIFICACION, true) ?>" 
               placeholder="Digite  numero  identificacion">
        <?php if (session::getInstance()->hasFlash('inputidentificacion')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>


  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre_cliente')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputnombre_cliente" class="col-sm-3 control-label">Nombre</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->nombre ?>"
             type="text" 
             class="<?php echo clienteTableClass::getNameField(clienteTableClass::NOMBRE, true) ?>" 
             id="inputnombre_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::NOMBRE, true) ?>" 
             placeholder="Digite  nombre ">
      <?php if (session::getInstance()->hasFlash('inputnombre_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>

  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputapellido_cliente')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputapellido_cliente" class="col-sm-3 control-label">Apellido</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->apellidos ?>"
             type="text" 
             class="form-control" 
             id="<?php echo clienteTableClass::getNameField(clienteTableClass::APELLIDO, true) ?>"  
             name="<?php echo clienteTableClass::getNameField(clienteTableClass::APELLIDO, true) ?>" 
             placeholder="Digite el apellido ">
      <?php if (session::getInstance()->hasFlash('inputapellido_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>



  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcelular_cliente')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputcelular_cliente" class="col-sm-3 control-label">Celular</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->celular ?>"
             type="text" 
             class="form-control" 
             id="<?php echo clienteTableClass::getNameField(clienteTableClass::CELULAR, true) ?>" 
             name="<?php echo clienteTableClass::getNameField(clienteTableClass::CELULAR, true) ?>" 
             placeholder="Digite Numero  celular">
      <?php if (session::getInstance()->hasFlash('inputcelular_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>


  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono_cliente')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputtelefono_cliente" class="col-sm-3 control-label">Telefono</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->telefono ?>"
             type="text" 
             class="form-control" 
             id="<?php echo clienteTableClass::getNameField(clienteTableClass::TELEFONO, true) ?>" 
             name="<?php echo clienteTableClass::getNameField(clienteTableClass::TELEFONO, true) ?>" 
             placeholder="Digite Numero telefono">
      <?php if (session::getInstance()->hasFlash('inputtelefono_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>


  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcorreo_cliente')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputcorreo_cliente" class="col-sm-3 control-label">CORREO</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->correo ?>"
             type="text" class="form-control" 
             id="<?php echo clienteTableClass::getNameField(clienteTableClass::CORREO, true) ?>" 
             name="<?php echo clienteTableClass::getNameField(clienteTableClass::CORREO, true) ?>" 
             placeholder="Digite Correo">
             <?php if (session::getInstance()->hasFlash('inputcorreo_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>

  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdireccion_cliente')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputdireccion_cliente" class="col-sm-3 control-label">Direccion</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->direccion ?>"
             type="text" 
             class="form-control" 
             id="<?php echo clienteTableClass::getNameField(clienteTableClass::DIRECCION, true) ?>"
             name="<?php echo clienteTableClass::getNameField(clienteTableClass::DIRECCION, true) ?>" 
             placeholder="Digite La direccion">
      <?php if (session::getInstance()->hasFlash('inputdireccion_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>


  <div class="form-group <?php echo (session::getInstance()->hasFlash('inputfecha_nacimiento')) ? 'has-error has-feedback' : '' ?>">
    <label for="inputfecha_nacimiento" class="col-sm-3 control-label">Fecha nacimiento</label>
    <div class="col-sm-9">
      <input value="<?php echo $objCliente[0]->fecha_nacimiento ?>"
             type="text" 
             class="form-control" 
             id="<?php echo clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, true) ?>" 
             name="<?php echo clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, true) ?>" 
             placeholder="Digite La fecha de nacimiento">
             <?php if (session::getInstance()->hasFlash('inputfecha_nacimiento')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
    </div>
  </div>

    
     <label for="inputLocalidad" class="col-sm-2 control-label">LOCALIDAD</label>
    <div class="col-sm-10">
      <select class="form-control" name="<?php echo clienteTableClass::getNameField(clienteTableClass::LOCALIDAD_ID, TRUE) ?>">

        <option value="">Seleccione LOCALIDAD</option>

        <?php foreach ($objLocalidad as $localidad): ?>
          <option <?php echo ($localidad->id === $objCliente[0]->localidad_id) ? 'selected' : '' ?> value="<?php echo $localidad->id ?>"><?php echo $localidad->nombre ?></option>

        <?php endforeach ?>
      </select>

      <?php if (session::getInstance()->hasFlash('inputLocalidad')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
        </div>
    
 

    <div class="form-group text-right">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-primary">Editar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>




