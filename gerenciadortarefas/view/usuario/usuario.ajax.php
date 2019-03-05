<?php

$action = $_POST["action"];
$data = $_POST["data"];

switch ($action) {
	case 'load_form_usuario':
		if($data['id'] == 0)
		{
			echo"<div class='container'>";
				echo"<form id='form_usuario' method='post' action='#'>";
					echo"<h4>Cadastrar Usuário</h4>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='id' name='id' value='".$data['id']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				    	echo"<label for='nome'>Nome</label>";
				    	echo"<input type='text' class='form-control' id='nome' name='nome' placeholder='Digite o nome'>";
				  	echo"</div>";
				 	echo"<button type='submit' class='btn btn-primary'>Cadastrar</button>";
				echo"</form>";
			echo"</div>";
		}
		else
		{
			require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/usuario.class.php");
			$usr_controller = new Usuario_controller();
			$usr = $usr_controller->lista_usuario($data['id']);

			echo"<div class='container'>";
				echo"<form id='form_usuario' method='post' action='#'>";
					echo"<h4>Alterar Usuário</h4>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='id' name='id' value='".$usr['Id']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				    	echo"<label for='nome'>Nome</label>";
				    	echo"<input type='text' class='form-control' id='nome' name='nome' value='".$usr['Nome']."' placeholder='Digite o nome'>";
				  	echo"</div>";
				 	echo"<button type='submit' class='btn btn-primary'>Atualizar</button>";
				echo"</form>";
			echo"</div>";
		}

		break;

	case 'create_edit_usuario':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$usr_controller = new Usuario_controller();
		$usr = new Usuario($data['id']);
		$usr->set_nome($data['nome']);
		$usr_controller->create_edit_usuario($usr);
		
		break;

	case 'deleta_usuario':
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");
		
		$usr_controller = new Usuario_controller();
		$usr = new Usuario($data['id']);
		$usr_controller->deleta_usuario($usr);
		
		break;
	
	default:
		# code...
		break;
}

?>