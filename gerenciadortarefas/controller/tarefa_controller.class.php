<?php
class Tarefa_controller
{
	private $connection;
	
	public function __construct()
	{
		require_once(dirname(__FILE__)."/../restrito/connect.php");
		$this->connection = connect();
	}
	

	public function lista_tarefa($id)
	{
		if($id == 0)
		{
			$tar_q = $this->connection->prepare(" SELECT * FROM tarefa");
			$tar_q->execute();

			$t = $tar_q->fetchAll();

			return $t;
		}

		$tar_q = $this->connection->prepare(" SELECT * FROM tarefa 
												WHERE id=?");
		$tar_q->bindParam(1, $id);
		$tar_q->execute();

		$t = $tar_q->fetch();

		return $t;
	}

	public function create_edit_tarefa($tarefa)
	{
		$id = $tarefa->get_id();
		$assunto = $tarefa->get_assunto();
		$descricao = $tarefa->get_descricao();
		$data_registro = $tarefa->get_data_registro();
		$solicitante_id = $tarefa->get_usuario_solicitante();
		$solicitado_id = $tarefa->get_usuario_solicitado();
		$status_id = $tarefa->get_status();

		if($id == 0)
		{
			date_default_timezone_set('America/Sao_Paulo');
			$data = date('Y-m-d H:i:s');
		}

		$ins = $this->connection->prepare("INSERT INTO tarefa VALUES(?,?,?,?,?,?,?)");
		$ins->bindParam(1, $id);
		$ins->bindParam(2, $assunto);
		$ins->bindParam(3, $descricao);
		$ins->bindParam(4, $data);
		$ins->bindParam(5, $solicitante_id);
		$ins->bindParam(6, $solicitado_id);
		$ins->bindParam(7, $status_id);
		if(!$ins->execute())
		{
			$up = $this->connection->prepare("UPDATE tarefa SET assunto=?, descricao=?, data_registro=?, solicitante_id=?, solicitado_id=?, status_id=? 
												WHERE id=?");
			$up->bindParam(1, $assunto);
			$up->bindParam(2, $descricao);
			$up->bindParam(3, $data_registro);
			$up->bindParam(4, $solicitante_id);
			$up->bindParam(5, $solicitado_id);
			$up->bindParam(6, $status_id);
			$up->bindParam(7, $id);
			if(!$up->execute())
				return "Falha ao cadastrar/editar Tarefa!";
			else
				return "Tarefa editada.";
		}
		return "Tarefa cadastrada.";
	}

	public function deleta_tarefa($tarefa)
	{
		$id = $tarefa->get_id();
		$del = $this->connection->prepare("DELETE FROM tarefa WHERE id=?");
		$del->bindParam(1, $id);
		if($del->execute())
		{
			return "Tarefa deletada.";
		}
		else
			return "Não foi possível deletar a tarefa!";
	}

	public function lista_tarefa_usuario_status($id)
	{
		$tar_q = $this->connection->prepare(" SELECT t.Id AS Tarefa_id, t.Assunto, t.Descricao, t.Data_registro, u.Nome AS Solicitante_nome, 
												u2.Nome AS Solicitado_nome, st.Nome AS Status_nome 
												FROM tarefa t 
												INNER JOIN usuario u ON u.Id = t.Solicitante_id 
												INNER JOIN usuario u2 ON u2.Id = t.Solicitado_id 
												INNER JOIN status st ON st.Id = t.Status_id");
		$tar_q->execute();

		$t = $tar_q->fetchAll();

		return $t;
	}

}

?>