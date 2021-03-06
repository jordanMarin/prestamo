<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of indexActionClass
 *
 * 
 */
class listadoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      $fields = array(
      negocioTableClass::ID,
      negocioTableClass::NOMBRE,
      negocioTableClass::DIRECCION,
      negocioTableClass::TELEFONO,
      negocioTableClass::INGRESO_MENSUAL
          
      
          
          
      );
      
      $orderBy = array(
        negocioTableClass::NOMBRE,
     
          
          
      );

      $this->objNegocio = negocioTableClass::getAll($fields, true, $orderBy, 'ASC');

      $this->defineView('listado', 'negocio', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
