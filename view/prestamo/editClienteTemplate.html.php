<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php $nombre=  clienteTableClass::NOMBRE_CLIENTE?>
<?php $apellido=clienteTableClass::APELLIDO_CLIENTE ?>
<?php $id = clienteTableClass::ID?>
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
      <?php foreach ($objCliente as $cliente): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $usuario->$id ?>"></td>
            <td><?php echo $cliente->$nombre ?></td>
            <td><?php echo $cliente->$apellido ?></td>
             <td><?php echo $cliente->telefono_cliente ?></td>
            
            <td>
              <a href="#" class="btn btn-warning btn-xs">Ver</a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('prestamo', 'editCliente', array(usuarioTableClass::ID => $usuario->$id)) ?>" class="btn btn-primary btn-xs">Editar</a>
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






 
