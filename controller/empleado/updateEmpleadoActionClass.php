<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createEmpleadoActionClass as validate;

/**
 * Description of updateEmpleadoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class updateEmpleadoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::ID, true));
        $TIPO_DOCUMENTO_ID = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TIPO_DOCUMENTO_ID, true));
        $IDENTIFICACION = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::IDENTIFICACION, true));
        $NOMBRE = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE, true));
        $APELLIDO = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELLIDO, true));
        $DIRECCION = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true));
        $TELEFONO = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true));
        $MOVIL = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::MOVIL, true));
        $CORREO = request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true));
//        $LOCALIDAD_ID = request::getInstance()->getPost( empleadoTableClass::getNameField( empleadoTableClass::LOCALIDAD_ID, true));
//        $USUARIO_ID = request::getInstance()->getPost( empleadoTableClass::getNameField( empleadoTableClass::USUARIO_ID, true));

        $id = array(
            empleadoTableClass::ID => $id
        );

        $data = array(
            empleadoTableClass::TIPO_DOCUMENTO_ID => $TIPO_DOCUMENTO_ID,
            empleadoTableClass::IDENTIFICACION => $IDENTIFICACION,
            empleadoTableClass::NOMBRE => $NOMBRE,
            empleadoTableClass::APELLIDO => $APELLIDO,
            empleadoTableClass::DIRECCION => $DIRECCION,
            empleadoTableClass::TELEFONO => $TELEFONO,
            empleadoTableClass::MOVIL => $MOVIL,
            empleadoTableClass::CORREO => $CORREO,
//          empleadoTableClass::LOCALIDAD_ID=>$LOCALIDAD_ID ,
////           empleadoTableClass::USUARIO_ID=> $USUARIO_ID,
        );

        empleadoTableClass::update($id, $data);
      }

      session::getInstance()->setSuccess('El registro fue modificado exitosamente');
      routing::getInstance()->redirect('@empleado_listado');

      //$this->defineView('editBanco', 'banco', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
