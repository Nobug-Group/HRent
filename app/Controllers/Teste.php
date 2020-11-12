<?php

namespace App\Controllers;

use \App\Entities\Locatario as Locatario;
use LocatarioModel;

class Teste extends BaseController{
    private $locatario;
    
    function imprime(){
        $this->locatario = new Locatario();
        $this->locatario->nome_razao = "Bruno Garcia Lopes Higuera";
        $this->locatario->email = "bruno.gl.higuera@gmail.com";
        $this->locatario->rg = 350487772;
        $this->locatario->cpf_cnpj = 30340546892;

        $model = new LocatarioModel();
        $model->insert($this->locatario);
    }
}
