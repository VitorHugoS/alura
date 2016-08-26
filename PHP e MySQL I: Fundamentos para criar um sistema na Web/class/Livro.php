<?php


abstract class Livro extends Produto{
	private $isbn;

	public function getIsbn(){
		return $this->isbn;
	}
	public function setIsbn($valor){
		$this->isbn = $valor;
	}
	public function calculaImposto(){
		return parent::calculaImposto() * 2;
	}

}