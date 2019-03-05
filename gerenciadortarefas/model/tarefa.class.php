<?php

class Tarefa
{

	private $id;
	private $assunto;
	private $descricao;
	private $data_registro;
	private $usuario_solicitante;
	private $usuario_solicitado;
	private $status;

	public function __construct($id)
	{
		$this->id = $id;
		$this->assunto = array();
		$this->descricao = array();
		$this->data_registro = date_create();
		$this->usuario_solicitante;
		$this->usuario_solicitado;
		$this->status;
	}

	public function get_id()
	{
		return $this->id;
	}

	public function get_assunto()
	{
		return $this->assunto;
	}

	public function get_descricao()
	{
		return $this->descricao;
	}

	public function get_data_registro()
	{
		return $this->data_registro;
	}

	public function get_usuario_solicitante()
	{
		return $this->usuario_solicitante;
	}

	public function get_usuario_solicitado()
	{
		return $this->usuario_solicitado;
	}

	public function get_status()
	{
		return $this->status;
	}

	public function set_assunto($assunto)
	{
		$this->assunto = $assunto;
	}

	public function set_descricao($descricao)
	{
		$this->descricao = $descricao;
	}

	public function set_data_registro($data_registro)
	{
		$this->data_registro = $data_registro;
	}

	public function set_usuario_solicitante($usuario_solicitante)
	{
		$this->usuario_solicitante = $usuario_solicitante;
	}

	public function set_usuario_solicitado($usuario_solicitado)
	{
		$this->usuario_solicitado = $usuario_solicitado;
	}

	public function set_status($status)
	{
		$this->status = $status;
	}
}
?>