<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createClienteValidatorClass as validate;

/**
 * Description of createClienteActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createClienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        // primero hay que crear el cliente y luego si los datos!!!

        $data1 = array(
            usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
            usuarioTableClass::USER => request::getInstance()->getPost('inputUsuario'),
            usuarioTableClass::PASSWORD => md5(request::getInstance()->getPost('inputPassword')),
            '__sequence' => 'usuario_id_seq'
        );
        
        $usuario_id = usuarioTableClass::insert($data1);

        //validate::validateInsert();
        $data = array(
            clienteTableClass::TIPO_DOCUMENTO_ID => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TIPO_DOCUMENTO_ID, true)),
            clienteTableClass::IDENTIFICACION => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::IDENTIFICACION, true)),
            clienteTableClass::NOMBRE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE, true)),
            clienteTableClass::APELLIDO => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO, true)),
            clienteTableClass::CELULAR => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CELULAR, true)),
            clienteTableClass::TELEFONO => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO, true)),
            clienteTableClass::CORREO => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CORREO, true)),
            clienteTableClass::DIRECCION => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION, true)),
            clienteTableClass::FECHA_NACIMIENTO => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO, true)),
            clienteTableClass::LOCALIDAD_ID => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::LOCALIDAD_ID, true)),
            clienteTableClass::USUARIO_ID => $usuario_id
        );

        clienteTableClass::insert($data);
        session::getInstance()->setSuccess('El cliente fue creado exitosamente');
        routing::getInstance()->redirect('@cliente_lista');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
