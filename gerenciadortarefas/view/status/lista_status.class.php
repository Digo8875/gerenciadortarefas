<?php

class Lista_status
{
	private $lista_status;

	public function __construct()
	{
		require_once(dirname(__FILE__)."/../../controller/status_controller.class.php");
		require_once(dirname(__FILE__)."/../../model/status.class.php");

		$stat_controller = new Status_controller();
		$this->lista_status = $stat_controller->lista_status(0);

	}

	public function draw()
	{
		echo"<div>";
			echo"<div class='btn-list-cadastrar'>";
				echo"<button id='create_status' class='btn-warning btn-md btn-list-cadastrar'><span class='glyphicon glyphicon-tag'></span> Novo Status</button>";
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
				  		foreach ($this->lista_status as $obj)
				  		{
				  			echo"<tr>";
				  				echo"<td>".$obj['Id']."</td>";
				  				echo"<td>".$obj['Nome']."</td>";
				  				echo"<td>";?>
				  					<span onclick="Main.load_form_status(<?php echo"{$obj['Id']}"?>);" title='Editar' style='cursor: pointer;' class='glyphicon glyphicon-edit text-warning'></span> | 
				  					<span onclick="Main.deleta_status(<?php echo"{$obj['Id']}"?>);" title='Apagar' style='cursor: pointer;' class='glyphicon glyphicon-trash text-warning'></span>
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