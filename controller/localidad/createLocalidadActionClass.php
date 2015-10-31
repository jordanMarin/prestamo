<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createLocalidadValidatorClass as validate;

/**
 * Description of createLocalidadActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createLocalidadActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        // primero hay que crear el cliente y luego si los datos!!!

      
        
       
        //validate::validateInsert();
        $data = array(
        localidadTableClass::NOMBRE => request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::NOMBRE, true)),
            
          
        );


        clienteTableClass::insert($data);
        session::getInstance()->setSuccess('la localidad fue creado exitosamente');
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
