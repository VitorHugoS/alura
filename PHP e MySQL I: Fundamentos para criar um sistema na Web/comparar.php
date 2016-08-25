<?php
require_once "class/Produto.php";

$produto = new Produto();
$produto->setPreco(3.5);
$produto->setNome("A");

$produtoB = new Produto();
$produtoB->setPreco(3.5);
$produtoB->setNome("A");

if ($produto == $produtoB){
	echo "Sao iguais";
}else{
	echo "Sao diferentes";
}

echo "<br>";
if ($produto === $produtoB){
	echo "Sao iguais";
}else{
	echo "Sao diferentes";
}
echo "<br>";
echo $produto;

