<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
/**
 * Description of listadoEmpleadoAction
 *
 * @author Jordan Marin
 */
class listadoEmpleadoActionClass extends controllerClass implements controllerActionInterface {
  //put your code here
  
  public function execute() {
    try {
      
      
      $fields=array(
          
      empleadoTableClass::NOMBRE,
      empleadoTableClass::APELLIDO_EMPLEADO  , 
      empleadoTableClass::TELEFONO_EMPLEADO  
          
        
          
      );
      
      
      
      
      
      $this->objListEmpleado = empleadoTableClass::getAll($fields);
      $this->defineView('listaEmpleado','prestamo', session::getInstance()->getFormatOutput());
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }
  
  
  
  
  
  
  
}
