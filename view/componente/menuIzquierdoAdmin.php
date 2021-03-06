<?php use mvc\routing\routingClass as routing ?>
<?php $routing = routing::getInstance() ?>
<div class="panel panel-default">
  <div class="panel-heading">Datos del sistema</div>
  <div class="list-group">
    <!--https://fortawesome.github.io/Font-Awesome/icons/-->
    <a href="#" class="list-group-item <?php echo isset($planilla) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Gestionar planilla díaria</a>
    <a href="<?php echo $routing->getUrlWeb('@banco_index') ?>" class="list-group-item <?php echo isset($bancos) ? 'active' : '' ?>"><i class="fa fa-fw fa-bank"></i> Bancos</a>
    <a href="" class="list-group-item <?php echo isset($barrios) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Barrios</a>
    <a href="#" class="list-group-item <?php echo isset($bitacora) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Bitácora del sistema</a>
    <a href="<?php echo $routing->getUrlWeb('@cliente_lista') ?>" class="list-group-item <?php echo isset($clientes) ? 'active' : '' ?>"><i class="fa fa-fw fa-users"></i> Clientes</a>
    <a href="<?php echo $routing->getUrlWeb('@codeudor_listado') ?>" class="list-group-item <?php echo isset($codeudores) ? 'active' : '' ?>"><i class="fa fa-fw fa-child"></i> Codeudores</a>
    <a href="<?php echo $routing->getUrlWeb('@empleado_listado') ?>" class="list-group-item <?php echo isset($empleados) ? 'active' : '' ?>"><i class="fa fa-fw  fa-street-view"></i> Empleados</a>
    <a href="#" class="list-group-item <?php echo isset($localidades) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> Localidades</a>
    <a href="<?php echo $routing->getUrlWeb('@negocio_listado') ?>" class="list-group-item <?php echo isset($negocios) ? 'active' : '' ?>"><i class="fa fa fa-fw fa-home"></i> Negocios de los clientes</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Reportes</div>
  <div class="list-group">
    <!--https://fortawesome.github.io/Font-Awesome/icons/-->
    <a href="#" class="list-group-item <?php echo isset($reporte1) ? 'active' : '' ?>"><i class="fa fa-fw fa-circle"></i> ???</a>
  </div>
</div>