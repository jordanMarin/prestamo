<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <aldany29@hotmail.com>
 */
class editClienteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(usuarioTableClass::ID)) {
        $fields = array(
            usuarioTableClass::ID,
            usuarioTableClass::USER,
            usuarioTableClass::PASSWORD
        );
        $where = array(
            usuarioTableClass::ID => request::getInstance()->getRequest(usuarioTableClass::ID)
        );
        
         $fields1 = array(
        
            clienteTableClass::ID,   
            clienteTableClass::TIPO_DOCUMENTO_ID,
            clienteTableClass::NUMERO_IDENTIFICACION,
            clienteTableClass::NOMBRE_CLIENTE,
            clienteTableClass::APELLIDO_CLIENTE,
            clienteTableClass::CELULAR_CLIENTE, 
            clienteTableClass::TELEFONO_CLIENTE,
            clienteTableClass::CORREO_CLIENTE, 
            clienteTableClass::DIRECCION_CLIENTE,
            clienteTableClass::FECHA_NACIMIENTO_CLIENTE,
            clienteTableClass::LOCALIDAD_ID, 
            
             
        );
        
          $where1 = array(
          clienteTableClass::ID => request::getInstance()->getRequest(usuarioTableClass::ID)
        );
        
            
      $fields2 = array(
      localidadTableClass::ID,
      localidadTableClass::NOMBRE,
      
        
      );
      
       $fields3 = array(
       tipo_documentoTableClass::ID,
       tipo_documentoTableClass::DESC_DOCUMENTO,
           
           
         );  
        $this->objtipo_documento=tipo_documentoTableClass::getAll($fields3);
        $this->objLocalidad = localidadTableClass::getAll($fields2);
        $this->objUsuario = usuarioTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->objCliente= clienteTableClass::getAll($fields1,true, null, null, null, null, $where1);
        $this->defineView('formCliente', 'prestamo', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('prestamo', 'insert');
      }
//      if (request::getInstance()->isMethod('POST')) {
//
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USUARIO, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
//
//        if (strlen($usuario) > usuarioTableClass::USUARIO_LENGTH) {
//          throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USUARIO_LENGTH)), 00001);
//        }
//
//        $data = array(
//            usuarioTableClass::USUARIO => $usuario,
//            usuarioTableClass::PASSWORD => md5($password)
//        );
//        usuarioTableClass::insert($data);
//        routing::getInstance()->redirect('default', 'index');
//      } else {
//        routing::getInstance()->redirect('default', 'index');
//      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
