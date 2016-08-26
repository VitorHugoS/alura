<?php
require_once "cabecalho.php";
require_once "conecta.php";
require_once "banco-produto.php";
require_once "class/Produto.php";
require_once "class/Categoria.php";

$ProdutoDAO = new ProdutoDAO($conexao);
$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);
if(array_key_exists("usado", $_POST)):
	$usado = "true";
else:
	$usado = "false";
endif;

$produto = new Produto($_POST["nome"], $_POST["preco"], $categoria, $usado, $_POST["descricao"]);

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
