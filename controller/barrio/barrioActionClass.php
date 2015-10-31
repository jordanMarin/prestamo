<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of barrioActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class barrioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
       $fields1 = array(
          localidadTableClass::ID,
          localidadTableClass::NOMBRE
      );
      $this->objCiudad = localidadTableClass::getAll($fields1);
      $this->defineView('barrio','barrio', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}