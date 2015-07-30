<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of cargoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class formInsertarCargoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $this->defineView('formCargoInsertar','prestamo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}