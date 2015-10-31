<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createEmpleadorActionClass as validate;

/**
 * Description of editEmpleadoActionClass 
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class editEmpleadoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet('id') === true) {
        $id = request::getInstance()->getGet('id');

        $fields = array(
            empleadoTableClass::ID,
            empleadoTableClass::TIPO_DOCUMENTO_ID,
            empleadoTableClass::IDENTIFICACION,
            empleadoTableClass::NOMBRE,
            empleadoTableClass::APELLIDO,
            empleadoTableClass::DIRECCION,
            empleadoTableClass::TELEFONO,
            empleadoTableClass::MOVIL,
            empleadoTableClass::CORREO,
//            empleadoTableClass::LOCALIDAD_ID,
//            empleadoTableClass::USUARIO_ID,
        );

        $where = array(
            empleadoTableClass::ID => $id

        );

        $fields2 = array(
            tipo_documentoTableClass::ID,
            tipo_documentoTableClass::DESC_DOCUMENTO,
        );

//        $fields1 = array(
//            localidadTableClass::ID,
//            localidadTableClass::NOMBRE,
//        );

        $this->objTipoDocumento = tipo_documentoTableClass::getAll($fields2);
//        $this->objLocalidad = localidadTableClass::getAll($fields1);

        $this->objEmpleado = empleadoTableClass::getAll($fields, true, null, null, null, null, $where);

        $this->defineView('editEmpleado', 'empleado', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('@empleado_listado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}



//            empleadoTableClass::ID,
//            empleadoTableClass::TIPO_DOCUMENTO_ID,
//            empleadoTableClass::IDENTIFICACION,
//            empleadoTableClass::NOMBRE,
//            empleadoTableClass::APELLIDO,
//            empleadoTableClass::DIRECCION,
//            empleadoTableClass::TELEFONO,
//            empleadoTableClass::MOVIL,
//            empleadoTableClass::CORREO,
//            empleadoTableClass::LOCALIDAD_ID,
////            empleadoTableClass::USUARIO_ID,