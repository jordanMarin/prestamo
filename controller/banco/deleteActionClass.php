<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createBancoActionClass as validate;

/**
 * Description of deleteClass
 *
 * @author Jordan Marin
 */
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    if (request::getInstance()->isMethod('POST') and request::getInstance()->hasPost('id')) {

      $id = request::getInstance()->getPost('id');
      $ids = array(
          bancoTableClass::ID => $id
      );
      bancoTableClass::delete($ids, true);
      session::getInstance()->setSuccess('El banco fue borrado exitosamente');
    }
    routing::getInstance()->redirect('@banco_index');
  }

}