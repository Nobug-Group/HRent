<?php

use CodeIgniter\Model;

/**
 * Class Pessoa
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

class LocatarioModel extends Model{

	protected $table = 'db_pessoa';
	protected $primaryKey = 'idpessoa';
    protected $returnType = '\App\Entities\Locatario';
    protected $allowedFields = [
        'nome_razao', 'tipo_pessoa','email','rg','cpf_cnpj'
	];
	
    /* public function __construct()
	{
		// initialize the database
		if (empty($this->config->databaseGroupName))
		{
			// By default, use CI's db that should be already loaded
			$this->db = \Config\Database::connect();
		}
		else
		{
			// For specific group name, open a new specific connection
			$this->db = \Config\Database::connect($this->config->databaseGroupName);
		}

		// initialize db tables data
		$this->tables = $this->config->datatabl;

		// initialize data
		$this->identityColumn = $this->config->identity;
		$this->join           = $this->config->join;

		// load the messages template from the config file
		$this->messagesTemplates = $this->config->templates['messages'];

		$this->triggerEvents('model_constructor');
    } */

	public function db()
	{
		return $this->db;
	}

}
