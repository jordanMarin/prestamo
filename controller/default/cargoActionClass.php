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
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class cargoActionClass extends controllerClass implements controllerActionInterface {

   

    public function execute() {
      try {
          $fields = array(
          cargoTableClassTableClass::ID,
          cargoTableClassTableClass::DESC_CARGO,
          );
          $this-> objcargo= cargoTableClass::getAll($fields,true);
          $this->defineView($cargo,$default,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}
