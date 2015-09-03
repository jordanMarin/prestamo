<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
  <?php view::includePartial('prestamo/formEmpleado', array('objCargo'=>$objCargo,'objUsuario'=>$objUsuario)) ?>
</div>