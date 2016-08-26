<?php
require_once "class/Categoria.php";
require_once "class/Produto.php";

class ProdutoDAO{
	
	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
	}

	function listaProdutos(){
		$produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
		while($produto_array = mysqli_fetch_assoc($resultado)){
			
			$categoria =  new Categoria();
			$categoria->nome = $produto_array["categoria_nome"];

			$produto = new Produto($produto_array["nome"], $produto_array["preco"], $categoria, $produto_array["usado"], $produto_array["descricao"]);
			$produto->setId($produto_array["id"]);

			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function __toString(){
		return "Objeto que cuida das conexoes do banco de dados!";
	}
	function insereProduto(Produto $produto){
		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->getNome()}',{$produto->getPreco()}, '{$produto->getDescricao()}', {$produto->getCategoria()}, {$produto->getUsado()})";
		return mysqli_query($this->conexao, $query);
	}

	function alteraProduto(Produto $produto){
		$query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} where id = {$produto->getId()}";
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

		$produto = new Produto($produto_buscado["nome"], $produto_buscado["preco"], $categoria, $produto_buscado["usado"], $produto_buscado["descricao"]);
		$produto->setId($produto_buscado["id"]);

	    return $produto;
	}
}