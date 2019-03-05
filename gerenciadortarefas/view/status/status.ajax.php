<?php

$action = $_POST["action"];
$data = $_POST["data"];

switch ($action) {
	case 'load_form_status':
		if($data['id'] == 0)
		{
			echo"<div class='container'>";
				echo"<form id='form_status' method='post' action='#'>";
					echo"<h4>Cadastrar Status</h4>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='id' name='id' value='".$data['id']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				    	echo"<label for='nome'>Nome</label>";
				    	echo"<input type='text' class='form-control' id='nome' name='nome' placeholder='Digite o nome'>";
				  	echo"</div>";
				 	echo"<button type='submit' class='btn btn-primary'>Submit</button>";
				echo"</form>";
			echo"</div>";
		}
		else
		{
			require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/status.class.php");
			$stat_controller = new Status_controller();
			$stat = $stat_controller->lista_status($data['id']);

			echo"<div class='container'>";
				echo"<form id='form_status' method='post' action='#'>";
					echo"<h4>Alterar Status</h4>";
				  	echo"<div class='form-group'>";
				    	echo"<label for='nome'>Nome</label>";
				    	echo"<input type='hidden' id='id' name='id' value='".$stat['Id']."'>";
				    	echo"<input type='text' class='form-control' id='nome' name='nome' value='".$stat['Nome']."' placeholder='Digite o nome'>";
				  	echo"</div>";
				 	echo"<button type='submit' class='btn btn-primary'>Submit</button>";
				echo"</form>";
			echo"</div>";
		}

		break;

	case 'create_edit_status':
		require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/status.class.php");

		$stat_controller = new Status_controller();
		$stat = new Status($data['id']);
		$stat->set_nome($data['nome']);
		$stat_controller->create_edit_status($stat);
		
		break;

	case 'deleta_status':
		require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/status.class.php");
		
		$stat_controller = new Status_controller();
		$stat = new Status($data['id']);
		$stat_controller->deleta_status($stat);
		
		break;
	
	default:
		# code...
		break;
}

?>