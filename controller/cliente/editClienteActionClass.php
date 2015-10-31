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
 * Description of editClienteActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class editClienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasGet('id')) {

        $fieldsCliente = array(
            clienteBaseTableClass::ID,
            clienteBaseTableClass::TIPO_DOCUMENTO_ID,
            clienteBaseTableClass::IDENTIFICACION,
            clienteBaseTableClass::NOMBRE,
            clienteBaseTableClass::APELLIDO,
            clienteBaseTableClass::CELULAR,
            clienteBaseTableClass::TELEFONO,
            clienteBaseTableClass::CORREO,
            clienteBaseTableClass::DIRECCION,
            clienteBaseTableClass::FECHA_NACIMIENTO,
            clienteBaseTableClass::LOCALIDAD_ID,
            clienteBaseTableClass::USUARIO_ID
        );
        $whereCliente = array(
            clienteTableClass::ID => request::getInstance()->getGet('id')
        );        
        $this->objCliente = clienteTableClass::getAll($fieldsCliente, true, null, null, null, null, $whereCliente);
        
//        $fieldsUsuario = array(
//            usuarioTableClass::ID,
//            usuarioTableClass::USER
//        );
//        $whereUsuario = array(
//            usuarioTableClass::ID => $this->objCliente[0]->usuario_id
//        );
//        $this->objUsuario = usuarioTableClass::getAll($fieldsUsuario, true, null, null, null, null, $whereUsuario);

        
        $fieldsLocalidad = array(
            localidadTableClass::ID,
            localidadTableClass::NOMBRE,
        );
        $this->objLocalidad = localidadTableClass::getAll($fieldsLocalidad, true);
        
        $fieldsTipoDocumento = array(
            tipo_documentoTableClass::ID,
            tipo_documentoTableClass::DESC_DOCUMENTO,
        );
        $this->objTipoDocumento = tipo_documentoTableClass::getAll($fieldsTipoDocumento, true);

        $this->defineView('edit', 'cliente', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('@cliente');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
