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
            <h1><i class="fa fa-fw fa-bank"></i> Nuevo banco</h1>
          </div>
          <!-- TITULO -->
          <?php view::includePartial('banco/formBanco') ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php view::includePartial('componente/footer') ?>