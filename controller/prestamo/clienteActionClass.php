<?php
use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;


/**
 * Description of clienteActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class clienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      $fields = array(
          clienteBaseTableClass::ID,
          clienteBaseTableClass::NUMERO_IDENTIFICACION,
          clienteBaseTableClass::NOMBRE_CLIENTE,
          clienteBaseTableClass::APELLIDO_CLIENTE,
          clienteBaseTableClass::CELULAR_CLIENTE,
          clienteBaseTableClass::TELEFONO_CLIENTE,
          clienteBaseTableClass::CORREO_CLIENTE,
          clienteBaseTableClass::DIRECCION_CLIENTE,
          clienteBaseTableClass::FECHA_NACIMIENTO_CLIENTE,
          clienteBaseTableClass::USUARIO_ID,
            );
      
      $fields2 = array(
          tipo_documentoTableClass::ID,
          tipo_documentoTableClass::DESC_DOCUMENTO
      );

      $fields1 = array(
          localidadTableClass::ID,
          localidadTableClass::NOMBRE
      );
      
      $fields3 = array(
      usuarioTableClass::ID,
      usuarioTableClass::PASSWORD,
      usuarioTableClass::LAST_LOGIN_AT   
      
      );

      $this->objLocalidad = localidadTableClass::getAll($fields1);
      $this->objTipo_documento = tipo_documentoTableClass::getAll($fields2);
      $this->objUsuario=  usuarioTableClass::getAll($fields3);
      $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
