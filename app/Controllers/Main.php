<?php namespace App\Controllers;

class Main extends BaseController{

    public function index()
    {
        $dados = array(
            'title'   => 'Pagina Principal',
            'mensagem' => 'Aqui você encontra a história da empresa'
        );
        
        echo view('head',$dados);
        echo view('template');
        echo view('sidebar');
        echo view('footer');
        echo view('scripts');
    }
}