<?php
class Usuario_controller
{
	private $connection;
	
	public function __construct()
	{
		require_once(dirname(__FILE__)."/../restrito/connect.php");
		$this->connection = connect();
	}
	

	public function lista_usuario($id)
	{
		if($id == 0)
		{
			$usr_q = $this->connection->prepare(" SELECT * FROM usuario");
			$usr_q->execute();

			$u = $usr_q->fetchAll();

			return $u;
		}

		$usr_q = $this->connection->prepare(" SELECT * FROM usuario 
												WHERE id=?");
		$usr_q->bindParam(1, $id);
		$usr_q->execute();

		$u = $usr_q->fetch();
		return $u;
	}

	public function create_edit_usuario($usuario)
	{
		$id = $usuario->get_id();
		$nome = $usuario->get_nome();

		$ins = $this->connection->prepare("INSERT INTO usuario VALUES(?,?)");
		$ins->bindParam(1, $id);
		$ins->bindParam(2, $nome);
		if(!$ins->execute())
		{
			$up = $this->connection->prepare("UPDATE usuario SET nome=? WHERE id=?");
			print_r($nome, $id);
			$up->bindParam(1, $nome);
			$up->bindParam(2, $id);
			if(!$up->execute())
				return "Falha ao cadastrar/editar Usuario!";
			else
				return "Usuário editado.";
		}
		return "Usuário cadastrado.";
	}

	public function deleta_usuario($usuario)
	{
		$id = $usuario->get_id();
		$del = $this->connection->prepare("DELETE FROM usuario WHERE id=?");
		$del->bindParam(1, $id);
		if($del->execute())
		{
			return "Usuário deletado";
		}
		else
			return "Não foi possível deletar o usuario!";
	}
}

?>