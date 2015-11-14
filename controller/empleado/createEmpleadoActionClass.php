<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

use mvc\validator\empleadoValidatorClass as validate;
/**
 * Description of createEmpleadoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createEmpleadoActionClass extends controllerClass implements controllerActionInterface {

 
public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        
        
        $usuario = request::getInstance()->getPost('inputUsuario');
        $password = request::getInstance()->getPost('inputPassword');
        $tipo_documento = request::getInstance()->getPost('inputTipo_documento');
        $identificacion = request::getInstance()->getPost('inputIdentificacion');
        $nombre = request::getInstance()->getPost('inputNombre');
        $apellido = request::getInstance()->getPost('inputApellido');
        $direccion = request::getInstance()->getPost('inputDireccion');
         $telefono = request::getInstance()->getPost('inputTelefono');
        $celular = request::getInstance()->getPost('inputCelular');
       
        $correo = request::getInstance()->getPost('inputCorreo');
        
        
      

        validate::insert($usuario, $password, $tipo_documento, $identificacion, $nombre, $apellido, $celular, $telefono, $correo, $direccion);


        // primero hay que crear el cliente y luego si los datos!!!

        $data = array(
            //usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
             usuarioTableClass::USER => $usuario,
            usuarioTableClass::PASSWORD => md5($password),
            usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
            '__sequence' => 'usuario_id_seq'
        );
        
        $usuario_id = usuarioTableClass::insert($data);

        //validate::validateInsert();
        $data1 = array(
           empleadoTableClass::TIPO_DOCUMENTO_ID=>$tipo_documento ,  
          empleadoTableClass::IDENTIFICACION=>$identificacion,
          empleadoTableClass::NOMBRE=>$nombre,
          empleadoTableClass::APELLIDO=>$apellido ,
          empleadoTableClass::DIRECCION=>$direccion,
          empleadoTableClass::TELEFONO=> $telefono,
          empleadoTableClass::MOVIL =>$celular,
          empleadoTableClass::CORREO=>$correo,
         
          empleadoTableClass::USUARIO_ID=>$usuario_id
              
            
           
        );


        empleadoTableClass::insert($data1);
        session::getInstance()->setSuccess('El empleado fue creado exitosamente');
//        $this->defineView('index', 'empleado', session::getInstance()->getFormatOutput());
      } else {
        //inputBarrio
        routing::getInstance()->redirect('empleado','empleado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}




