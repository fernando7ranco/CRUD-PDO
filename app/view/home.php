<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>lista</title>
	</head>
	<body>
		<?php
			foreach($data['testes'] as $teste)
			{
				echo "<h2>#{$teste->data->id} {$teste->data->titulo}</h2>";
				echo "<p>{$teste->data->descricao}</p>";
				echo "<p><small>{$teste->data->created_at}</small></p>";
			}
		?>
	</body>
</html>