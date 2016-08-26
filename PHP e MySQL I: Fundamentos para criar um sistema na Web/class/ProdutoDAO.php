<?php


class ProdutoDAO{
	
	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function listaProdutos(){
		$produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
		while($produto_array = mysqli_fetch_assoc($resultado)){
			
			$factory = new ProdutoFactory();
			$produto = $factory->criaProduto($produto_array["tipoProduto"], $produto_array);
			$produto->atualizaBaseadoem($produto_array);
			$produto->getCategoria()->setNome($produto_array["categoria_nome"]);
			$produto->setId($produto_array["id"]);

			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function __toString(){
		return "Objeto que cuida das conexoes do banco de dados!";
	}
	function insereProduto(Produto $produto){
		$isbn = "";
		if($produto->temIsbn()){
			$isbn = $produto->getIsbn();
		}

		$waterMark = "";
		if($produto->temWaterMark()){
			$waterMark = $produto->getWaterMark();
		}

		$TaxaImpressao = "";
		if($produto->temTaxaImpressao()){
			$TaxaImpressao = $produto->getTaxaImpressao();
		}

		$tipoProduto = get_class($produto);
		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado, tipoProduto, isbn, waterMark, taxaImpressao) values ('{$produto->getNome()}',{$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()->getId()}, '{$produto->getUsado()}, '{$tipoProduto}', '{$isbn}', '{$waterMark}', '{$TaxaImpressao}')";
		return mysqli_query($this->conexao, $query);
	}

	function alteraProduto(Produto $produto){
		$isbn = "";
		if($produto->temIsbn()){
			$isbn = $produto->getIsbn();
		}

		$waterMark = "";
		if($produto->temWaterMark()){
			$waterMark = $produto->getWaterMark();
		}

		$TaxaImpressao = "";
		if($produto->temTaxaImpressao()){
			$TaxaImpressao = $produto->getTaxaImpressao();
		}
		$query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()}, isbn = '{$isbn}', waterMark = '{$waterMark}', taxaImpressao = '{$TaxaImpressao}' where id = {$produto->getId()}";
		return mysqli_query($this->conexao, $query);

	}

	function removeProduto($id){
		$query = "delete from produtos where id = {$id}";
		return mysqli_query($this->conexao, $query);
	}

	function buscaProduto($id) {

	    $query = "select * from produtos where id = {$id}";
	    $resultado = mysqli_query($this->conexao, $query);
	    $produto_buscado = mysqli_fetch_assoc($resultado);

	    $categoria =  new Categoria();
		$categoria->id = $produto_buscado["categoria_id"];
		$factory = new ProdutoFactory();
		$produto = $factory->criaProduto($produto_buscado["tipoProduto"], $produto_buscado);
		$produto->atualizaBaseadoem($produto_buscado);
		$produto->getCategoria()->setId($produto_buscado["categoria_nome"]);
		$produto->setId($produto_buscado["id"]);
	    return $produto;
	}
}