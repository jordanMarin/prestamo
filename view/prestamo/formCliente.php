<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('prestamo', 'createCliente') ?>">
  <fieldset>
    <legend>Usuario</legend>
    
    <label for="inputUsuario" class="col-sm-2 control-label">Usuario</label>
      <div class="col-sm-10">
        <input value="" type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Digite usuario">
      </div>
    
    <label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>
      <div class="col-sm-10">
        <input value="" type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Digite contraseña">
      </div>
    
  </fieldset>
  <fieldset>
    <legend><i class="glyphicon glyphicon-phone"></i>Datos del cliente</legend>
    <?php if(session::getInstance()->hasError('inputCliente')): ?>
    <?php view::getMessageError('inputCliente') ?>
    <?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCliente')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputCliente" class="col-sm-2 control-label">TIPO DE DOCUMENTO</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo clienteTableClass::getNameField(clienteTableClass::TIPO_DOCUMENTO_ID, true) ?>">
          <option value="">Seleccione TIPO DOCUMENTO</option>
          <?php $tipo_documento = '' ?>
          <?php foreach ($objTipo_documento as $tipo_documento): ?>
            <option value="<?php echo $tipo_documento->id ?>"><?php echo $tipo_documento->desc_documento  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputCliente')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnumero_identificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnumero_identificacion" class="col-sm-2 control-label">NUMERO IDENTIFICASION</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputnumero_identificacion')) ? request::getInstance()->getPost('inputnumero_identificacion') : '' ?>" type="text" class="form-control" id="inputnumero_identificacion" name="<?php echo clienteTableClass::getNameField(clienteTableClass::NUMERO_IDENTIFICACION, true) ?>" placeholder="Digite  numero identificacion">
        <?php if(session::getInstance()->hasFlash('inputnumero_identificacion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre_cliente" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputnombre_cliente')) ? request::getInstance()->getPost('inputnombre_cliente') : '' ?>" type="text" class="form-control" id="inputnombre_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::NOMBRE_CLIENTE, true) ?>" placeholder="Digite  nombre cliente">
        <?php if(session::getInstance()->hasFlash('inputnombre_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputapellido_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputapellido_cliente" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputapellido_cliente')) ? request::getInstance()->getPost('inputapellido_cliente') : '' ?>" type="text" class="form-control" id="inputapellido_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::APELLIDO_CLIENTE, true) ?>" placeholder="Digite apellido cliente">
        <?php if(session::getInstance()->hasFlash('inputapellido_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcelular_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcelular_cliente" class="col-sm-2 control-label">CELULAR</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputcelular_cliente')) ? request::getInstance()->getPost('inputcelular_cliente') : '' ?>" type="text" class="form-control" id="inputcelular_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::CELULAR_CLIENTE, true) ?>" placeholder="Digite Numero  celular">
        <?php if(session::getInstance()->hasFlash('inputcelular_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono_cliente" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputtelefono_cliente')) ? request::getInstance()->getPost('inputtelefono_cliente') : '' ?>" type="text" class="form-control" id="inputtelefono_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::TELEFONO_CLIENTE, true) ?>" placeholder="Digite Numero telefono">
        <?php if(session::getInstance()->hasFlash('inputtelefono_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcorreo_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo_cliente" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputcorreo_cliente')) ? request::getInstance()->getPost('inputcorreo_cliente') : '' ?>" type="text" class="form-control" id="inputcorreo_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::CORREO_CLIENTE, true) ?>" placeholder="Digite Correo">
        <?php if(session::getInstance()->hasFlash('inputcorreo_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdireccion_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion_cliente" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo (request::getInstance()->hasPost('inputdireccion_cliente')) ? request::getInstance()->getPost('inputcorreo_cliente') : '' ?>" type="text" class="form-control" id="inputdireccion_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::DIRECCION_CLIENTE, true) ?>" placeholder="Digite La direccion">
        <?php if(session::getInstance()->hasFlash('inputdireccion_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputfecha_nacimiento')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputfecha_nacimiento" class="col-sm-2 control-label">FECHA NACIMIENTO</label>
      <div class="col-sm-10">
        <input type="date"  class="form-control"  name="<?php echo clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO_CLIENTE, true) ?>" >
        <?php if(session::getInstance()->hasFlash('inputfecha_nacimiento')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
     <label for="inputLocalidad" class="col-sm-2 control-label">LOCALIDAD</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo clienteTableClass::getNameField(clienteTableClass::LOCALIDAD_ID, true) ?>">
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
     
     
     
     
     <!--
      <label for="inputUsuario" class="col-sm-2 control-label">USUARIO</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo clienteTableClass::getNameField(clienteTableClass::USUARIO_ID, true) ?>">
          <option value="">Seleccione USUARIO</option>
          <?php $localidad = '' ?>
          <?php foreach ($objUsuari as $usuario): ?>
            <option value="<?php echo $usuario->id ?>"><?php echo $usuario->usuario_id  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputLocalidad')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
     -->
    
    
    
    
    
    
    
    <div class="form-group text-right">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Insertar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>




