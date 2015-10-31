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
 * Description of updateCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class updateCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::ID, true));
        $TIPO_DOCUMENTO_ID = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::TIPO_DOCUMENTO_ID, true));
        $IDENTIFICACION = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::IDENTIFICACION, true));
        $NOMBRE = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::NOMBRE, true));
        $APELLIDO = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::APELLIDO, true));
        $TELEFONO = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::TELEFONO, true));
        $CELULAR = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::CELULAR, true));
        $DIRECCION = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::DIRECCION, true));
        $CORREO = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::CORREO, true));
        $LOCALIDAD_ID = request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::LOCALIDAD_ID, true));

        $ids = array(
            codeudorTableClass::ID => $id
        );

        $data = array(
            codeudorTableClass::TIPO_DOCUMENTO_ID => $TIPO_DOCUMENTO_ID,
            codeudorTableClass::IDENTIFICACION => $IDENTIFICACION,
            codeudorTableClass::NOMBRE => $NOMBRE,
            codeudorTableClass::APELLIDO => $APELLIDO,
            codeudorTableClass::TELEFONO => $TELEFONO,
            codeudorTableClass::CELULAR => $CELULAR,
            codeudorTableClass::DIRECCION => $DIRECCION,
            codeudorTableClass::CORREO => $CORREO,
            codeudorTableClass::LOCALIDAD_ID => $LOCALIDAD_ID
        );

        codeudorTableClass::update($ids, $data);
      }
      routing::getInstance()->redirect('@codeudor');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
