<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;


/**
 * Description of ejemploClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class negocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {


      $fields1 = array(
        clienteTableClass::ID,
        clienteTableClass::NOMBRE
       
      
      );

      $this->objCliente = clienteTableClass::getAll($fields1);

      $this->defineView('formNegocio','negocio', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

 
