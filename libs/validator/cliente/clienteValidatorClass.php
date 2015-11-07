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
  class clienteValidatorClass extends validatorClass {

    static public function insert($cliente) {
      $flag = false;

      if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputTipodocumento', true);
        session::getInstance()->setError('El campo tipo de documento es obligatorio', 'inputTipodocumento');
        $flag = true;
//        ______________________________identificacion____________
         if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputIdentificacion', true);
        session::getInstance()->setError('El campo identificacion  es obligatorio', 'inputIdentificacion');
        $flag = true;
         }elseif (self::isUnique(\clienteTableClass::ID, true, array(\clienteTableClass::IDENTIFICACION=> $cliente), \clienteTableClass::getNameTable()) === true) {
        session::getInstance()->setFlash('inputIdentificacion', true);
        session::getInstance()->setError('El numero identificacion  ya existe en la base de datos', 'inputIdentificacion');
        
        
//        ________________________________________nombre______________________
        
        
       
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre de cliente es requerido', 'inputUser');
      } else if (is_numeric(request::getInstance()->getPost('inputNombre'))) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del cliente no puede ser númerico', 'inputNombre');
        }elseif (strlen($cliente) > \clienteTableClass::NOMBRE_LENGTH) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del cliente no debe de ser suprior a ' . \clienteTableClass::NOMBRE_LENGTH. ' caracteres', 'inputNombre');}
        
      
//        _____________________________________apellido____________________
      
      
      $flag = true;
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El apellido de cliente es requerido', 'inputUser');
      } else if (is_numeric(request::getInstance()->getPost('inputApellido'))) {
        $flag = true;
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El apellido del cliente no puede ser númerico', 'inputApellido');
      } else if(strlen(request::getInstance()->getPost('inputApellido')) > \clienteTableClass::APELLIDO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El cliente digitado es mayor en cantidad de caracteres a lo permitido', 'inputNombre');
      } 
       elseif (strlen($cliente) > \clienteTableClass::APELLIDO_LENGTH) {
        session::getInstance()->setFlash('inputApellido', true);
      session::getInstance()->setError('El apellido del cliente no debe de ser suprior a ' . \clienteTableClass::APELLIDO_LENGTH. ' caracteres', 'inputApellido');}
      
      
      
//      ___________________________________movil_____________________
      
      $flag = TRUE;

      if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputCelular', true);
      session::getInstance()->setError('El número de celular es requerido o cualquier otro número donde se le pueda contactar', 'inputCelular');
      $flag = TRUE;
      }elseif (strlen($cliente) > \clienteTableClass::CELULAR_LENGTH) {
      session::getInstance()->setFlash('inputCelular', true);
      session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \clienteTableClass::CELULAR_LENGTH. ' caracteres', 'inputCelular');}
      
//      ______________________________________telefono_________________
      
      
       $flag = TRUE;

      if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputTelefono', true);
      session::getInstance()->setError('El número de telefono es requerido o cualquier otro número donde se le pueda contactar', 'inputTelefono');
      $flag = TRUE;
      }elseif (strlen($cliente) > \clienteTableClass::TELEFONO_LENGTH) {
      session::getInstance()->setFlash('inputTelefono', true);
      session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \clienteTableClass::TELEFONO_LENGTH. ' caracteres', 'inputTelefono');}
      
      
//      ____________________________________correo___________________
        
        
       $flag = TRUE;

      if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputCorreo', true);
      session::getInstance()->setError('El correo es obligatorio para el contacto por parte de la plataforma', 'inputCorreo');
      $flag = TRUE;
      }elseif (strlen($cliente) > \clienteTableClass::CORREO_LENGTH) {
      session::getInstance()->setFlash('inputCorreo', true);
      session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos ' . \clienteTableClass::CORREO_LENGTH. ' caracteres', 'inputCorreo');}
//____________________________________________direccion_____________________
      
      $flag = TRUE;

       if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputDireccion', true);
       session::getInstance()->setError('La direccion es obligatorio  por parte de la plataforma', 'inputDireccion');}
//    _______________________________________fecha nacimiento_______________  
       
    $flag = TRUE;

       if (self::notBlank($cliente) === true) {
        session::getInstance()->setFlash('inputFecha_nacimiento', true);
       session::getInstance()->setError('La fecha nacimiento es obligatorio  por parte de la plataforma', 'inputFecha_nacimiento');}
      
       
       
       
       if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('cliente', 'cliente');
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