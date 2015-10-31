<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>
<?php view::includeComponent('componente', 'menu') ?>
<div class="container container-fluid margenContainer">
  <div class="row">
    <div class="col-lg-3">
      <?php view::includePartial('componente/menuIzquierdo') ?>
    </div>
    <div class="col-lg-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- TITULO -->
          <div class="page-header">
            <h1><i class="fa fa-fw fa-users"></i> Clientes</h1>
          </div>
          <!-- TITULO -->
          <!-- TABLA -->
          <div class="botonera">
            <a href="<?php echo routing::getInstance()->getUrlWeb('@cliente_cliente') ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-plus"></i> Nuevo</a>
          </div>
          <?php view::includeHandlerMessage() ?>
          <table class="table">
            <thead>
              <tr>
                <th style="width: 10px">No.</th>
                <th>Nombre</th>
                <th style="width: 200px">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($objCliente as $cliente): ?>
                <tr>
                  <td></td>
                  <td><?php echo $cliente->nombre ?></td>
                  <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Ver</a>
                    <a href="<?php echo routing::getInstance()->getUrlWeb('@cliente_edit', array('id' => $cliente->id)) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $cliente->id ?>"><i class="fa fa-times"></i> Eliminar</a>
                    <?php view::includePartial('componente/modalDelete', array(
                        'id' => $cliente->id,
                        'url' => routing::getInstance()->getUrlWeb('@cliente_delete', array('id' => $cliente->id)),
                        'mensaje' => '¿Desea eliminar el cliente seleccionado?'
                    )) ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <!-- TABLA -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php view::includePartial('componente/footer') ?>