<?php namespace App\Controllers;

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
}