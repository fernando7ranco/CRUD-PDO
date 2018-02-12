<?php
	
	require_once( realpath("vendor/autoload.php") );
	
	require_once( realpath("App/Controllers/SistemaController.php") );
	
	echo "<ul>
		<li>insert: ?acao=create&titulo={valor}&descricao={valor}</li>
		<li>insert: ?acao=update&id={valor}&titulo={valor}&descricao={valor}</li>
		<li>insert: ?acao=delete&id={valor}</li>
	</ul>";
	
	foreach($testes as $teste)
	{
		echo "<h2>#{$teste->data->id} {$teste->data->titulo}</h2>";
		echo "<p>{$teste->data->descricao}</p>";
		echo "<p><small>{$teste->data->created_at}</small></p>";
	}