<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\clienteValidatorClass as validate;

/**
 * Description of createClienteActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createClienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $usuario = request::getInstance()->getPost('inputUsuario');
        $password = request::getInstance()->getPost('inputPassword');
        $tipo_documento = request::getInstance()->getPost('inputTipo_documento');
        $identificacion = request::getInstance()->getPost('inputIdentificacion');
        $nombre = request::getInstance()->getPost('inputNombre');
        $apellido = request::getInstance()->getPost('inputApellido');
        $celular = request::getInstance()->getPost('inputCelular');
        $telefono = request::getInstance()->getPost('inputTelefono');
        $correo = request::getInstance()->getPost('inputCorreo');
        $direccion = request::getInstance()->getPost('inputDireccion');
        $fecha_nacimiento = request::getInstance()->getPost('inputFecha_nacimiento');
        $localidad = request::getInstance()->getPost('inputLocalidad');

        validate::insert($usuario, $password, $tipo_documento, $identificacion, $nombre, $apellido, $celular, $telefono, $correo, $direccion, $fecha_nacimiento, $localidad);

        $data1 = array(
            usuarioTableClass::USER => $usuario,
            usuarioTableClass::PASSWORD => md5($password),
            usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
            '__sequence' => 'usuario_id_seq'
        );
        $usuario_id = usuarioTableClass::insert($data1);

        $data2 = array(
            clienteTableClass::TIPO_DOCUMENTO_ID => $tipo_documento,
            clienteTableClass::IDENTIFICACION => $identificacion,
            clienteTableClass::NOMBRE => $nombre,
            clienteTableClass::APELLIDO => $apellido,
            clienteTableClass::CELULAR => $celular,
            clienteTableClass::TELEFONO => $telefono,
            clienteTableClass::CORREO => $correo,
            clienteTableClass::DIRECCION => $direccion,
            clienteTableClass::FECHA_NACIMIENTO => $fecha_nacimiento,
            clienteTableClass::LOCALIDAD_ID => $localidad,
            clienteTableClass::USUARIO_ID => $usuario_id
        );
        clienteTableClass::insert($data2);

        session::getInstance()->setSuccess('El cliente fue creado exitosamente');
        routing::getInstance()->redirect('@cliente_lista');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
