<?php
class Status_controller
{
	private $connection;
	
	public function __construct()
	{
		require_once(dirname(__FILE__)."/../restrito/connect.php");
		$this->connection = connect();
	}
	

	public function lista_status($id)
	{
		if($id == 0)
		{
			$stat_q = $this->connection->prepare(" SELECT * FROM status");
			$stat_q->execute();

			$s = $stat_q->fetchAll();

			return $s;
		}

		$stat_q = $this->connection->prepare(" SELECT * FROM status 
												WHERE id=?");
		$stat_q->bindParam(1, $id);
		$stat_q->execute();

		$s = $stat_q->fetch();

		return $s;
	}

	public function create_edit_status($status)
	{
		$id = $status->get_id();
		$nome = $status->get_nome();
		
		$ins = $this->connection->prepare("INSERT INTO status VALUES(?,?)");
		$ins->bindParam(1, $id);
		$ins->bindParam(2, $nome);
		if(!$ins->execute())
		{
			$up = $this->connection->prepare("UPDATE status SET nome=? WHERE id=?");
			$up->bindParam(1, $nome);
			$up->bindParam(2, $id);
			if(!$up->execute())
				return "Falha ao cadastrar/editar Status!";
			else
				return "Status editado.";
		}
		return "Status cadastrado.";
	}

	public function deleta_status($status)
	{
		$id = $status->get_id();
		$del = $this->connection->prepare("DELETE FROM status WHERE id=?");
		$del->bindParam(1, $id);
		if($del->execute())
		{
			return "Status deletado";
		}
		else
			return "Não foi possível deletar o status!";
	}
}

?>