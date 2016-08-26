<?php
require_once "cabecalho.php";
require_once "conecta.php";
require_once "banco-produto.php";
require_once "class/Produto.php";
require_once "class/Categoria.php";

$ProdutoDAO = new ProdutoDAO($conexao);
$categoria = new Categoria();

if(array_key_exists("tipoProduto", $_POST)):
	$tipoProduto = $_POST["tipoProduto"];
else:
	$tipoProduto = "Produto";
endif;

$factory = new ProdutoFactory();
$produto = $factory->criaProduto($tipoProduto, $_POST);
$produto->atualizaBaseadoem($_POST);
$produto->getCategoria()->setId($_POST["categoria_id"]);
$produto->setId($_POST["id"]);
if(array_key_exists("usado", $_POST)){
	$produto->setUsado("true");
}else{
	$produto->setUsado("false");
}

if($ProdutoDAO->alteraProduto($produto)){
?>
	<p class="text-success">O produto <?=$produto->nome?>, <?=$produto->preco?> foi alterado.</p>
<?php
}else{
$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?=$produto->nome?> não foi alterado: <?=$msg?></p>
<?php
}
mysqli_close($conexao);
?>

<?php
   require_once "rodape.php";
?>
