<?php namespace App\Controllers;

class Main extends BaseController{


    public function index()
    {
        
        $dados = array(

            'title'   => 'Pagina Principal',
            'othercss' => ''
        );
        
        echo view('main',$dados);
    }
}