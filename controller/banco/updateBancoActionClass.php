<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createBancoActionClass as validate;

/**
 * Description of createBancoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class updateBancoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
      if(request::getInstance()->isMethod('POST')) {
        $id = request::getInstance()->getPost(bancoTableClass::getNameField(bancoTableClass::ID, true));
        $nombre = request::getInstance()->getPost(bancoTableClass::getNameField(bancoTableClass::NOMBRE, true));
        
        $id = array(
          bancoTableClass::ID => $id
        );
        
        $data = array(
          bancoTableClass::NOMBRE => $nombre
        );
        
        bancoTableClass::update($ids, $data);
      }
      
      routing::getInstance()->redirect('@banco');
      
      //$this->defineView('editBanco', 'banco', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}


 