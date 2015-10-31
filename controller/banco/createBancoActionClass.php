<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\bancoValidatorClass as validate;

/**
 * Description of createBancoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createBancoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        $banco = request::getInstance()->getPost('inputBanco');
        $data = array(
            bancoTableClass::NOMBRE => $banco
        );

        validate::insert($banco);

        bancoTableClass::insert($data);
        session::getInstance()->setSuccess('El banco fue creado exitosamente');
        routing::getInstance()->redirect('@banco_index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
