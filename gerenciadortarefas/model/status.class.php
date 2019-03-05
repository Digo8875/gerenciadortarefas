<?php

class Status
{

	private $id;
	private $nome;

	public function __construct($id)
	{
		$this->id = $id;
		$this->nome = array();
	}

	public function get_id()
	{
		return $this->id;
	}

	public function get_nome()
	{
		return $this->nome;
	}

	public function set_nome($nome)
	{
		$this->nome = $nome;
	}
}
?>