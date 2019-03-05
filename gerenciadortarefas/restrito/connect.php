<?php

function connect()
{
	$connection = new PDO("mysql:host=localhost;dbname=gerenciadortarefas", 'gerenciadortarefas', 'gerenciadortarefas');
	return $connection;
}

?>