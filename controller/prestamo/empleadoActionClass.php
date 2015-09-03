<?php
use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;


/**
 * Description of empleadoActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class empleadoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
//      $fields = array(
//          empleadoBaseTableClass::ID,
//          empleadoBaseTableClass::NOMBRE,
//          empleadoBaseTableClass::APELLIDO_EMPLEADO,
//          empleadoBaseTableClass::DIRECCION_EMPLEADO,
//          empleadoBaseTableClass::TELEFONO_EMPLEADO,
//          empleadoBaseTableClass::MOVIL_EMPELADO,
//          empleadoBaseTableClass::CORREO_EMPLEADO,
//          empleadoBaseTableClass::USUARIO_ID,
//              
//            );
//      
//      
      $fields1 = array(
      cargoTableClass::ID,
      cargoTableClass::DESC_CARGO,
      
        
      );
//      
//      $fields3 = array(
//      usuarioTableClass::ID,
//      usuarioTableClass::PASSWORD,
//      usuarioTableClass::LAST_LOGIN_AT   
//      
//      );
           $this->objCargo = cargoTableClass::getAll($fields1);
//      $this->objUsuario=  usuarioTableClass::getAll($fields3);
      $this->defineView('formEmpleado','prestamo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}
