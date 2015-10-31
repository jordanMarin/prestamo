<?php

use mvc\component\componentClass as component;

/**
 * Description of menuComponentClass
 *
 * @author Jordan Marin
 */
class menuComponentClass extends component {
  
  public function component() {

    $this->defineView('menu', 'componente');
  }
  
}
