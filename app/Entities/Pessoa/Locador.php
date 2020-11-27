<?php

namespace app\Entities;
use \App\Entities\Pessoa;
/**
 * Class Locador
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class Locador extends Pessoa {
    public function __construct(){
        parent::__set('tipo_pessoa','Locador');
        parent::__set('status','Fisica');
    }
}