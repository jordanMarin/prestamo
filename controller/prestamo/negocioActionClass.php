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
class negocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
      $fields = array(
          negocioBaseTableClass::ID,
          negocioBaseTableClass::NOMBRE_NEGOCIO,
          negocioBaseTableClass::DIRECCION_NEGOCIO,
          negocioBaseTableClass::TELEFONO_NEGOCIO,
          negocioBaseTableClass::VALOR_INGRESO_NEGOCIO,
          negocioBaseTableClass::CLIENTE_ID
      );

      $fields1 = array(
        clienteTableClass::ID,
       
      
      );

      $this->objCliente = clienteTableClass::getAll($fields1);

      $this->defineView('negocio','prestamo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}