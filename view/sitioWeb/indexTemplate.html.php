<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>

<div class="snap-drawers">
  <div class="snap-drawer snap-drawer-right">
    <?php view::includePartial('parcial/menuDerecha') ?>
  </div>
</div>

<div id="content" class="snap-content">

  <div class="navbar-wrapper">
    <div class="container container-fluid">
      <?php view::includePartial('parcial/menu') ?>
    </div>
  </div>

  <div data-ride="carousel" class="carousel slide" id="myCarousel">
    <?php view::includePartial('parcial/carusel') ?>
  </div>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img width="140" height="140" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-circle">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img width="140" height="140" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-circle">
        <h2>Heading</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img width="140" height="140" alt="Generic placeholder image" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-circle">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a role="button" href="#" class="btn btn-default">View details »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img alt="Generic placeholder image" data-src="holder.js/500x500/auto" class="featurette-image img-responsive center-block">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 col-md-push-5">
        <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 col-md-pull-7">
        <img alt="Generic placeholder image" data-src="holder.js/500x500/auto" class="featurette-image img-responsive center-block">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img alt="Generic placeholder image" data-src="holder.js/500x500/auto" class="featurette-image img-responsive center-block">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <footer>
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>&copy; 2014 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>

  </div>
</div>