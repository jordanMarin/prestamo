<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\session\sessionClass as session ?>
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <!-- <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> -->
      <button id="open-right" aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">QuickLoan</a>
    </div>
    <div class="navbar-collapse collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Inicio</a></li>
        <li><a href="#about">Quienes somos</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModalContacto">Contactenos</a></li>
        <?php if(session::getInstance()->isUserAuthenticated()) : ?>
        <li><a href="#">Panel de control</a></li>
        <li><a href="<?php echo routing::getInstance()->getUrlWeb('@shfSecurity_logout') ?>">Cerrar sesión</a></li>
        <?php else : ?>
        <li><a href="<?php echo routing::getInstance()->getUrlWeb('@shfSecurity_index') ?>">Iniciar sesión</a></li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
