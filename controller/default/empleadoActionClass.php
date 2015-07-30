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
class empleadoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
      try {
          $fields = array(
          empleadoBaseTableClass::ID,
          empleadoBaseTableClass::NOMBRE,
          empleadoBaseTableClass::APELLIDO_EMPLEADO,
          empleadoBaseTableClass::DIRECCION_EMPLEADO,
          empleadoBaseTableClass::TELEFONO_EMPLEADO,
          empleadoBaseTableClass::MOVIL_EMPELADO,
          empleadoBaseTableClass::CORREO_EMPLEADO,
          empleadoBaseTableClass::CARGO_ID,
          empleadoBaseTableClass::USUARIO_ID,
              
              
          
          );
          $this-> objempleado= empleadoTableClass::getAll($fields,true);
          $this->defineView($empleado,$default,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}
