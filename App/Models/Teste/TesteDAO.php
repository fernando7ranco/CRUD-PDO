<?php

namespace App\Models\Teste;

use App\Models\DB\DB;
use App\Models\Teste\Teste;

class TesteDAO{
	
	private $DB;
	
	public function __construct()
	{
		$this->DB = new DB;
	}
	
	public function create(Teste $teste)
	{
		$bd = $this->DB->getConexao();
		
		$sql = "INSERT INTO teste (titulo, descricao) VALUES (:titulo , :descricao)";
		
		$query = $bd->prepare($sql);
		
		$titulo = $teste->data->titulo;
		$descricao = $teste->data->descricao;
		
		$query->bindParam(':titulo', $titulo, \PDO::PARAM_STR, 100);
		$query->bindParam(':descricao', $descricao, \PDO::PARAM_STR, 300);
		
		$query->execute();
	}	
	
	public function read()
	{
		$bd = $this->DB->getConexao();
		
		$query = $bd->prepare("SELECT * FROM teste ORDER BY id DESC");
		
		$query->execute();
		
		$result = [];
		
		if($query->rowCount())
		{
			$array = $query->fetchAll(\PDO::FETCH_ASSOC);

			$result = array_map(function($value){
				return new Teste($value);
			},$array);
		}
		
		return $result;
	}
	
	public function update(Teste $teste)
	{
		$bd = $this->DB->getConexao();
		
		$sql = "UPDATE teste SET titulo = :titulo, descricao = :descricao, updated_at = NOW() WHERE id = :id"; 
		
		$query = $bd->prepare($sql);
		
		$titulo = $teste->data->titulo;
		$descricao = $teste->data->descricao;
		$id = $teste->data->id;
		
		$query->bindParam(':titulo', $titulo, \PDO::PARAM_STR, 100);
		$query->bindParam(':descricao', $descricao, \PDO::PARAM_STR, 300);
		$query->bindParam(':id', $id, \PDO::PARAM_INT, 12);
		
		$query->execute();
	}
	
	public function delete($id)
	{
		$bd = $this->DB->getConexao();
		
		$sql = "DELETE FROM teste WHERE id = :id"; 
		
		$query = $bd->prepare($sql);

		$query->bindParam(':id', $id, \PDO::PARAM_INT, 12);
		
		$query->execute();
	}
	
}