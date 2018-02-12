<?php

namespace App\Models\Teste;

class Teste {
	
	public $data;
	
	public function __construct($data = null)
	{
		$this->data = is_array($data) ? new \App\Models\MagicMethods($data) : $data;
	}
	
}