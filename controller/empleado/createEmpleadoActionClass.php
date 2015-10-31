<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\createClienteValidatorClass as validate;

/**
 * Description of createEmpleadoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createEmpleadoActionClass extends controllerClass implements controllerActionInterface {

 
public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        // primero hay que crear el cliente y luego si los datos!!!

        $data = array(
            //usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
            usuarioTableClass::USER => request::getInstance()->getPost('inputUsuario'),
            usuarioTableClass::PASSWORD => md5(request::getInstance()->getPost('inputPassword')),
            '__sequence' => 'usuario_id_seq'
        );
        
        $usuario_id = usuarioTableClass::insert($data);

        //validate::validateInsert();
        $data1 = array(
           empleadoTableClass::TIPO_DOCUMENTO_ID=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TIPO_DOCUMENTO_ID,true)),  
          empleadoTableClass::IDENTIFICACION=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::IDENTIFICACION,true)),
          empleadoTableClass::NOMBRE=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE,true)),
          empleadoTableClass::APELLIDO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELLIDO,true)),
          empleadoTableClass::DIRECCION=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION,true)),
          empleadoTableClass::TELEFONO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO,true)),
          empleadoTableClass::MOVIL => request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::MOVIL,true)),
          empleadoTableClass::CORREO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO,true)),
         
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




