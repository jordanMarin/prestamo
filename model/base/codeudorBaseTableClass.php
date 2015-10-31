<?php
use mvc\model\table\tableBaseClass;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of codeudorBaseTableClass
 *
 * @author Jordan Marin
 */
class codeudorBaseTableClass extends tableBaseClass {
    
  protected $id;
  protected $tipo_documento;
  protected $identificacion;
  protected $nombre;
  protected $apellido;
  protected $celular;
  protected $telefono;
  protected $correo;
  protected $direccion;
  protected $fecha_nacimiento;
  protected $localidad;
  protected $actived;
  protected $created_at;
  protected $updated_at;
  protected $deleted_at;
  protected static $package;


  const ID = 'id';
  const TIPO_DOCUMENTO_ID = 'tipo_documento_id';
  const IDENTIFICACION = 'identificacion';
  const IDENTIFICACION_LENGTH = 100;
  const NOMBRE = 'nombre';
  const NOMBRE_LENGTH = 60;
  const APELLIDO = 'apellidos';
  const APELLIDO_LENGTH = 60;
  const TELEFONO = 'telefono';
  const TELEFONO_LENGTH = 15;
  const CELULAR = 'movil';
  const CELULAR_LENGTH = 12;
  const DIRECCION = 'direccion';
  const DIRECCION_LENGTH = 200;
   const CORREO = 'correo';
  const CORREO_LENGTH = 100;
  const LOCALIDAD_ID = 'localidad_id';
  const ACTIVED = 'actived';
  const CREATED_AT = 'created_at';
  const DELETED_AT = 'deleted_at';
  const UPDATED_AT = 'updated_at';

  function __construct($id, $tipo_documento, $identificacion, $nombre, $apellido, $celular, $telefono, $correo, $direccion, $localidad, $actived, $created_at, $updated_at, $deleted_at) {
    $this->id = $id;
    $this->tipo_documento = $tipo_documento;
    $this->identificacion = $identificacion;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->celular = $celular;
    $this->telefono = $telefono;
    $this->correo = $correo;
    $this->direccion = $direccion;
    $this->localidad = $localidad;
    $this->actived = $actived;
    $this->created_at = $created_at;
    $this->updated_at = $updated_at;
    $this->deleted_at = $deleted_at;
  }

  
  
    
  

  /**
   * Método para obtener el nombre del campo más la tabla ya sea en formato
   * DB (.) o en formato HTML (_)
   *
   * @param string $field Nombre del campo
   * @param string $html [optional] Por defecto traerá el nombre del campo en
   * versión DB
   * @return string
   */
  public static function getNameField($field, $html = false, $table = null) {
    return parent::getNameField($field, self::getNameTable(), $html);
  }

  /**
   * Obtiene el nombre de la tabla
   * @return string
   */
  public static function getNameTable() {
    return 'codeudor';
  }

  /**
   * Método para borrar un registro de una tabla X en la base de datos
   *
   * @param array $ids Array con los campos por posiciones
   * asociativas y los valores por valores a tener en cuenta para el borrado.
   * Ejemplo $fieldsAndValues['id'] = 1
   * @param boolean $deletedLogical [optional] Borrado lógico [por defecto] o
   * borrado físico de un registro en una tabla de la base de datos
   * @return PDOException|boolean
   */
  public static function delete($ids, $deletedLogical = true, $table = null) {
    return parent::delete($ids, $deletedLogical, self::getNameTable());
  }

  /**
   * Método para insertar en una tabla usuario
   *
   * @param array $data Array asociativo donde las claves son los nombres de
   * los campos y su valor sería el valor a insertar. Ejemplo:
   * $data['nombre'] = 'Erika'; $data['apellido'] = 'Galindo';
   * @return PDOException|boolean
   */
  public static function insert($data, $table = null) {
    return parent::insert(self::getNameTable(), $data);
  }

  /**
   * Método para leer todos los registros de una tabla
   *
   * @param array $fields Array con los nombres de los campos a solicitar
   * @param boolean $deletedLogical [optional] Indicación de borrado lógico
   * o borrado físico
   * @param array $orderBy [optional] Array con el o los nombres de los campos
   * por los cuales se ordenará la consulta
   * @param string $order [optional] Forma de ordenar la consulta
   * (por defecto NULL), pude ser ASC o DESC
   * @param integer $limit [optional] Cantidad de resultados a mostrar
   * @param integer $offset [optional] Página solicitadad sobre la cantidad
   * de datos a mostrar
   * @return mixed una instancia de una clase estandar, la cual tendrá como
   * variables publica los nombres de las columnas de la consulta o una
   * instancia de \PDOException en caso de fracaso.
   */
  public static function getAll($fields, $deletedLogical = true, $orderBy = null, $order = null, $limit = null, $offset = null, $where = null, $table = null) {
    return parent::getAll(self::getNameTable(), $fields, $deletedLogical, $orderBy, $order, $limit, $offset, $where);
  }

  /**
   * Método para actualizar un registro en una tabla de una base de datos
   *
   * @param array $ids Array asociativo con las posiciones por nombres de los
   * campos y los valores son quienes serían las llaves a buscar.
   * @param array $data Array asociativo con los datos a modificar,
   * las posiciones por nombres de las columnas con los valores por los nuevos
   * datos a escribir
   * @return PDOException|boolean
   */
  public static function update($ids, $data, $table = null) {
    return parent::update($ids, $data, self::getNameTable());
  }

}
{
    //put your code here
}
{
    //put your code here
}
{
    //put your code here
}
{
    //put your code here
}
