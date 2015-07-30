<?php

namespace mvc\validator {

  use mvc\validator\validatorClass;
  use mvc\session\sessionClass as session;
  use mvc\request\requestClass as request;
  use mvc\routing\routingClass as routing;
  use mvc\config\myConfigClass as config;
  use mvc\i18n\i18nClass as i18n;

  /**
   * Description of createCargoValidatorClass
   *
   * @author Jordan Marin
   */
  class createCodeudorValidatorClass extends validatorClass {

    public static function validateInsert() {
      $flag = false;
      $codeudor = request::getInstance()->getPost('inputcodeudor ');
      if (self::notBlank($codeudor )) {
        $flag = true;
        session::getInstance()->setFlash('inputcodeudor ', true);
        session::getInstance()->setError(i18n::__(00004, null, 'errors'), 'inputcodeudor ');
      } else if (is_numeric($codeudor )) {
        $flag = true;
        session::getInstance()->setFlash('inputcodeudor ', true);
        session::getInstance()->setError('El campo no debe ser númerico', 'inputBarrio');
      } else if (strlen($barrio) > \barrioTableClass::NOMBRE_BARRIO_LENGTH){
        
       
        $flag = true;
        session::getInstance()->setFlash('inputBarrio', true);
        session::getInstance()->setError('El campo no debe de exceder el mínimo de caracteres permitidos', 'inputBarrio');
      } else if (self::isUnique(\barrioTableClass::ID,true,array(\barrioTableClass::NOMBRE_BARRIO => $barrio),\barrioTableClass::getNameTable())){
    
        $flag = true;
        session::getInstance()->setFlash('inputBarrio', true);
        session::getInstance()->setError('Este barrio ya está creado', 'inputBarrio');
      }

      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('prestamo', 'codeudor');
      }
    }

  }

}