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
class clienteActionClass extends controllerClass implements controllerActionInterface {

   

    public function execute() {
      try {
          $fields = array(
          clienteBaseTableClass::ID,
          clienteBaseTableClass::TIPO_DOCUMENTO,
          clienteBaseTableClass::NUMERO_IDENTIFICACION,
          clienteBaseTableClass::NOMBRE_CLIENTE,
          clienteBaseTableClass::APELLIDO_CLIENTE,
          clienteBaseTableClass::CELULAR_CLIENTE,
          clienteBaseTableClass::TELEFONO_CLIENTE,
          clienteBaseTableClass::CORREO_CLIENTE,
          clienteBaseTableClass::DIRECCION_CLIENTE,
          clienteBaseTableClass::FECHA_NACIMIENTO_CLIENTE,
          clienteBaseTableClass::LOCALIDAD_ID,
          clienteBaseTableClass::USUARIO_ID,
           
              
              
          );
          $this-> objcliente= clienteTableClass::getAll($fields,true);
          $this->defineView($cliente,$prestamo,session::getInstance()->getFormatOutput());
      } catch (PDOException $exc) {
          echo $exc->getMessage();
          echo'br';
          echo $exc->getTraceAsString();
      }
      
    
  }

}
