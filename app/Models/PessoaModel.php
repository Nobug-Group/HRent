<?php

use app\Entities\Locador;
use app\Entities\Locatario;
use app\Entities\Pessoa;
use app\Entities\Fiador;
use app\Entities\Imobiliaria;
use CodeIgniter\Model;

/**
 * Class Pessoa
 *
 * @property The HRent
 * @package  CodeIgniter-HRent
 * @author   Bruno G L Higuera bruno.gl.higuera@gmail.com
 * @license  https://opensource.org/licenses/MIT	MIT License
 */

class PessoaModel extends Model{

	protected $table = 'db_pessoa';
	protected $primaryKey = 'idpessoa';
    protected $returnType = null;
    protected $allowedFields = [
        'nome_razao', 'tipo_pessoa','email','rg','cpf_cnpj','status'
	];
	protected $pessoa = null;
	
	public function __construct($pessoa){

		if($pessoa instanceof Locatario)
			$this->returnType = '\App\Entities\Locatario';
		elseif($pessoa instanceof Locador)
			$this->returnType = '\App\Entities\Locador';
		elseif($pessoa instanceof Fiador)
			$this->returnType = '\App\Entities\Fiador';
		elseif($pessoa instanceof Imobiliaria)
			$this->returnType = '\App\Entities\Imobiliaria';
		elseif($pessoa instanceof Pessoa)
			$this->returnType = '\App\Entities\Pessoa';
		
		$this->pessoa = $pessoa;

	}

	public function inserirPessoa()
	{
		parent::insert($this->pessoa);
	}

	public function updatePessoa($id = null, $data = null): bool
	{
		return parent::update($id,$data);
	}
	

}
