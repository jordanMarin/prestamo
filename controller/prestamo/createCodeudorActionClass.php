<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createCodeudorActionClass as validate;

/**
 * Description of createCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        validate::validateInsert();
        $data = array(
        codeudorTableClass::NOMBRE_CODEUDOR=> request::getInstance()->getPost('inputCodeudor')
        
        );
        clienteTableClass::insert($data);
        session::getInstance()->setSuccess('El codeudor fue creado exitosamente');
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
