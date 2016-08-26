<?php

class Ebook extends Livro{
	private $waterMark;

	//geters
	public function getwaterMark()
	{
		return $this->waterMark;
	}

	//setters
	public function setwaterMark($mark)
	{
		$this->isbn = $mark;
	}
	public function atualizaBaseadoem($param){
		$this->setIsbn($param["isbn"]);
		$this->setWaterMark($param["waterMark"]);
	}

}