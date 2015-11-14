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
  class negocioValidatorClass extends validatorClass {

    static public function insert($nombre,$telefono, $direccion,$cliente,$INGRESO_MENSUAL) {

      $flag = false;

      if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputCliente', true);
      session::getInstance()->setError('la localidad es obligatorio', 'inputCliente');}

//        ________________________________________nombre______________________


      if (self::notBlank($nombre) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre de negocio es requerido', 'inputNombre');
      } else if (is_numeric(request::getInstance()->getPost('inputNombre'))) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del cliente no puede ser númerico', 'inputNombre');
      } elseif (strlen($nombre) > \negocioTableClass::NOMBRE_LENGTH) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del negocio no debe de ser suprior a ' . \negocioTableClass::NOMBRE_LENGTH . ' caracteres', 'inputNombre');
      }



      
      //      ______________________________________telefono_________________


      $flag = TRUE;

      if (self::notBlank($telefono) === true) {
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El número de telefono es requerido o cualquier otro número donde se le pueda contactar', 'inputTelefono');
        $flag = TRUE;
      } elseif (strlen($telefono) > \negocioTableClass::TELEFON_LENGTH) {
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \negocioTableClass::TELEFON_LENGTH. ' caracteres', 'inputTelefono');
      }



//____________________________________________direccion_____________________

      $flag = TRUE;

     
      if (self::notBlank($direccion) === true) {
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion es obligatorio  por parte de la plataforma', 'inputDireccion');
      }

      if (self::notBlank($INGRESO_MENSUAL) === true) {
        session::getInstance()->setFlash('inputIngreso_mensual', true);
        session::getInstance()->setError('el campo es obligatorio  por parte de la plataforma', 'inputIngreso_mensual');
      }

     




      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('negocio', 'negocio');
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