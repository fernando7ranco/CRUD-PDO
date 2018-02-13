<?php

namespace App\Controllers;

use App\Models\Teste\TesteDAO;
use App\Models\Teste\Teste;

class SistemaController{
	
	public function index()
	{
		$testes = (new TesteDAO)->read();
		
		return view('home',compact('testes'));
	}
	
	public function create()
	{
		return view('form');
	}
	
	public function store()
	{
		$dados = $_POST;
		
		(new TesteDAO)->create(new Teste($dados));
		
		return 'inserido';
	}

	public function atualizar()
	{
		$dados = $_POST;
		
		(new TesteDAO)->update(new Teste($dados));
		
		return 'editado';
	}
	
	public function excluir($id)
	{
		(new TesteDAO)->delete($id);
		
		return 'deletado';
	}
}
