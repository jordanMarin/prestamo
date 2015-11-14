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

    static public function insert($tipo_documento, $identificacion, $nombre, $apellido, $celular, $telefono, $correo, $direccion, $localidad) {

      $flag = false;

      if (self::notBlank($tipo_documento) === true) {
        session::getInstance()->setFlash('inputTipo_documento', true);
      session::getInstance()->setError('El campo tipo de documento es obligatorio', 'inputTipo_documento');}
//        ______________________________identificacion____________
        
        
         if (self::notBlank($identificacion) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputIdentificacion', true);
         session::getInstance()->setError('El campo identificacion  es obligatorio', 'inputIdentificacion');}
      
      
      elseif (self::isUnique(\codeudorTableClass::ID, true, array(\codeudorTableClass::IDENTIFICACION => $identificacion), \codeudorTableClass::getNameTable()) === true) {
        session::getInstance()->setFlash('inputIdentificacion', true);
        session::getInstance()->setError('El numero identificacion  ya existe en la base de datos', 'inputIdentificacion');
        $flag = true;
      }

//        ________________________________________nombre______________________


      if (self::notBlank($nombre) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre de cliente es requerido', 'inputNombre');
      } else if (is_numeric(request::getInstance()->getPost('inputNombre'))) {
        $flag = true;
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del cliente no puede ser númerico', 'inputNombre');
      } elseif (strlen($nombre) > \codeudorTableClass::NOMBRE_LENGTH) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del cliente no debe de ser suprior a ' . \codeudorTableClass::NOMBRE_LENGTH . ' caracteres', 'inputNombre');
      }


//        _____________________________________apellido____________________

      if (self::notBlank($apellido) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El apellido de cliente es requerido', 'inputApellido');
      } else if (is_numeric(request::getInstance()->getPost('inputApellido'))) {
        $flag = true;
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El apellido del cliente no puede ser númerico', 'inputApellido');
      } else if (strlen(request::getInstance()->getPost('inputApellido')) > \codeudorTableClass::APELLIDO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El cliente digitado es mayor en cantidad de caracteres a lo permitido', 'inputApellido');
      } elseif (strlen($apellido) > \codeudorTableClass::APELLIDO_LENGTH) {
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El apellido del cliente no debe de ser suprior a ' . \codeudorTableClass::APELLIDO_LENGTH . ' caracteres', 'inputApellido');
      }

      
      //      ______________________________________telefono_________________


      $flag = TRUE;

      if (self::notBlank($telefono) === true) {
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El número de telefono es requerido o cualquier otro número donde se le pueda contactar', 'inputTelefono');
        $flag = TRUE;
      } elseif (strlen($telefono) > \codeudorTableClass::TELEFONO_LENGTH) {
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \clienteTableClass::TELEFONO_LENGTH . ' caracteres', 'inputTelefono');
      }


//      ___________________________________movil_____________________
      if (self::notBlank($celular) === true) {
        $flag = TRUE;
        session::getInstance()->setFlash('inputCelular', true);
        session::getInstance()->setError('El número de celular es requerido o cualquier otro número donde se le pueda contactar', 'inputCelular');
        $flag = TRUE;
      } elseif (strlen($celular) > \codeudorTableClass::CELULAR_LENGTH) {
        session::getInstance()->setFlash('inputCelular', true);
        session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \codeudorTableClass::CELULAR_LENGTH . ' caracteres', 'inputCelular');
      }




//      ____________________________________correo___________________


      $flag = TRUE;

      if (self::notBlank($correo) === true) {
        session::getInstance()->setFlash('inputCorreo', true);
        session::getInstance()->setError('El correo es obligatorio para el contacto por parte de la plataforma', 'inputCorreo');
        $flag = TRUE;
      } elseif (strlen($correo) > \codeudorTableClass::CORREO_LENGTH) {
        session::getInstance()->setFlash('inputCorreo', true);
        session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos ' . \codeudorTableClass::CORREO_LENGTH . ' caracteres', 'inputCorreo');
      }
//____________________________________________direccion_____________________

      $flag = TRUE;

      if (self::notBlank($direccion) === true) {
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion es obligatorio  por parte de la plataforma', 'inputDireccion');
      }

      if (self::notBlank($localidad) === true) {
        session::getInstance()->setFlash('inputLocalidad', true);
      session::getInstance()->setError('la localidad es obligatorio', 'inputLocalidad');}
     




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