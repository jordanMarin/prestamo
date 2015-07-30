<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createCargoValidatorClass as validate;

/**
 * Description of createCargoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createCargoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        validate::validateInsert();
        $data = array(
            cargoTableClass::DESC_CARGO => request::getInstance()->getPost('inputCargo')
        );
        cargoTableClass::insert($data);
        session::getInstance()->setSuccess('El cargo fue creado exitosamente');
        $this->defineView('index', 'default', session::getInstance()->getFormatOutput());
      } else {
        //inputCargo
        routing::getInstance()->redirect('default', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
