<?php

class ProdutoFactory{
	
	private $classes = array("Ebook", "LivroFisico");

	public function criaProduto($tipoProduto, $params){
		$nome = $params["nome"];
		$preco = $params["preco"];
		$descricao = $params["descricao"];
		$categoria = new Categoria();
		$usado = $params["usado"];
		if(in_array($tipoProduto, $this->classes)){
	        return new $tipoProduto($nome, $preco, $categoria, $usado, $descricao);
	    }
	    return new LivroFisico($nome, $preco, $categoria, $usado, $descricao);
    }
}