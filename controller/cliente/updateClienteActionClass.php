<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createClienteActionClass as validate;

/**
 * Description of updateClienteActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class updateClienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::ID, true));
        $TIPO_DOCUMENTO_ID = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TIPO_DOCUMENTO_ID, true));
        $IDENTIFICACION = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IDENTIFICACION, true));
        $NOMBRE = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE, true));
        $APELLIDO = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO, true));
        $CELULAR = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CELULAR, true));
        $TELEFONO = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO, true));
        $DIRECCION = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION, true));
        $CORREO = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CORREO, true));
        $FECHA_NACIMIENTO = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, true));
        $LOCALIDAD_ID = request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::LOCALIDAD_ID, true));
//        $USUARIO_ID = request::getInstance()->getPost(codeudorTableClass::getNameField(clienteTableClass::USUARIO_ID, true));

        $id = array(
            clienteTableClass::ID => $id
        );

        $data = array(
            
            clienteBaseTableClass::TIPO_DOCUMENTO_ID => $TIPO_DOCUMENTO_ID,
            clienteBaseTableClass::IDENTIFICACION => $IDENTIFICACION,
            clienteBaseTableClass::NOMBRE => $NOMBRE,
            clienteBaseTableClass::APELLIDO => $APELLIDO,
            clienteBaseTableClass::CELULAR => $CELULAR,
            clienteBaseTableClass::TELEFONO => $TELEFONO,
            clienteBaseTableClass::CORREO => $CORREO,
            clienteBaseTableClass::DIRECCION => $DIRECCION,
            clienteBaseTableClass::FECHA_NACIMIENTO => $FECHA_NACIMIENTO,
            clienteBaseTableClass::LOCALIDAD_ID => $LOCALIDAD_ID
        );

        clienteTableClass::update($id, $data);
      }

      session::getInstance()->setSuccess('El registro fue modificado exitosamente');
      routing::getInstance()->redirect('@cliente_lista');

      //$this->defineView('editBanco', 'banco', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
