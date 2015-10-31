<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * 
 */
class bancoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
////       
//
//      $fields = array(
//          tipo_documentoTableClass::ID,
//          tipo_documentoTableClass::DESC_DOCUMENTO
//      );
//      $fields1 = array(
//          localidadTableClass::ID,
//          localidadTableClass::NOMBRE
//      );
//
//      $this->objLocalidad = localidadTableClass::getAll($fields1);
//      $this->objTipo_documento = tipo_documentoTableClass::getAll($fields);
      $this->defineView('banco','banco', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
