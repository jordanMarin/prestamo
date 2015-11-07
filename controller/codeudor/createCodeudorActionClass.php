<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\codeudorActionClass as validate;

/**
 * Description of createCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
//        $codeudor = request::getInstance()->getPost('inputNombre');
         
        
        
        $data = array(
            codeudorTableClass::TIPO_DOCUMENTO_ID => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::TIPO_DOCUMENTO_ID, true)),
            codeudorTableClass::IDENTIFICACION => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::IDENTIFICACION, true)),
            codeudorTableClass::NOMBRE=> request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::NOMBRE, true)),
            codeudorTableClass::APELLIDO => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::APELLIDO, true)),
            codeudorTableClass::TELEFONO => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::TELEFONO, true)),
            codeudorTableClass::CELULAR => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::CELULAR, true)),
            codeudorTableClass::DIRECCION => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::DIRECCION, true)),
            codeudorTableClass::CORREO=>  request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::CORREO,TRUE)),
            codeudorTableClass::LOCALIDAD_ID => request::getInstance()->getPost(codeudorTableClass::getNameField(codeudorTableClass::LOCALIDAD_ID, true)),
            
            
            
            
        );
//        validate::insert($codeudor);

        codeudorTableClass::insert($data);
        session::getInstance()->setSuccess('El codeudor fue creado exitosamente');
//        $this->defineView('index', ' codeudor', session::getInstance()->getFormatOutput());
//      } else {
        //inputBarrio
       routing::getInstance()->redirect('@codeudor_listado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}


 