<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>
<div class="container">
  <?php view::includePartial('default/menuPrincipal') ?>
  <?php if (isset($nombre)): ?>
  <h1><?php echo $nombre ?></h1>
  <?php endif ?>
  <form action="<?php echo routing::getInstance()->getUrlWeb('prestamo', 'procesar') ?>" method="POST">
    <input name="nombre" type="text"><br>
    <input type="submit" value="Procesar">
  </form>
</div>