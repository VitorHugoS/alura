<?php


class Carro{
	
	public $Marca;
	public $Porta;
	public $Tipo;

	function exibeDadosDoCarro(Carro $carro){

		echo $carro->Marca;
		echo $carro->Porta;
		echo $carro->Tipo;
	}

}
