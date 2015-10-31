<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>
<?php view::includeComponent('componente', 'menu') ?>
<div class="container container-fluid margenContainer">
  <div class="row">
    <div class="col-lg-3">
      <?php view::includePartial('componente/menuIzquierdo', array('bancos' => true)) ?>
    </div>
    <div class="col-lg-9">
      <div class="panel panel-default">
        <div class="panel-body">
          <!-- TITULO -->
          <div class="page-header">
            <h1><i class="fa fa-fw fa-users"></i> Banco <a href="<?php echo routing::getInstance()->getUrlWeb('@banco') ?>" class="btn btn-success btn-sm btn-round"><i class="fa fa-plus"></i></a></h1>
          </div>
          <!-- TITULO -->
          <!-- TABLA -->
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
              <?php foreach ($objBanco as $banco): ?>
                <tr>
                  <td></td>
                  <td><?php echo $banco->nombre ?></td>
                  <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Ver</a>
                    <a href="<?php echo routing::getInstance()->getUrlWeb('@banco_edit', array('id' => $banco->id)) ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                    <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $banco->id ?>"><i class="fa fa-times"></i> Eliminar</a>
                    <?php view::includePartial('componente/modalDelete', array(
                        'id' => $banco->id,
                        'url' => routing::getInstance()->getUrlWeb('@banco_delete', array('id' => $banco->id)),
                        'mensaje' => '¿Desea eliminar el banco seleccionado?'
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