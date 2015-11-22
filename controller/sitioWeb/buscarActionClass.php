<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass as controller;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class buscarActionClass extends controller implements controllerActionInterface {

  public function execute() {
    try {
      $buscar = request::getInstance()->getPost('buscar');

      $fields = array(
          clienteTableClass::ID,
          clienteTableClass::IDENTIFICACION,
          clienteTableClass::TIPO_DOCUMENTO_ID,
          clienteTableClass::NOMBRE,
          clienteTableClass::APELLIDO,
          clienteTableClass::LOCALIDAD_ID
      );
      
      $orderBy = array(
          clienteTableClass::NOMBRE,
          clienteTableClass::APELLIDO,
          clienteTableClass::LOCALIDAD_ID
      );
      
      $where = array(
          "lower(translate(" . clienteTableClass::NOMBRE . ", 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) LIKE lower(translate('$buscar', 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) 
          OR lower(translate(" . clienteTableClass::NOMBRE . ", 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) LIKE lower(translate('$buscar%', 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) 
          OR lower(translate(" . clienteTableClass::NOMBRE . ", 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) LIKE lower(translate('%$buscar%', 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) 
          OR lower(translate(" . clienteTableClass::NOMBRE . ", 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) LIKE lower(translate('%$buscar', 'áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ', 'aeiouAEIOUaeiouAEIOU')) "
      );
      
      $clientes = clienteTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where);

      $this->defineView('buscar', 'sitioWeb', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
