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
            <h1><i class="fa fa-fw fa-user"></i> Editar cliente</h1>
          </div>
          <!-- TITULO -->
          <?php view::includePartial('codeudor/formEdit', array('objCodeudor' => $objCodeudor,'objLocalidad'=>$objLocalidad, 'objTipoDocumento' => $objTipoDocumento)) ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php view::includePartial('componente/footer') ?>
 