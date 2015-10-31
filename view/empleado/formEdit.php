<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>
<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('@empleado_update') ?>">
  <input type="hidden" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>" value="<?php echo $objEmpleado[0]->id ?>">
  <fieldset>
    
    <?php if(session::getInstance()->hasError('inputEmpleado')): ?>
    <?php view::getMessageError('inputEmpleado') ?>
    <?php endif ?>
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputEmpledo')) ? 'has-error has-feedback' : '' ?>">

      <label for="inputEmpledo" class="col-sm-2 control-label">TIPO DE DOCUMENTO</label>
      <div class="col-sm-10">
        <select required class="form-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TIPO_DOCUMENTO_ID, TRUE) ?>">
          <option value="">Seleccione TIPO DOCUMENTO</option>
          <?php foreach ($objTipoDocumento as $tipoDocumento): ?>
            <option <?php echo ($tipoDocumento->id === $objEmpleado[0]->tipo_documento_id) ? 'selected' : '' ?> value="<?php echo $tipoDocumento->id ?>"><?php echo $tipoDocumento->desc_documento ?></option>
          <?php endforeach ?>
        </select>

        <?php if (session::getInstance()->hasFlash('inputEmpledo')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
    
    
    
    
    
    
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputidentificacion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputidentificacion" class="col-sm-2 control-label">NUMERO IDENTIFICASION</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->identificacion ?>"
               type="text" 
               class="form-control" 
               id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::IDENTIFICACION, true) ?>"  
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::IDENTIFICACION, true) ?>" 
               placeholder="Digite  numero ">
        <?php if(session::getInstance()->hasFlash('inputidentificacion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    
   
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->nombre?>"
               type="text" 
               class="form-control" 
               id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, true) ?>" 
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, true) ?>" 
               placeholder="Digite  nombre empleado">
        <?php if(session::getInstance()->hasFlash('inputnombre')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputapellido')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputapellido" class="col-sm-2 control-label">APELLIDO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->apellidos?>"
               type="text" 
               class="form-control" 
               id= "<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELLIDO, true) ?>" 
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELLIDO, true) ?>" 
               placeholder="Digite  apellido empleado">
        <?php if(session::getInstance()->hasFlash('inputapellido')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputdireccion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->direccion?>"
               type="text" 
               class="form-control" 
               id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>"  
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>" 
               placeholder="Digite  direccion empleado">
        <?php if(session::getInstance()->hasFlash('inputdireccion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->telefono?>"
               type="text" 
               class="form-control" 
               id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>"  
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>" 
               placeholder="Digite  telefono empleado">
        <?php if(session::getInstance()->hasFlash('inputtelefono')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputmovil')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">MOVIL</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->movil ?>"
               type="text" 
               class="form-control" 
               id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::MOVIL, true) ?>"  
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::MOVIL, true) ?>" 
               placeholder="Digite  movil empleado">
               <?php if (session::getInstance()->hasFlash('inputmovil')): ?>
          <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
    </div>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputcorreo')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputcorreo" class="col-sm-2 control-label">CORREO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objEmpleado[0]->correo?>"
               type="text" 
               class="form-control" 
               id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) ?>"  
               name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) ?>" 
               placeholder="Digite correo empleado">
        <?php if(session::getInstance()->hasFlash('inputcorreo')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
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
        <button type="submit" class="btn btn-primary">Modificar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>




