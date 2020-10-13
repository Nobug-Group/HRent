<?php namespace App\Controllers;

class Login extends BaseController{


    public function index()
    {
        $dados = array(

            'title'   => 'Pagina Principal',
            'othercss' => ''
        );
        
        echo view('login',$dados);
    }
}