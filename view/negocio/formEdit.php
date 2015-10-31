<?php use mvc\session\sessionClass as session ?>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\view\viewClass as view ?>

<form class="form-horizontal ibody" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('@negocio_update') ?>">
  <input type="hidden" name="<?php echo negocioTableClass::getNameField(negocioTableClass::ID, true) ?>" value="<?php echo $objNegocio[0]->id ?>">
  <fieldset>
    
    <?php if(session::getInstance()->hasError('inputNegocio')): ?>
    <?php view::getMessageError('inputNegocio') ?>
    <?php endif ?>
  
   
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputnombre')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputnombre" class="col-sm-2 control-label">NOMBRE</label>
      <div class="col-sm-10">
        <input value="<?php echo $objNegocio[0]->nombre ?>"
               type="text" 
               class="form-control" 
               id="<?php echo negocioTableClass::getNameField(negocioTableClass::NOMBRE, TRUE)?>" 
               name="<?php echo negocioTableClass::getNameField(negocioTableClass::NOMBRE, TRUE)?>"
               placeholder="digite el nombre">
        <?php if(session::getInstance()->hasFlash('inputnombre')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
     <div class="form-group <?php echo (session::getInstance()->hasFlash('inputDireccion')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputdireccion_cliente" class="col-sm-2 control-label">DIRECCION</label>
      <div class="col-sm-10">
        <input value="<?php echo $objNegocio[0]->direccion?>"
               type="text" 
               class="form-control" 
               id="<?php echo negocioTableClass::getNameField(negocioTableClass::DIRECCION,TRUE)?>"  
               name="<?php echo negocioTableClass::getNameField(negocioTableClass::DIRECCION,TRUE)?>" 
               placeholder="Digite La direccion">
        <?php if(session::getInstance()->hasFlash('inputDireccion')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    <div class="form-group <?php echo (session::getInstance()->hasFlash('inputtelefono')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputtelefono" class="col-sm-2 control-label">TELEFONO</label>
      <div class="col-sm-10">
        <input value="<?php echo $objNegocio[0]->telefono?>"
               type="text" 
               class="form-control" 
               id="<?php echo negocioTableClass::getNameField(negocioTableClass::TELEFONO,TRUE)?>"  
               name="<?php echo negocioTableClass::getNameField(negocioTableClass::TELEFONO,TRUE)?>" 
               placeholder="Digite numero de telefono">
        <?php if(session::getInstance()->hasFlash('inputtelefono')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
      <div class="form-group <?php echo (session::getInstance()->hasFlash('inputIngreso')) ? 'has-error has-feedback' : '' ?>">
      <label for="inputmovil" class="col-sm-2 control-label">INGRESO MENSUAL</label>
      <div class="col-sm-10">
        <input value="<?php echo $objNegocio[0]->ingresos_mensual?>"
               type="text" 
               class="form-control"
               id="<?php echo negocioTableClass::getNameField(negocioTableClass::INGRESO_MENSUAL,TRUE)?>"  
               name="<?php echo negocioTableClass::getNameField(negocioTableClass::INGRESO_MENSUAL,TRUE)?>" 
               placeholder="Digite ingreso mensual">
        <?php if(session::getInstance()->hasFlash('inputIngreso')): ?>
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <?php endif ?>
      </div>
      </div>
    
    
    
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
    
    
    
    
    
    
    
    <div class="form-group text-right">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Modificar</button>
        <a href="#" class="btn btn-default">Cancelar</a>
      </div>
    </div>

  </fieldset>
</form>







