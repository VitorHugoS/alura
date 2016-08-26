<?php

class LivroFisico extends Livro{
	private $taxaImpressao;

	//geters
	public function getTaxaImpressao()
	{
		return $this->taxaImpressao;
	}
	//setter
	public function setTaxaImpressao($value){
		$this->taxaImpressao = $value;
	}
	public function atualizaBaseadoem($param){
		$this->setIsbn($param["isbn"]);
		$this->setTaxaImpressao($param["taxaImpressao"]);
	}
}