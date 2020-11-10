<?php

namespace app\Entities;



/**
 * Class GenericObj
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class GenericObj{

    private $vars;

    function __get($key) { return $this->vars[ $key ]; }
    function __set($key,$value) { $this->vars[ $key ] = $value; }
    
}