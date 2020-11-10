<?php

namespace App\Controllers;

use \App\Entities\Locatario as Locatario;

class Teste extends BaseController{
    private $locatario;
    
    function imprime(){
        $this->locatario = new Locatario();
        $this->locatario->nome_razao = "teste";
        $this->locatario->email = "teste@teste.com.br";
        $this->locatario->rg = 350487772;
        $this->locatario->cpf_cnpj = 30340546892;

        var_dump($this->locatario);
    }
}
