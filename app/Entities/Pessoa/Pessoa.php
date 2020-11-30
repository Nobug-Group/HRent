<?php

namespace app\Entities\Pessoa;
use CodeIgniter\Entity;

/**
 * Class Pessoa
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

Class Pessoa{

    protected $idpessoa;
    protected $nome_razao;
    protected $email;
    protected $tipo_pessoa;
    protected $rg;
    protected $cpf_cnpj;
    protected $status;
    protected $contato;
    
    public function __get($key)
    {
        if (property_exists($this, $key))
        {
            return $this->$key;
        }
    }

    public function __set($key, $value)
    {
        if (property_exists($this, $key))
        {
            $this->$key = $value;
        }
    }

    
}