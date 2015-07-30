<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;

  /**
   * Description of createCargoValidatorClass
   *
   * @author Jordan Marin
   */
  class createCargoValidatorClass extends validatorClass {

    public static function validateInsert() {
      $flag = false;

      $cargo = request::getInstance()->getPost('inputCargo');
      if (self::notBlank($cargo)) {
        $flag = true;
        session::getInstance()->setFlash('inputCargo', true);
        session::getInstance()->setError('El campo cargo es obligatorio', 'inputCargo');
      } else if (is_numeric($cargo)) {
        $flag = true;
        session::getInstance()->setFlash('inputCargo', true);
        session::getInstance()->setError('El campo no debe ser númerico', 'inputCargo');
      } else if (strlen($cargo) > \cargoTableClass::DESC_CARGO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputCargo', true);
        session::getInstance()->setError('El campo no debe de exceder el mínimo de caracteres permitidos', 'inputCargo');
      } else if(self::isUnique(\cargoTableClass::ID, true, array(\cargoTableClass::DESC_CARGO => $cargo), \cargoTableClass::getNameTable())) {
        $flag = true;
        session::getInstance()->setFlash('inputCargo', true);
        session::getInstance()->setError('Este cargo ya está creado', 'inputCargo');
      }

      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('prestamo', 'formInsertarCargo');
      }
    }

  }

}