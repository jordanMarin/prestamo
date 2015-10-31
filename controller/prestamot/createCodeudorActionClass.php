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
 * Description of createCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
         
        
        
        $data = array(
            codeudorTableClass::TIPO_DOCUMENTO_ID => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::TIPO_DOCUMENTO_ID, true)),
            codeudorTableClass::NUMERO_IDENTIFICACION => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::NUMERO_IDENTIFICACION, true)),
            codeudorTableClass::NOMBRE_CODEUDOR => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::NOMBRE_CODEUDOR, true)),
            codeudorTableClass::APELL_CODEUDOR => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::APELL_CODEUDOR, true)),
            codeudorTableClass::TELEFONO_CODEUDOR => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::TELEFONO_CODEUDOR, true)),
            codeudorTableClass::MOVIL_CODEUDOR => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::MOVIL_CODEUDOR, true)),
            codeudorTableClass::DIRECCION_CODEUDOR => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::DIRECCION_CODEUDOR, true)),
            codeudorTableClass::CORREO_CODEUDOR=>  request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::CORREO_CODEUDOR,TRUE)),
            codeudorTableClass::LOCALIDAD_ID => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::LOCALIDAD_ID, true)),
            
            
            
            
        );
        codeudorTableClass::insert($data);
        session::getInstance()->setSuccess('El codeudor fue creado exitosamente');
        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
      } else {
        //inputBarrio
        routing::getInstance()->redirect('prestamo', 'createCodeudor');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}


 