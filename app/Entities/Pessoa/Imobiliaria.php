<?php

namespace app\Entities\Pessoa;
use \App\Entities\Pessoa\Pessoa;
/**
 * Class Imobiliaria
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class Imobiliaria extends Pessoa {
    public function __construct(){
        parent::__set('tipo_pessoa','Imobiliaria');
    }
}