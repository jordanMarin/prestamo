<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php   echo routing::getInstance()->getUrlWeb ('prestamo', ((isset($objUsuario)) ? 'updateEmpleado' : 'createEmpleado')) ?>">
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
    <legend><i class="glyphicon glyphicon-phone"></i>Datos del empleado</legend>
    <?php if(session::getInstance()->hasError('inputEmpleado')): ?>
    <?php view::getMessageError('inputEmpleado') ?>
    <?php endif ?>
    
    
    
   
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, TRUE)) : (((isset($objEmpleado) == true) ? $objEmpleado[0]->nombre: ''))?>" type="text" class="form-control" id="inputnombre" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, true) ?>" placeholder="Digite  nombre empleado">
        <?php if(session::getInstance()->hasFlash('inputnombre')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputapellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputapellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, TRUE)) : (((isset($objEmpleado) == true) ? $objEmpleado[0]->apellido_empleado: ''))?>" type="text" class="form-control" id="inputapellido" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELLIDO_EMPLEADO, true) ?>" placeholder="Digite  apellido empleado">
        <?php if(session::getInstance()->hasFlash('inputapellido')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdireccion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, TRUE)) : (((isset($objEmpleado) == true) ? $objEmpleado[0]->direccion_empleado: ''))?>" type="text" class="form-control" id="inputdireccion" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION_EMPLEADO, true) ?>" placeholder="Digite  direccion empleado">
        <?php if(session::getInstance()->hasFlash('inputdireccion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value= "<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, TRUE)) : (((isset($objEmpleado) == true) ? $objEmpleado[0]->telefono_empleado: ''))?>" type="text" class="form-control" id="inputtelefono" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO_EMPLEADO, true) ?>" placeholder="Digite  telefono empleado">
        <?php if(session::getInstance()->hasFlash('inputtelefono')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputmovil')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">MOVIL</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, TRUE)) : (((isset($objEmpleado) == true) ? $objEmpleado[0]->movil_empelado: ''))?>" type="text" class="form-control" id="inputmovil" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::MOVIL_EMPELADO, true) ?>" placeholder="Digite  movil empleado">
        <?php if(session::getInstance()->hasFlash('inputmovil')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcorreo')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, TRUE)) === TRUE) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, TRUE)) : (((isset($objEmpleado) == true) ? $objEmpleado[0]->correo_empleado: ''))?>" type="text" class="form-control" id="inputcorreo" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO_EMPLEADO, true) ?>" placeholder="Digite correo empleado">
        <?php if(session::getInstance()->hasFlash('inputcorreo')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
   
    
   <label for="inputcargo" class="col-sm-2 control-label">CARGO</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CARGO_ID, true) ?>">
          <option value="">Seleccione CARGO</option>
          <?php $cargo = '' ?>
          <?php foreach ($objCargo as $cargo): ?>
            <option value="<?php echo $cargo->id ?>"><?php echo $cargo->desc_cargo  ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputcargo')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
     
     
     
     
     <!--
      <label for="inputUsuario" class="col-sm-2 control-label">USUARIO</label>
      <div class="col-sm-10">
        <select class="form-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::USUARIO_ID, true) ?>">
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




