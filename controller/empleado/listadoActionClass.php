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
      empleadoTableClass::ID,
      empleadoTableClass::NOMBRE,
      empleadoTableClass::APELLIDO,
      empleadoTableClass::DIRECCION,
      empleadoTableClass::TELEFONO,
      empleadoTableClass::MOVIL,
      empleadoTableClass::CORREO
          
      
          
          
      );
      
      $orderBy = array(
       empleadoTableClass::NOMBRE,
     
          
          
      );

       $this->objEmpleado = empleadoTableClass::getAll($fields, true, $orderBy, 'ASC');

      $this->defineView('listado', 'empleado', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
