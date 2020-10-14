<?php namespace App\Controllers;

class Login extends \IonAuth\Controllers\Auth{

    public function __construct()
	{
        parent::__construct();
    }
    public function index()
    {
        $dados = array(

            'title'   => 'Pagina Principal',
            'othercss' => ''
        );
        
        echo view('Auth/login');
    }
}