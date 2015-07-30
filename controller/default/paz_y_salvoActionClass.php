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
class paz_y_salvoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
      try {
          $fields = array(
          paz_y_salvoTableClass::ID,
          paz_y_salvoTableClass::VALOR_ENTREGADO,
          paz_y_salvoTableClass::OBSERVACIÓN,
          paz_y_salvoTableClass::EMPLEADO_ID,
              
          
          );
          $this-> objpaz_y_salvo= paz_y_salvoTableClass::getAll($fields,true);
          $this->defineView($paz_y_salvo,$default,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}
