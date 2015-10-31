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
 * Description of editBancoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class editBancoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet('id') === true) {
        $id = request::getInstance()->getGet('id');

        $fields = array(
            bancoTableClass::ID,
            bancoTableClass::NOMBRE
        );

        $where = array(
            bancoTableClass::ID => $id
        );

        $this->objBanco = bancoTableClass::getAll($fields, true, null, null, null, null, $where);

        $this->defineView('editBanco', 'banco', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('@banco');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
