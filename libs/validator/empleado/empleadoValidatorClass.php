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
  class empleadoValidatorClass extends validatorClass {

    static public function insert($usuario, $password, $tipo_documento, $identificacion, $nombre, $apellido, $celular, $telefono, $correo, $direccion) {

      $flag = false;

      if (self::notBlank($usuario) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputUsuario', true);
        session::getInstance()->setError('El nombre de usuario es requerido', 'inputUsuario');
      } else if (is_numeric($usuario) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputUsuario', true);
        session::getInstance()->setError('El usuario no puede ser númerico', 'inputUsuario');
      } else if (strlen($usuario) > \usuarioTableClass::USER_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputUsuario', true);
        session::getInstance()->setError('El usuario digitado es mayor en cantidad de caracteres a lo permitido', 'inputUser');
      } else if (self::isUnique(\usuarioTableClass::ID, true, array(\usuarioTableClass::USER => $usuario), \usuarioTableClass::getNameTable()) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputUsuario', true);
        session::getInstance()->setError('El usuario digitado ya existe', 'inputUser');
      }



//      ___________________________________clave____________________

      if (self::notBlank($password) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputPassword', true);
        session::getInstance()->setError('El campo es obligatorio', 'inputPassword');
      }

      if (self::notBlank($tipo_documento) === true) {
        session::getInstance()->setFlash('inputTipo_documento', true);
      session::getInstance()->setError('El campo tipo de documento es obligatorio', 'inputTipo_documento');}
        
//        ______________________________identificacion____________
        
        
         if (self::notBlank($identificacion) === true) {
        $flag = true;
        session::getInstance()->setFlash('inputIdentificacion', true);
         session::getInstance()->setError('El campo identificacion  es obligatorio', 'inputIdentificacion');}
      
      
      elseif (self::isUnique(\clienteTableClass::ID, true, array(\empleadoTableClass::IDENTIFICACION=> $identificacion), \empleadoTableClass::getNameTable()) === true) {
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
      } elseif (strlen($cliente) > \empleadoTableClass::NOMBRE_LENGTH) {
        session::getInstance()->setFlash('inputNombre', true);
        session::getInstance()->setError('El nombre del cliente no debe de ser suprior a ' . \empleadoTableClass::NOMBRE_LENGTH . ' caracteres', 'inputNombre');
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
      } else if (strlen(request::getInstance()->getPost('inputApellido')) > \empleadoTableClass::APELLIDO_LENGTH) {
        $flag = true;
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El cliente digitado es mayor en cantidad de caracteres a lo permitido', 'inputApellido');
      } elseif (strlen($cliente) > \empleadoTableClass::APELLIDO_LENGTH) {
        session::getInstance()->setFlash('inputApellido', true);
        session::getInstance()->setError('El apellido del cliente no debe de ser suprior a ' . \empleadoTableClass::APELLIDO_LENGTH . ' caracteres', 'inputApellido');
      }

//____________________________________________direccion_____________________

      $flag = TRUE;

      if (self::notBlank($direccion) === true) {
        session::getInstance()->setFlash('inputDireccion', true);
        session::getInstance()->setError('La direccion es obligatorio  por parte de la plataforma', 'inputDireccion');
      }
//      ______________________________________telefono_________________


      $flag = TRUE;

      if (self::notBlank($telefono) === true) {
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El número de telefono es requerido o cualquier otro número donde se le pueda contactar', 'inputTelefono');
        $flag = TRUE;
      } elseif (strlen($celular) > \empleadoTableClass::TELEFONO_LENGTH) {
        session::getInstance()->setFlash('inputTelefono', true);
        session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \empleadoTableClass::ELEFONO_LENGTH . ' caracteres', 'inputTelefono');
      }
//      ___________________________________movil_____________________
      if (self::notBlank($celular) === true) {
        $flag = TRUE;
        session::getInstance()->setFlash('inputCelular', true);
        session::getInstance()->setError('El número de celular es requerido o cualquier otro número donde se le pueda contactar', 'inputCelular');
        $flag = TRUE;
      } elseif (strlen($cliente) > \empleadoTableClass::MOVIL_LENGTH) {
        session::getInstance()->setFlash('inputCelular', true);
        session::getInstance()->setError('El número de contacto no puede exceder el máximo de caracteres permitidos ' . \empleadoTableClass::MOVIL_LENGTH. ' caracteres', 'inputCelular');
      }




//      ____________________________________correo___________________


      $flag = TRUE;

      if (self::notBlank($correo) === true) {
        session::getInstance()->setFlash('inputCorreo', true);
        session::getInstance()->setError('El correo es obligatorio para el contacto por parte de la plataforma', 'inputCorreo');
        $flag = TRUE;
      } elseif (strlen($correo) > \empleadoTableClass::CORREO_LENGTH) {
        session::getInstance()->setFlash('inputCorreo', true);
        session::getInstance()->setError('El correo no puede exceder el máximo de caracteres permitidos ' . \empleadoTableClass::CORREO_LENGTH . ' caracteres', 'inputCorreo');
      }



      if ($flag === true) {
        //request::getInstance()->setMethod('GET');
        routing::getInstance()->forward('empleado', 'empleado');
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