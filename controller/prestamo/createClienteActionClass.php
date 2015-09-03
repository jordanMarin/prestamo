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

        $data = array(
            usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
            usuarioTableClass::USER => request::getInstance()->getPost('inputUsuario'),
            usuarioTableClass::PASSWORD => md5(request::getInstance()->getPost('inputPassword')),
            '__sequence' => 'usuario_id_seq'
        );
        
        $usuario_id = usuarioTableClass::insert($data);

        //validate::validateInsert();
        $data = array(
            clienteTableClass::TIPO_DOCUMENTO_ID => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TIPO_DOCUMENTO_ID, true)),
            clienteTableClass::NUMERO_IDENTIFICACION => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NUMERO_IDENTIFICACION, true)),
            clienteTableClass::NOMBRE_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::NOMBRE_CLIENTE, true)),
            clienteTableClass::APELLIDO_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::APELLIDO_CLIENTE, true)),
            clienteTableClass::CELULAR_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CELULAR_CLIENTE, true)),
            clienteTableClass::TELEFONO_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::TELEFONO_CLIENTE, true)),
            clienteTableClass::CORREO_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::CORREO_CLIENTE, true)),
            clienteTableClass::DIRECCION_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::DIRECCION_CLIENTE, true)),
            clienteTableClass::FECHA_NACIMIENTO_CLIENTE => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::FECHA_NACIMIENTO_CLIENTE, true)),
            clienteTableClass::LOCALIDAD_ID => request::getInstance()->getPost(clienteTableClass::getNameField(clienteTableClass::LOCALIDAD_ID, true)),
            clienteTableClass::USUARIO_ID => $usuario_id
        );


        clienteTableClass::insert($data);
        session::getInstance()->setSuccess('El cliente fue creado exitosamente');
        // $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
      } else {
        //inputBarrio
        routing::getInstance()->redirect('prestamo','createCliente');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
