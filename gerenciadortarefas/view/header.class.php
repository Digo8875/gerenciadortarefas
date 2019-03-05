<?php

class Header
{

	public function __construct()
	{


	}

	public function draw()
	{
		echo"<div class='header' id='div_header'>";
			echo"<div>";
				echo"<h1>Gerenciador de tarefas</h1>";
			echo"</div rounded>";
			echo"<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
			  echo"<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>";
			    echo"<span class='navbar-toggler-icon'></span>";
			  echo"</button>";
			  echo"<div class='collapse navbar-collapse' id='navbarNav'>";
			    echo"<ul class='navbar-nav'>";
			      echo"<li class='nav-item active'>";
			        echo"<a class='btn btn-md btn-primary' href='/gerenciadortarefas/index.php' role='button'>Home</a>";
			      echo"</li>";
			      echo"<li class='nav-item'>";
			        echo"<a class='btn btn-md btn-primary' href='/gerenciadortarefas/view/usuario/index.php' role='button'>Usuários</a>";
			      echo"</li>";
			      echo"<li class='nav-item'>";
			        echo"<a class='btn btn-md btn-primary' href='/gerenciadortarefas/view/tarefa/index.php' role='button'>Tarefas</a>";
			      echo"</li>";
			      echo"<li class='nav-item'>";
			        echo"<a class='btn btn-md btn-primary' href='/gerenciadortarefas/view/status/index.php' role='button'>Status de Tarefas</a>";
			      echo"</li>";
			    echo"</ul>";
			  echo"</div>";
			echo"</nav>";
		echo"</div>";
	}
}
?>