<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('cliente', 'createCliente') ?>">
   <?php if (isset($objUsuario) == true): ?>
            <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" value="<?php echo $objUsuario[0]->id ?>" type="hidden">
          <?php endif ?>
  <fieldset>
    <legend>Usuario</legend>
    
    <label for="inputUsuario" class="col-sm-2 control-label">Usuario</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) : (((isset($objUsuario) == true) ? $objUsuario[0]->user_name : '')) ?>" type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Digite usuario">
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
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputIdentificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputidentificacion" class="col-sm-2 control-label">NUMERO IDENTIFICASION</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IDENTIFICACION, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->IDENTIFICACION: ''))?>" type="text" class="form-control" id="inputidentificacion" name="<?php echo clienteTableClass::getNameField(clienteTableClass::IDENTIFICACION, true) ?>" placeholder="Digite  numero ">
        <?php if(session::getInstance()->hasFlash('inputidentificacion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputNombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputNombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->NOMBRE: ''))?>" type="text" class="form-control" id="inputnombre_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::NOMBRE, true) ?>" placeholder="Digite  nombre ">
        <?php if(session::getInstance()->hasFlash('inputNombre')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputApellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputApellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->APELLIDO: ''))?>" type="text" class="form-control" id="inputapellido_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::APELLIDO, true) ?>" placeholder="Digite el apellido ">
        <?php if(session::getInstance()->hasFlash('inputApellido')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcelular_cliente')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcelular_cliente" class="col-sm-2 control-label">CELULAR</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CELULAR, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->CELULAR: ''))?>" type="text" class="form-control" id="inputcelular_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::CELULAR, true) ?>" placeholder="Digite Numero  celular">
        <?php if(session::getInstance()->hasFlash('inputcelular_cliente')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputTelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->TELEFONO: ''))?>"  type="text" class="form-control" id="inputtelefono_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::TELEFONO, true) ?>" placeholder="Digite Numero telefono">
        <?php if(session::getInstance()->hasFlash('inputTelefono')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCorreo')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo_cliente" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CORREO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->CORREO: ''))?>" type="text" class="form-control" id="inputcorreo_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::CORREO, true) ?>" placeholder="Digite Correo">
        <?php if(session::getInstance()->hasFlash('inputCorreo')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputDireccion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion_cliente" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->DIRECCION: ''))?>" type="text" class="form-control" id="inputdireccion_cliente" name="<?php echo clienteTableClass::getNameField(clienteTableClass::DIRECCION, true) ?>" placeholder="Digite La direccion">
        <?php if(session::getInstance()->hasFlash('inputDireccion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputFecha_nacimiento')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputfecha_nacimiento" class="col-sm-2 control-label">FECHA NACIMIENTO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->FECHA_NACIMIENTO: ''))?>" type="text" class="form-control" id="inputfecha_nacimiento" name="<?php echo clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, true) ?>" placeholder="Digite La fecha de nacimiento">
        <?php if(session::getInstance()->hasFlash('inputFecha_nacimiento')): ?>
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
      <a href="<?php echo routing::getInstance()->getUrlWeb('@cliente_listado') ?>" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>




