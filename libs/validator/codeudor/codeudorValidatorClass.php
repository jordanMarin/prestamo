<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;
  use mvc\i18n\i18nClass as i18n;

  /**
   *
   *
   * @author Jordan Marin
   */
  class codeudorValidatorClass extends validatorClass {

    static public function insert($codeudor) {
      $flag = false;

      if (self::notBlank($codeudor) === true) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del codeudor es obligatorio', 'inputNombre');
        $flag = true;
      } elseif (strlen($codeudor) > \codeudorTableClass::NOMBRE_LENGTH) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del codeudor no debe de ser suprior a ' . \codeudorTableClass::NOMBRE_LENGTH . ' caracteres', 'inputNombre');
        $flag = true;
      } elseif (self::isUnique(\codeudorTableClass::ID, true, array(\codeudorTableClass::NOMBRE => $codeudor), \codeudorTableClass::getNameTable()) === true) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El codeudor ya existe en la base de datos', 'inputNombre');
        $flag = true;
      }

      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('codeudor', 'codeudor');
      }
    }

//   public static function validateInsert() {
//      $flag = false;
//
//
//      $banco = request::getInstance()->getPost('inputBanco');
//      if (self::notBlank($banco)) {
//        $flag = true;
//        session::getInstance()->setFlash('inputBanco', true);
//        session::getInstance()->setError(i18n::__(00004, null, 'errors'), 'inputBanco');
//      } else if (is_numeric($banco)) {
//        $flag = true;
//        session::getInstance()->setFlash('inputBanco', true);
//        session::getInstance()->setError('El campo no debe ser númerico', 'inputBanco');
//      } else if (strlen($banco) > \bancoTableClass::NOMBRE_LENGTH){
//
//
//        $flag = true;
//        session::getInstance()->setFlash('inputBanco', true);
//        session::getInstance()->setError('El campo no debe de exceder el mínimo de caracteres permitidos', 'inputBanco');
//      } else if (self::isUnique(\bancoTableClass::ID,true,array(\bancoTableClass::NOMBRE=> $banco),  \bancoTableClass::getNameTable())){
//
//        $flag = true;
//        session::getInstance()->setFlash('inputBanco', true);
//        session::getInstance()->setError('Este banco ya está creado', 'inputBarrio');
//      }
//
//
//      if ($flag === true) {
//        //request::getInstance()->setMethod('GET');
//        routing::getInstance()->forward('banco', 'banco');
//      }
//    }
  }

}