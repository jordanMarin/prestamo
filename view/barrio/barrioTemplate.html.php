<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
  <?php view::includePartial('barrio/formBarrio', array('objCiudad' => $objCiudad)) ?>
</div>