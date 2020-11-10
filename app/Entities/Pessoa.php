<?php

namespace app\Entities;
use \App\Entities\GenericObj;
/**
 * Class Pessoa
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class Pessoa extends GenericObj {
    public function __construct(){
        parent::__set('tipo_pessoa',null);
    }
}