<?php namespace App\Controllers;

use \App\Entities\Locador as Locador;
use PessoaModel;

class Main extends Autentica{

    public function index()
	{
		if (! $this->ionAuth->loggedIn())
		{
			// redirect them to the login page
			return redirect()->to('/Autentica/login');
		}
		else
		{
			$this->data['title'] = lang('Auth.index_heading');

			// set the flash data error message if there is one
			$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');
			//list the users
			$this->data['isadmin'] = $this->ionAuth->isAdmin();
			$this->data['logged_user'] = $this->fullname();
			//foreach ($this->data['users'] as $k => $user)
			//{
			//	$this->data['users'][$k]->groups = $this->ionAuth->getUsersGroups($user->id)->getResult();
			//}
			return $this->renderPage('main', $this->data);
		}
	}

    public function gerenciarUsuarios(){
		if (! $this->ionAuth->loggedIn())
		{
			// redirect them to the login page
			return redirect()->to('/Autentica/login');
		}
		else if (! $this->ionAuth->isAdmin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			//show_error('You must be an administrator to view this page.');
			throw new \Exception('You must be an administrator to view this page.');
		}
		else
		{
			$this->data['title'] = lang('Auth.index_heading');

			// set the flash data error message if there is one
			$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');
			//list the users
			$this->data['isadmin'] = $this->ionAuth->isAdmin();
			$this->data['logged_user'] = $this->fullname();
			$this->data['users'] = $this->ionAuth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ionAuth->getUsersGroups($user->id)->getResult();
			}
			return $this->renderPage('user_manager', $this->data);
		}
	}

	public function cadLocador(){
		if (! $this->ionAuth->loggedIn())
		{
			// redirect them to the login page
			return redirect()->to('/Autentica/login');
		}
		else
		{
			$this->data['title'] = 'Cadastro de Locador';
			$this->data['isadmin'] = $this->ionAuth->isAdmin();
			// set the flash data error message if there is one
			$this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : $this->session->getFlashdata('message');
			//list the users
			$this->data['logged_user'] = $this->fullname();
			
			return $this->renderPage('pessoa/locador', $this->data);
		}
	}
	
	public function addLocador(){
		if (! empty($_POST))
		{
			$this->locador = new Locador();
			$this->locador->nome_razao = $this->request->getPost('nome_razao');
			$this->locador->email = $this->request->getPost('email');
			$this->locador->rg = $this->request->getPost('rg');
			$this->locador->cpf_cnpj = $this->request->getPost('cpf');

			$model = new PessoaModel($this->locador);
			$model->inserirPessoa();
		}

		return redirect()->to('/Main/cadLocador');
	}
}