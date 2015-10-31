<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createNegocioActionClass as validate;

/**
 * Description of editCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class editNegocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet('id') === true) {
        $id = request::getInstance()->getGet('id');

        $fields = array(
            negocioTableClass::ID,
            negocioTableClass::NOMBRE,
            negocioTableClass::DIRECCION,
            negocioTableClass::TELEFONO,
            negocioTableClass::INGRESO_MENSUAL
        );

        $where = array(
            negocioTableClass::ID => $id
        );

        $this->objNegocio = negocioTableClass::getAll($fields, true, null, null, null, null, $where);

        $this->defineView('editNegocio', 'negocio', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('@negocio_listado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
