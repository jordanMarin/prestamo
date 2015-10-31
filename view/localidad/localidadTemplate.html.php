<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
  <?php view::includePartial('localidad/formLocalidad', array('objBarrio' => $objCiudad)) ?>
</div>