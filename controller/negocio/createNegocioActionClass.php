<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createNegocioActionClass as validate;

/**
 * Description of createNegocioActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createNegocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

   

      
      

        //validate::validateInsert();
          
        $data = array(
         
          negocioTableClass::NOMBRE=>request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::NOMBRE,true)),
          negocioTableClass::DIRECCION=>request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::DIRECCION,true)),
          negocioTableClass::TELEFONO=>request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::TELEFONO,true)),
          negocioTableClass::INGRESO_MENSUAL=>request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::INGRESO_MENSUAL,true)),
          negocioTableClass::CLIENTE_ID=>request::getInstance()->getPost(negocioTableClass::getNameField(negocioTableClass::CLIENTE_ID,true)),
            
           
           
        );

        
        negocioTableClass::insert($data);
        session::getInstance()->setSuccess('El negocio fue creado exitosamente');
        // $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
//        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
//      } else {
        //inputBarrio
        routing::getInstance()->redirect('negocio','negocio');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}



 