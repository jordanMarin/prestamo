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

    <!-- ----------------------- inputUsuario ----------------------- -->
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputUsuario')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputUsuario" class="col-sm-2 control-label">Usuario</label>
      <div class="col-sm-10">
        <input autocomplete="off" value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) : (((isset($objUsuario) == true) ? $objUsuario[0]->user_name : '')) ?>" type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Digite usuario">
        <?php if (session::getInstance()->hasFlash('inputUsuario')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputUsuario') ?></p>
          <?php session::getInstance()->deleteError('inputUsuario') ?>
        <?php endif ?>
      </div>
    </div>
    <!-- ----------------------- inputUsuario ----------------------- -->
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputPassword')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputPassword" class="col-sm-2 control-label">Contraseña</label>
      <div class="col-sm-10">
        <input value="" type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Digite contraseña">
        <?php if (session::getInstance()->hasFlash('inputPassword')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputPassword') ?></p>
          <?php session::getInstance()->deleteError('inputPassword') ?>
        <?php endif ?>
      </div>

  </fieldset>
  <fieldset>
    <legend><i class="glyphicon glyphicon-phone"></i>Datos del cliente</legend>
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
            <option value="<?php echo $tipo_documento->id ?>"><?php echo $tipo_documento->desc_documento ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputTipo_documento')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
   

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputIdentificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputIdentificacion" class="col-sm-2 control-label">NUMERO IDENTIFICASION</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash('inputIdentificacion') === TRUE) ? request::getInstance()->getPost('inputIdentificacion') : (((isset($objCliente) == true) ? $objCliente[0]->IDENTIFICACION : '')) ?>" type="text" class="form-control" id="inputIdentificacion" name="inputIdentificacion" placeholder="Digite  numero ">
        <?php if (session::getInstance()->hasFlash('inputIdentificacion')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputIdentificacion') ?></p>
          <?php session::getInstance()->deleteError('inputIdentificacion') ?>
        <?php endif ?>
      </div>
    </div>

    

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputNombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputNombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash('inputNombre') === TRUE) ? request::getInstance()->getPost('inputNombre') : (((isset($objCliente) == true) ? $objCliente[0]->NOMBRE : '')) ?>" type="text" class="form-control" id="inputNombre" name="inputNombre" placeholder="Digite  nombre ">
        <?php if (session::getInstance()->hasFlash('inputNombre')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputNombre') ?></p>
          <?php session::getInstance()->deleteError('inputNombre') ?>
        <?php endif ?>
      </div>
    </div>


    

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputApellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputApellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->APELLIDO : '')) ?>" type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Digite el apellido ">
         <?php if (session::getInstance()->hasFlash('inputApellido')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputApellido') ?></p>
          <?php session::getInstance()->deleteError('inputApellido') ?>
        <?php endif ?>
      </div>
    </div>


    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCelular')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputCelular" class="col-sm-2 control-label">CELULAR</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CELULAR, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->CELULAR : '')) ?>" type="text" class="form-control" id="inputCelular" name="inputCelular" placeholder="Digite Numero  celular">
         <?php if (session::getInstance()->hasFlash('inputCelular')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputCelular') ?></p>
          <?php session::getInstance()->deleteError('inputCelular') ?>
        <?php endif ?>
      </div>
    </div>


   <div class="form-group <?php echo (session::getInstance()->hasFlash('inputTelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputTelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
         <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->TELEFONO : '')) ?>" type="text" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Digite Numero telefono">
        <?php if (session::getInstance()->hasFlash('inputTelefono')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputTelefono') ?></p>
          <?php session::getInstance()->deleteError('inputTelefono') ?>
        <?php endif ?>
      </div>
    </div>



   
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputCorreo')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputCorreo" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CORREO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->CORREO : '')) ?>" type="text" class="form-control" id="inputCorreo" name="inputCorreo" placeholder="Digite Correo">
       <?php if (session::getInstance()->hasFlash('inputCorreo')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputCorreo') ?></p>
          <?php session::getInstance()->deleteError('inputCorreo') ?>
        <?php endif ?>
      </div>
    </div>

   

    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputDireccion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputDireccion" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->DIRECCION : '')) ?>" type="text" class="form-control" id="inputDireccion" name="inputDireccion" placeholder="Digite La direccion">
        <?php if (session::getInstance()->hasFlash('inputDireccion')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputDireccion') ?></p>
          <?php session::getInstance()->deleteError('inputDireccion') ?>
        <?php endif ?>
      </div>
    </div>




  
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputFecha_nacimiento')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputfecha_nacimiento" class="col-sm-2 control-label">FECHA NACIMIENTO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, TRUE)) : (((isset($objCliente) == true) ? $objCliente[0]->FECHA_NACIMIENTO : '')) ?>" type="text" class="form-control" id="inputFecha_nacimiento" name="inputFecha_nacimiento" placeholder="Digite La fecha de nacimiento">
        <?php if (session::getInstance()->hasFlash('inputFecha_nacimiento')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
          <p class="help-block"><i class="glyphicon glyphicon-remove-sign"></i> <?php echo session::getInstance()->getError('inputFecha_nacimiento') ?></p>
          <?php session::getInstance()->deleteError('inputFecha_nacimiento') ?>
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
            <option value="<?php echo $localidad->id ?>"><?php echo $localidad->nombre ?></option>
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
                     <option value="<?php echo $usuario->id ?>"><?php echo $usuario->usuario_id ?></option>
      <?php endforeach ?>
         </select>
  
      <?php if (session::getInstance()->hasFlash('inputLocalidad')): ?>
                   <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
      <?php endif ?>
       </div>
      -->
    </div>

      <div class="form-group text-right">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insertar</button>
          <a href="<?php echo routing::getInstance()->getUrlWeb('@cliente_lista') ?>" class="btn btn-default">Cancelar</a>
        </div>
      </div>

  </fieldset>
</form>




