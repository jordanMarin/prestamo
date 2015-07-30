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
class formato_de_prestamoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
      try {
          $fields = array(
          formato_de_prestamoTableClass::ID,
          formato_de_prestamoTableClass::MONTO_CAPITAL,
          formato_de_prestamoTableClass::NUMERO_CUOTAS,
          formato_de_prestamoTableClass::NOMBRE_BANCO,
          formato_de_prestamoTableClass::TIPO_CUENTA_BANCARIA,
          formato_de_prestamoTableClass::NUM_CUENTA_BANCARIA,
          formato_de_prestamoTableClass::CLIENTE_ID,
          formato_de_prestamoTableClass::CODEUDOR_ID,
          formato_de_prestamoTableClass::APROVADO,
          
              
          );
          $this-> objformato_de_prestamo= formato_de_prestamoTableClass::getAll($fields,true);
          $this->defineView($formato_de_prestamo,$default,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}
