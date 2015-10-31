<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
  <?php view::includePartial('empleado/formEmpleado', array('objUsuario'=>$objUsuario,'objTipo_documento' => $objTipo_documento)) ?>
</div>






 

