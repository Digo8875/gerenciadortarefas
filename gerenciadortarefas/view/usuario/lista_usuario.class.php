<?php

class Lista_usuario
{
	private $lista_usuario;

	public function __construct()
	{
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$usr_controller = new Usuario_controller();
		$this->lista_usuario = $usr_controller->lista_usuario(0);
	}

	public function draw()
	{
		echo"<div>";
			echo"<div class='btn-list-cadastrar'>";
				echo"<button id='create_usuario' class='btn-warning btn-md btn-list-cadastrar'><span class='glyphicon glyphicon-user'></span> Novo Usuario</button>";
			echo"</div>";
			echo"<div class='table-responsive'>";
				echo"<table class='table table-striped table-hover'>";
				  echo"<thead>";
				    echo"<tr>";
				      echo"<th>Id</th>";
				      echo"<th>Nome</th>";
				      echo"<th>Ações</th>";
				    echo"</tr>";
				  echo"</thead>";
				  echo"<tbody>";
				  		foreach ($this->lista_usuario as $obj)
				  		{
				  			echo"<tr>";
				  				echo"<td>".$obj['Id']."</td>";
				  				echo"<td id='nome'>".$obj['Nome']."</td>";
				  				echo"<td>";?>
				  					<span onclick="Main.load_form_usuario(<?php echo"{$obj['Id']}"?>);" title='Editar' style='cursor: pointer;' class='glyphicon glyphicon-edit text-warning'></span> | 
				  					<span onclick="Main.deleta_usuario(<?php echo"{$obj['Id']}"?>);" title='Apagar' style='cursor: pointer;' class='glyphicon glyphicon-trash text-warning'></span>
				  					<?php
				  				echo"</td>";
				  			echo"</tr>";
				  		}
				  echo"</tbody>";
				echo"</table>";
			echo"</div>";
		echo"</div>";
	}
}
?>