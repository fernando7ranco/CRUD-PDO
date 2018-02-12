<?php

namespace App\Models\DB;

class DB{
	
	private $conexao;
	const USUARIO = 'root';
	const SENHA = '';
	const BANCO = 'pdo_teste';
	
	public function __construct()
	{
		try{
			$this->conexao = new \PDO("mysql:host=localhost;dbname=". SELF::BANCO, SELF::USUARIO, SELF::SENHA);
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
		}

	}
	
	public function getConexao()
	{
		return $this->conexao;
	}
}