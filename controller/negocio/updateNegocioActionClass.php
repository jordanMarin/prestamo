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
 * Description of updateCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class updateNegocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID, true));

        $NOMBRE = request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::NOMBRE, true));
        $DIRECCION = request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::DIRECCION, true));
        $TELEFONO = request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::TELEFONO, true));
        $INGRESO_MENSUAL = request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::INGRESO_MENSUAL, true));

        $ids = array(
            negocioTableClass::ID => $id
        );

        $data = array(
            negocioTableClass::NOMBRE => $NOMBRE,
            negocioTableClass::DIRECCION => $DIRECCION,
            negocioTableClass::TELEFONO => $TELEFONO,
            negocioTableClass::INGRESO_MENSUAL => $INGRESO_MENSUAL
        );

        negocioTableClass::update($ids, $data);
      }
      session::getInstance()->setSuccess('El registro fue modificado exitosamente');
      routing::getInstance()->redirect('@negocio_listado');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
