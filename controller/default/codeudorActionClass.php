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
class codeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
      try {
          $fields = array(
          codeudorBaseTableClass::ID,
          codeudorBaseTableClass::TIPO_DOCUMENTO_ID,
          codeudorBaseTableClass::NUMERO_IDENTIFICACION,
          codeudorBaseTableClass::NOMBRE_CODEUDOR,
          codeudorBaseTableClass::APELL_CODEUDOR,
          codeudorBaseTableClass::TELEFONO_CODEUDOR,
          codeudorBaseTableClass::MOVIL_CODEUDOR,
          codeudorBaseTableClass::DIRECCION_CODEUDOR,
          codeudorBaseTableClass::LOCALIDAD_ID
          
          
          );
          $this-> objcodeudor= codeudorTableClass::getAll($fields,true);
          $this->defineView($codeudor, $prestamo,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}

