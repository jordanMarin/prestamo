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
      codeudorTableClass::ID,
      codeudorTableClass::TIPO_DOCUMENTO_ID,
      codeudorTableClass::IDENTIFICACION,
      codeudorTableClass::NOMBRE,
      codeudorTableClass::APELLIDO,
      codeudorTableClass::TELEFONO, 
      codeudorTableClass::CELULAR,
      codeudorTableClass::DIRECCION,
      codeudorTableClass::CORREO
          
          
      );
      
      $orderBy = array(
      codeudorTableClass::NOMBRE,
      codeudorTableClass::APELLIDO,
      codeudorTableClass::TELEFONO, 
      codeudorTableClass::CELULAR,
      codeudorTableClass::DIRECCION,
      codeudorTableClass::CORREO
          
      );

      $this->objCodeudor= codeudorTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, null);

      $this->defineView('listado', 'codeudor', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
