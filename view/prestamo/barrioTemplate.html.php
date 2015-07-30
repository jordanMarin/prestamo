<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
  <?php view::includePartial('prestamo/formbarrio', array('objCiudad' => $objCiudad)) ?>
</div>