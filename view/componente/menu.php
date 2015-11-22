<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\session\sessionClass as session ?>
<?php $session = session::getInstance() ?>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo routing::getInstance()->getUrlWeb('@homepage') ?>">QuickLoan</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-user"></i> Usuario <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-fw fa-unlock-alt"></i> Cambiar contraseña</a></li>
            <?php if ($session->isUserAuthenticated() === true and $session->hasCredential('admin')) : ?>
            <li><a href="#"><i class="fa fa-fw fa-file-o"></i> Crear copia de seguridad</a></li>
            <li><a href="#"><i class="fa fa-fw fa-database"></i> Cargar copia de seguridad</a></li>
            <?php endif ?>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb('@shfSecurity_logout') ?>"><i class="fa fa-fw fa-sign-out"></i> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      <?php if ($session->isUserAuthenticated() === true and $session->hasCredential('admin')) : ?>
      <form method="POST" action="<?php echo routing::getInstance()->getUrlWeb('@buscar') ?>" class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" name="buscar" placeholder="¿Qué desea buscar?">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
      </form>
      <?php endif ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>