<?php

namespace App\Controllers;

use App\Models\Teste\TesteDAO;
use App\Models\Teste\Teste;

class SistemaController{
	
	public function inserir($dados)
	{
		return (new TesteDAO)->create(new Teste($dados));
	}
	
	public function selecionar()
	{
		return (new TesteDAO)->read();
	}
	
	public function atualizar($dados)
	{
		return (new TesteDAO)->update(new Teste($dados));
	}
	
	public function excluir($id)
	{
		return (new TesteDAO)->delete($id);
	}

}

$acao = @$_GET['acao'];

$SC = new SistemaController();

if($acao == 'create')
	$SC->inserir($_GET);

if($acao == 'update')
	$SC->atualizar($_GET);

if($acao == 'delete')
	$SC->excluir($_GET['id']);
	
$testes = $SC->selecionar();