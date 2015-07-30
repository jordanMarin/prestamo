<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createBarrioValidatorClass as validate;

/**
 * Description of createBarrioActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createBarrioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        validate::validateInsert();
        $data = array(
        barrioTableClass::NOMBRE_BARRIO => request::getInstance()->getPost('inputBarrio')
        );
        barrioTableClass::insert($data);
        session::getInstance()->setSuccess('El barrio fue creado exitosamente');
        $this->defineView('index', 'default', session::getInstance()->getFormatOutput());
      } else {
        //inputBarrio
        routing::getInstance()->redirect('default', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
