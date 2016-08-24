<?php

function listaProdutos($conexao){
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
	while($produto = mysqli_fetch_assoc($resultado)){
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, Produto $produto){
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{produto->$nome}',{$produto->preco}, '{$produto->descricao}', {$produto->categoria}, {$produto->usado})";
	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $nome, $preco, $descricao, $categoria, $usado, $id){
	$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria}, usado = {$usado} where id = {$id}";
	return mysqli_query($conexao, $query);

}

function removeProduto($conexao, $id){
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id){
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query); 
	return mysqli_fetch_assoc($resultado);

}

