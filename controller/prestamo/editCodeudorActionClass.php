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
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class editCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(codeudorTableClass::ID)) {
       $fields = array(
             
          codeudorTableClass::ID,
          codeudorTableClass::TIPO_DOCUMENTO_ID,
          codeudorTableClass::NUMERO_IDENTIFICACION,
          codeudorTableClass::NOMBRE_CODEUDOR,
          codeudorTableClass::APELL_CODEUDOR,
          codeudorTableClass::TELEFONO_CODEUDOR,
          codeudorTableClass::MOVIL_CODEUDOR,
          codeudorTableClass::DIRECCION_CODEUDOR,
          codeudorTableClass::LOCALIDAD_ID     

        );
        $where = array(
            codeudorTableClass::ID => request::getInstance()->getRequest(codeudorTableClass::ID)
        );
         $fields1 = array(
      cargoTableClass::ID,
      cargoTableClass::DESC_CARGO,
      
        
      );

          $fields2 = array(
      cargoTableClass::ID,
      cargoTableClass::DESC_CARGO,
      
        
      );

         $this->objTipo_documento =  tipo_documentoTableClass::getAll($fields2);
        $this->objLocalidad =  localidadTableClass::getAll($fields1);
        $this->objCodeudor = codeudorTableClass::getAll($fields, true, null, null, null, null, $where);
        $this->defineView('fromCodeudor', 'prestamo', session::getInstance()->getFormatOutput());
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
