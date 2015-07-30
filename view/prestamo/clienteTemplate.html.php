<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
  <?php view::includePartial('prestamo/formCliente', array('objTipo_documento' => $objTipo_documento,'objLocalidad'=> $objLocalidad,'objUsuario'=>$objUsuario)) ?>
</div>


 


