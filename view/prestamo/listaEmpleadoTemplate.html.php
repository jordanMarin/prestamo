<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php $nombre=empleadoTableClass::NOMBRE ?>
<?php $apellido=empleadoTableClass::APELLIDO_EMPLEADO ?>
<?php $id = empleadoTableClass::ID ?>
<div class="container container-fluid">
  <?php view::includePartial('default/menuPrincipal') ?>
  <?php view::includeHandlerMessage() ?>
  <div class="well">
    <h1>Bienvenido!!!</h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Telefono</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objListEmpleado as $empleado): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $usuario->$id ?>"></td>
            <td><?php echo $empleado->$nombre ?></td>
            <td><?php echo $empleado->$apellido ?></td>
             <td><?php echo $empleado->telefono_empleado ?></td>
            
            <td>
              <a href="#" class="btn btn-warning btn-xs">Ver</a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('prestamo', 'editEmpleado', array(usuarioTableClass::ID => $usuario->$id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $usuario->$id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">
  </form>
</div>






 <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Usuario</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objUsuarios as $usuario): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $usuario->$id ?>"></td>
            <td><?php echo $usuario->$usu ?></td>
            <td>
              <a href="#" class="btn btn-warning btn-xs">Ver</a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'editCliente', array(usuarioTableClass::ID => $usuario->$id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $usuario->$id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">
  </form>
