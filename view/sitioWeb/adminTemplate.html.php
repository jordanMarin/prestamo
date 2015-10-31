<?php

use mvc\view\viewClass as view ?>
<?php
use mvc\routing\routingClass as routing ?>
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
            <h1><i class="fa fa-fw fa-dashboard"></i> Panel de administración</h1>
          </div>
          <!-- TITULO -->

          <div class="jumbotron">
            <h1>Bienvenido a QuickLoan</h1>
            <p>Sistemade información para el seguimiento de prestamos rápidos</p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php view::includePartial('componente/footer') ?>