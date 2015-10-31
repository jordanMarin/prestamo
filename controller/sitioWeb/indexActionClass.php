<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass as controller;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class indexActionClass extends controller implements controllerActionInterface {

  public function execute() {    
    try {
      $session = session::getInstance();
      if ($session->isUserAuthenticated() === true and $session->hasCredential('admin')) {
        routing::getInstance()->forward('@adminHomepage');
      } else {
        $this->defineView('index', 'sitioWeb', session::getInstance()->getFormatOutput());
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
