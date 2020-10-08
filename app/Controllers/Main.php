<?php namespace App\Controllers;

class Main extends BaseController{

    public function index()
    {
        $dados = array(
            'title'   => 'Pagina Principal',
            'mensagem' => 'Aqui você encontra a história da empresa'
        );
        
        
        echo view('teste',$dados);
    }
}