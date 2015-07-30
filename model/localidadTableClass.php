<?php

use mvc\model\modelClass as model;
use mvc\config\configClass as config;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of localidadTableClass
 *
 * @author Jordan Marin
 */
class localidadTableClass extends localidadBaseTableClass {

  public static function getCiudades() {
    try {
      $sql = "SELECT
                  C . ID AS id,
                  C .nombre AS ciudad,
                  B .nombre AS departamento
              FROM
                  localidad A,
                  localidad B,
                  localidad C
              WHERE
                  A . ID = B.localidad_id
              AND B. ID = C .localidad_id
              AND A .nombre = 'Colombia'
              ORDER BY departamento, ciudad";
      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return $answer;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

}
