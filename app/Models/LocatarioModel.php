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
    protected $db;

    public function __construct()
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
		$this->tables = $this->config->tables;

		// initialize data
		$this->identityColumn = $this->config->identity;
		$this->join           = $this->config->join;

		// initialize hash method options (Bcrypt)
		$this->hashMethod = $this->config->hashMethod;

		// load the messages template from the config file
		$this->messagesTemplates = $this->config->templates['messages'];

		// initialize our hooks object
		$this->ionHooks = new \stdClass();

		$this->triggerEvents('model_constructor');
    }
    
    public function salvarLocatario(){

    }

    public function db()
	{
		return $this->db;
	}

}
