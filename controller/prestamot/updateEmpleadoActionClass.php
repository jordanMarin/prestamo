<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class updateEmpleadoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

         $ids=array(
            usuarioTableClass::ID => request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID,true)), 
             
             
         );
        
        
        
        
        $data = array(
            //usuarioTableClass::LAST_LOGIN_AT => date(config::getFormatTimestamp()),
            usuarioTableClass::USER => request::getInstance()->getPost('inputUsuario'),
            usuarioTableClass::PASSWORD => md5(request::getInstance()->getPost('inputPassword')),
            
        );
        
       
      $data1 = array(
           
          empleadoTableClass::NOMBRE=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOMBRE,true)),
          empleadoTableClass::APELLIDO_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELLIDO_EMPLEADO,true)),
          empleadoTableClass::DIRECCION_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION_EMPLEADO,true)),
          empleadoTableClass::TELEFONO_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO_EMPLEADO,true)),
          empleadoTableClass::MOVIL_EMPELADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::MOVIL_EMPELADO,true)),
          empleadoTableClass::CORREO_EMPLEADO=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO_EMPLEADO,true)),
          empleadoTableClass::CARGO_ID=> request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CARGO_ID,true)),
          //empleadoTableClass::USUARIO_ID=>$usuario_id
              
            
           
        );


         $ids1=array(
            empleadoTableClass::ID => request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID,true)), 
             
             
         );
       
      
      
      
        session::getInstance()->setSuccess('El empleado fue actulizado exitosamente');
        // $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
        usuarioTableClass::update($ids, $data);
        empleadoTableClass::update($ids1, $data1);
      }

      routing::getInstance()->redirect('default', 'index');
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
