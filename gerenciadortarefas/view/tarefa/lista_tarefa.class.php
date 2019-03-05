<?php

class Lista_tarefa
{
	private $lista_tarefa;

	public function __construct()
	{
		require_once(dirname(__FILE__)."/../../controller/tarefa_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/tarefa.class.php");
		require_once(dirname(__FILE__)."/../../controller/usuario_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/usuario.class.php");

		$tar_controller = new Tarefa_controller();
		$this->lista_tarefa = $tar_controller->lista_tarefa_usuario_status(0);

	}

	public function draw()
	{
		echo"<div>";
			echo"<div class='btn-list-cadastrar'>";
				echo"<button id='create_tarefa' class='btn-warning btn-md btn-list-cadastrar'><span class='glyphicon glyphicon-list-alt'></span> Nova Tarefa</button>";
			echo"</div>";
			echo"<div class='table-responsive'>";
				echo"<table class='table table-striped table-hover'>";
				  	echo"<thead>";
				    echo"<tr>";
					    echo"<th>Id</th>";
					    echo"<th>Assunto</th>";
					    echo"<th>Descrição</th>";
					    echo"<th>Data e Hora de Abertura</th>";
				        echo"<th>Solicitante</th>";
					    echo"<th>Solicitado</th>";
					    echo"<th>Status da Tarefa</th>";
					    echo"<th>Ações</th>";
				    echo"</tr>";
				  	echo"</thead>";
				 	echo"<tbody>";
				  		foreach ($this->lista_tarefa as $obj)
				  		{
				  			$data_formatada = date('d/m/Y H:i:s', strtotime($obj['Data_registro']));
				  			echo"<tr>";
				  				echo"<td>".$obj['Tarefa_id']."</td>";
				  				echo"<td>".$obj['Assunto']."</td>";
				  				echo"<td>".$obj['Descricao']."</td>";
				  				echo"<td>".$data_formatada."</td>";
				  				echo"<td>".$obj['Solicitante_nome']."</td>";
				  				echo"<td>".$obj['Solicitado_nome']."</td>";
				  				echo"<td>".$obj['Status_nome']."</td>";
				  				echo"<td>";?>
				  					<span onclick="Main.load_form_tarefa(<?php echo"{$obj['Tarefa_id']}"?>);" title='Editar' style='cursor: pointer;' class='glyphicon glyphicon-edit text-warning'></span> | 
				  					<span onclick="Main.deleta_tarefa(<?php echo"{$obj['Tarefa_id']}"?>);" title='Apagar' style='cursor: pointer;' class='glyphicon glyphicon-trash text-warning'></span>
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