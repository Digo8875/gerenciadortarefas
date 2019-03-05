<?php

$action = $_POST["action"];
$data = $_POST["data"];

switch ($action) {
	case 'load_form_tarefa':
		if($data['id'] == 0)
		{
			require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/usuario.class.php");
			require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/status.class.php");

			$stat_controller = new Status_controller();
			$lista_status = $stat_controller->lista_status(0);

			$usr_controller = new Usuario_controller();
			$lista_usuario = $usr_controller->lista_usuario(0);

			echo"<div class='container'>";
				echo"<form id='form_tarefa' method='post' action='#'>";
					echo"<h4>Cadastrar Tarefa</h4>";
				  	echo"<div class='form-group'>";
				    	echo"<input type='hidden' id='id' name='id' value='".$data['id']."'>";
				    echo"</div>";
				    echo"<div class='form-group'>";
				    	echo"<label for='nome'>Assunto</label>";
				    	echo"<input type='text' class='form-control' id='assunto' name='assunto' value='' placeholder='Assunto'>";
				    echo"</div>";
				    echo"<div class='form-group'>";
				    	echo"<label for='nome'>Descriçao</label>";
				    	echo"<input type='text' class='form-control' id='descricao' name='descricao' value='' placeholder='Descrição'>";
				    echo"</div>";
				    echo"<div class='form-group'>";
				    	echo"<input type='hidden' id='data_registro' name='data_registro' value=''>";
				    echo"</div>";
				  	echo"<div class='form-group'>";
					    echo"<label for='solicitante'>Selecione o Solicitante</label>";
					    echo"<select class='form-control' id='solicitante' name='solicitante'>";
					    	foreach ($lista_usuario as $obj)
				  			{
					      		echo"<option value='".$obj['Id']."'>".$obj['Nome']."</option>";
					      	}
					    echo"</select>";
					echo" </div>";
					echo"<div class='form-group'>";
					    echo"<label for='solicitado'>Selecione o Solicitado</label>";
					    echo"<select class='form-control' id='solicitado' name='solicitado'>";
					      	foreach ($lista_usuario as $obj)
				  			{
					      		echo"<option value='".$obj['Id']."'>".$obj['Nome']."</option>";
					      	}
					    echo"</select>";
					echo" </div>";
					echo"<div class='form-group'>";
					    echo"<label for='status'>Selecione o Status</label>";
					    echo"<select class='form-control' id='status' name='status'>";
					      	foreach($lista_status as $obj)
				  			{
					      		echo"<option value='".$obj['Id']."'>".$obj['Nome']."</option>";
					      	}
					    echo"</select>";
					echo" </div>";
					echo"<div class='form-group'>";
				    	echo"<input type='hidden' id='status' name='status' value=''>";
				    echo"</div>";
				 	echo"<button type='submit' class='btn btn-primary'>Submit</button>";
				echo"</form>";
			echo"</div>";
		}
		else
		{
			require_once(dirname(__FILE__)."/../../controller/tarefa_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/tarefa.class.php");
			require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/usuario.class.php");
			require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
			require_once(dirname(__FILE__)."/../../model/status.class.php");

			$usr_controller = new Usuario_controller();
			$lista_usuario = $usr_controller->lista_usuario(0);

			$stat_controller = new Status_controller();
			$lista_status = $stat_controller->lista_status(0);

			$tar_controller = new Tarefa_controller();
			$tar = $tar_controller->lista_tarefa($data['id']);

			$usr_controller = new Usuario_controller();
			$usr_solicitante = $usr_controller->lista_usuario($tar['Solicitante_id']);
			$usr_solicitado = $usr_controller->lista_usuario($tar['Solicitado_id']);

			echo"<div class='container'>";
				echo"<form id='form_tarefa' method='post' action='#'>";
					echo"<h4>Alterar Tarefa</h4>";
				  	echo"<div class='form-group'>";
				  		echo"<input type='hidden' id='id' name='id' value='".$tar['Id']."'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				    	echo"<label for='nome'>Assunto</label>";
				    	echo"<input type='text' class='form-control' id='assunto' name='assunto' value='".$tar['Assunto']."' placeholder='Assunto'>";
				    echo"</div>";
				    echo"<div class='form-group'>";
				    	echo"<label for='nome'>Descrição</label>";
				    	echo"<input type='text' class='form-control' id='descricao' name='descricao' value='".$tar['Descricao']."' placeholder='Descrição'>";
				  	echo"</div>";
				  	echo"<div class='form-group'>";
				    	echo"<label for='data_registro'>Data de Registro</label>";
				    	echo"<input type='datetime' class='form-control' id='data_registro' name='data_registro' value='".$tar['Data_registro']."'>";
				  	echo"</div>";
				  	echo"<div>";
					    echo"<label for='solicitante'>Selecione o Solicitante</label>";
					    echo"<select class='form-control' id='solicitante' name='solicitante'>";
					    	foreach ($lista_usuario as $obj)
				  			{
					      		if($obj['Id'] == $tar['Solicitante_id'])
					      			echo"<option value='".$obj['Id']."' selected>".$obj['Nome']."</option>";
					      		else
					      			echo"<option value='".$obj['Id']."'>".$obj['Nome']."</option>";
					      	}
					    echo"</select>";
					echo" </div>";
					echo"<div class='form-group'>";
					    echo"<label for='solicitado'>Selecione o Solicitado</label>";
					    echo"<select class='form-control' id='solicitado' name='solicitado'>";
					      	foreach ($lista_usuario as $obj)
				  			{
					      		if($obj['Id'] == $tar['Solicitado_id'])
					      			echo"<option value='".$obj['Id']."' selected>".$obj['Nome']."</option>";
					      		else
					      			echo"<option value='".$obj['Id']."'>".$obj['Nome']."</option>";
					      	}
					    echo"</select>";
					echo" </div>";
					echo"<div class='form-group'>";
					    echo"<label for='status'>Selecione o Status</label>";
					    echo"<select class='form-control' id='status'>";
					    	foreach($lista_status as $obj)
				  			{
				  				if($obj['Id'] == $tar['Status_id'])
					      			echo"<option value='".$obj['Id']."' selected>".$obj['Nome']."</option>";
					      		else
					      			echo"<option value='".$obj['Id']."'>".$obj['Nome']."</option>";
					      	}
					    echo"</select>";
					echo"</div>";
				 	echo"<button type='submit' class='btn btn-primary'>Submit</button>";
				echo"</form>";
			echo"</div>";
		}

		break;

	case 'create_edit_tarefa':
	print_r($data);
		require_once(dirname(__FILE__)."/../../controller/tarefa_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/tarefa.class.php");
		require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/status.class.php");

		$stat_controller = new Status_controller();
		$lista_status = $stat_controller->lista_status(0);

		$tar_controller = new Tarefa_controller();
		$tar = new Tarefa($data['id']);
		$tar->set_assunto($data['assunto']);
		$tar->set_descricao($data['assunto']);
		$tar->set_data_registro($data['data_registro']);
		$tar->set_usuario_solicitante($data['usuario_solicitante']);
		$tar->set_usuario_solicitado($data['usuario_solicitado']);
		$tar->set_status($data['status']);

		$tar_controller->create_edit_tarefa($tar);
		
		break;

	case 'deleta_tarefa':
		require_once(dirname(__FILE__)."/../../controller/tarefa_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/tarefa.class.php");
		
		$tar_controller = new Tarefa_controller();
		$tar = new Tarefa($data['id']);
		$tar_controller->deleta_tarefa($tar);
		
		break;
	
	default:
		# code...
		break;
}

?>