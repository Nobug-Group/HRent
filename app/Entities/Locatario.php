<?php

namespace app\Entities;
use \App\Entities\Pessoa;
/**
 * Class Locatario
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class Locatario extends Pessoa {
    public function __construct(){
        parent::__set('tipo_pessoa','Locatario');
    
    }
}