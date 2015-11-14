<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\negocioValidatorClass as validate;

/**
 * Description of createNegocioActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createNegocioActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {
        
          
       
        $nombre = request::getInstance()->getPost('inputNombre');
         $direccion = request::getInstance()->getPost('inputDireccion');
         $telefono = request::getInstance()->getPost('inputTelefono');
        $INGRESO_MENSUAL = request::getInstance()->getPost('inputIngreso_mensual');
        $cliente = request::getInstance()->getPost('cliente');
      
       

       

        validate::insert($nombre,$telefono,$direccion,$cliente,$INGRESO_MENSUAL);
        
   

      
      

        //validate::validateInsert();
          
        $data = array(
         
          negocioTableClass::NOMBRE=>$nombre ,
          negocioTableClass::DIRECCION=>$direccion,
          negocioTableClass::TELEFONO=>$telefono,
          negocioTableClass::INGRESO_MENSUAL=>$INGRESO_MENSUAL,
          negocioTableClass::CLIENTE_ID=>$cliente,
            
           
           
        );

        
        negocioTableClass::insert($data);
        session::getInstance()->setSuccess('El negocio fue creado exitosamente');
        // $this->defineView('cliente', 'prestamo', session::getInstance()->getFormatOutput());
//        $this->defineView('index', 'prestamo', session::getInstance()->getFormatOutput());
//      } else {
        //inputBarrio
        routing::getInstance()->redirect('negocio','negocio');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}



 