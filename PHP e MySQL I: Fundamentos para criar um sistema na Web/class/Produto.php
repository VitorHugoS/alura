<?php

abstract class Produto{
	
	private $id;
	private $nome;
	private $preco;
	private $categoria;
	private $descricao;
	private $usado;

	function __construct ($nome, $preco, Categoria $categoria, $usado, $descricao){
		$this->nome= $nome;
		$this->preco= $preco;
		$this->categoria= $categoria;
		$this->usado= $usado;
		$this->descricao= $descricao;
	}

	function __toString() {
		return $this->nome. "R$ ".$this->preco;
	}

	public function temIsbn(){
		return $this instanceof Livro;
	}
	
	public function precoComDesconto($valor = 0.1){
		if($valor >= 0.1 && $valor <= 0.5){
			$this->preco -= $this->preco * $valor;
			return $this->preco;		
		}else{
			return $this->preco;
		}
		
	}

	abstract function atualizaBaseadoem($param);

	public function temWaterMark(){
		return $this instanceof Ebook;
	}

	public function temTaxaImpressao(){
		return $this instanceof LivroFisico;
	}

	public function calculaImposto(){
		return $this->preco * 0.195;
	}

	//geters
	public function getPreco(){
		return $this->preco;
	}

	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getCategoria(){
		return $this->categoria;
	}
	public function getUsado(){
		return $this->usado;
	}
	public function getDescricao(){
		return $this->descricao;
	}

	//setters
	public function setId($valor){
		if ($valor>0){
			$this->id = $valor;
		}	
	}
	public function setUsado($valor){
			$this->usado = $valor;
	}


}