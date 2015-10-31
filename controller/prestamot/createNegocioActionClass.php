<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createNegocioValidatorClass as validate;

/**
 * Description of createNegocioActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createNegocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        // primero hay que crear el cliente y luego si los datos!!!

      
      

        //validate::validateInsert();
        $data = array(
          negocioTableClass::ID=>  request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID,true)),
          negocioTableClass::NOMBRE_NEGOCIO=>  request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID,true)),
          negocioTableClass::DIRECCION_NEGOCIO=>  request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID,true)),
          negocioTableClass::TELEFONO_NEGOCIO=>  request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID,true)),
          negocioTableClass::VALOR_INGRESO_NEGOCIO=>  request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID,true)),
          negocioTableClass::CLIENTE_ID=>  request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::ID,true)),
            
           
           
        );


        negocioTableClass::insert($data);
        session::getInstance()->setSuccess('El negocio fue creado exitosamente');
        // $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
      } else {
        //inputBarrio
        routing::getInstance()->redirect('prestamo','createNegocio');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
