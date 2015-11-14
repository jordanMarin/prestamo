<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\validator\codeudorValidatorClass as validate;

/**
 * Description of createCodeudorActionClass
 *
 * @author Jordan Marín <aldany29@hotmail.com>
 */
class createCodeudorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        
        $tipo_documento = request::getInstance()->getPost('inputTipo_documento');
        $identificacion = request::getInstance()->getPost('inputIdentificacion');
        $nombre = request::getInstance()->getPost('inputNombre');
        $apellido = request::getInstance()->getPost('inputApellido');
         $telefono = request::getInstance()->getPost('inputTelefono');
        $celular = request::getInstance()->getPost('inputCelular');
       
        $correo = request::getInstance()->getPost('inputCorreo');
        $direccion = request::getInstance()->getPost('inputDireccion');

        $localidad = request::getInstance()->getPost('inputLocalidad');

        validate::insert( $tipo_documento, $identificacion, $nombre, $apellido,$telefono, $celular, $correo, $direccion,$localidad);
        
        $data = array(
            codeudorTableClass::TIPO_DOCUMENTO_ID => $tipo_documento,
            codeudorTableClass::IDENTIFICACION => $identificacion,
            codeudorTableClass::NOMBRE=>$nombre,
            codeudorTableClass::APELLIDO =>$apellido, 
            codeudorTableClass::TELEFONO =>$telefono,
            codeudorTableClass::CELULAR => $correo,
            codeudorTableClass::DIRECCION =>$direccion,
            codeudorTableClass::CORREO=>$correo,  
            codeudorTableClass::LOCALIDAD_ID => $localidad,
            
            
            
            
        );
//        validate::insert($codeudor);

        codeudorTableClass::insert($data);
        session::getInstance()->setSuccess('El codeudor fue creado exitosamente');
//        $this->defineView('index', ' codeudor', session::getInstance()->getFormatOutput());
//      } else {
        //inputBarrio
       routing::getInstance()->redirect('@codeudor_listado');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}


 