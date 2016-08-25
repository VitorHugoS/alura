<?php

class Categoria{
	
	public $id;
	public $nome;

	public function setId($valor){
		$this->id = $valor;
	}
	public function getId(){
		return $this->id;
	}

	public function setNome($valor){
		$this->nome = $valor;
	}
	public function getNome(){
		return $this->nome;
	}
	
}