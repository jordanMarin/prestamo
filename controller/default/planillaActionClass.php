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
class planillaActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
      try {
          $fields = array(
          planillaTableClass::ID,
          planillaTableClass::VALOR_RECAUDO,
          planillaTableClass::OBSERVACIONES,
          planillaTableClass::EMPLEADO_ID,
          planillaTableClass::PRESTAMO_ID,
          );
          $this-> objplanilla= planillaTableClass::getAll($fields,true);
          $this->defineView($planilla,$default,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}
