<?php use mvc\routing\routingClass as routing ?>
<?php $routing = routing::getInstance() ?>
<div class="panel panel-default">
  <div class="panel-heading">Menú principal</div>
  <div class="list-group">
    <!--https://fortawesome.github.io/Font-Awesome/icons/-->
    <a href="#" class="list-group-item <?php echo isset($solicitarPrestamo) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Solicitar prestamo</a>
    <a href="#" class="list-group-item <?php echo isset($cotizacion) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Cotizar prestamo</a>
    <a href="#" class="list-group-item <?php echo isset($prestamoActivo) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Prestamo activo</a>
    <a href="#" class="list-group-item <?php echo isset($reportes) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Historial de prestamos</a>
  </div>
</div>