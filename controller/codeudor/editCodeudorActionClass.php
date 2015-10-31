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
 * Description of editCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class editCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet('id') === true) {
        $id = request::getInstance()->getGet('id');

        $fields = array(
            codeudorTableClass::ID,
            codeudorTableClass::TIPO_DOCUMENTO_ID,
            codeudorTableClass::IDENTIFICACION,
            codeudorTableClass::NOMBRE,
            codeudorTableClass::APELLIDO,
            codeudorTableClass::TELEFONO,
            codeudorTableClass::CELULAR,
            codeudorTableClass::DIRECCION,
            codeudorTableClass::CORREO,
            codeudorTableClass::LOCALIDAD_ID
        );

        $where = array(
            codeudorTableClass::ID => $id
//        codeudorTableClass::TIPO_DOCUMENTO_ID=> $TIPO_DOCUMENTO_ID, 
//        codeudorTableClass::IDENTIFICACION => $IDENTIFICACION, 
//        codeudorTableClass::NOMBRE => $NOMBRE, 
//        codeudorTableClass::APELLIDO,
//        codeudorTableClass::TELEFONO,
//        codeudorTableClass::CELULAR,
//        codeudorTableClass::DIRECCION,
//        codeudorTableClass::CORREO,
//        codeudorTableClass::LOCALIDAD_ID
        );

        $fields2 = array(
            tipo_documentoTableClass::ID,
            tipo_documentoTableClass::DESC_DOCUMENTO,
        );

        $fields1 = array(
            localidadTableClass::ID,
            localidadTableClass::NOMBRE,
        );

        $this->objTipoDocumento = tipo_documentoTableClass::getAll($fields2);
        $this->objLocalidad = localidadTableClass::getAll($fields1);

        $this->objCodeudor = codeudorTableClass::getAll($fields, true, null, null, null, null, $where);

        $this->defineView('editCodeudor', 'codeudor', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('@codeudor_listado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
