<?php

namespace app\Entities\Pessoa;
use \App\Entities\Pessoa\Pessoa;
/**
 * Class Fiador
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class Fiador extends Pessoa {
    public function __construct(){
        parent::__set('tipo_pessoa','Fiador');
    }
}