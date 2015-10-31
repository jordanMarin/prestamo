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
           
          empleadoTableClass::NOMBRE=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE,true)),
          empleadoTableClass::APELLIDO_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELLIDO_EMPLEADO,true)),
          empleadoTableClass::DIRECCION_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION_EMPLEADO,true)),
          empleadoTableClass::TELEFONO_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO_EMPLEADO,true)),
          empleadoTableClass::MOVIL_EMPELADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::MOVIL_EMPELADO,true)),
          empleadoTableClass::CORREO_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO_EMPLEADO,true)),
          empleadoTableClass::CARGO_ID=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CARGO_ID,true)),
          empleadoTableClass::USUARIO_ID=>$usuario_id
              
            
           
        );


        empleadoTableClass::insert($data1);
        session::getInstance()->setSuccess('El empleado fue creado exitosamente');
        // $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
      } else {
        //inputBarrio
        routing::getInstance()->redirect('prestamo','createEmpleado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

