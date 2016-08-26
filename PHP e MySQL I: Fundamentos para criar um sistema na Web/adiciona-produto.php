<?php
require_once "cabecalho.php";
require_once "conecta.php";
require_once "banco-produto.php";
require_once "logica-usuario.php";
require_once "class/Produto.php";
require_once "class/Categoria.php";
verificaUsuario();
$ProdutoDAO = new ProdutoDAO($conexao);
$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);
if(array_key_exists("usado", $_POST)):
	$usado = "true";
else:
	$usado = "false";
endif;

$produto = new Produto($_POST["nome"], $_POST["preco"], $categoria, $usado, $_POST["descricao"]);

if($ProdutoDAO->insereProduto($produto)){
?>
	<p class="text-success">O produto <?=$produto->getNome()?>, <?=$produto->getPreco()?> foi adicionado.</p>
<?php
}else{
$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?=$produto->getNome()?> não foi adicionado: <?=$msg?></p>
<?php
}
mysqli_close($conexao);
?>

<?php
   require_once "rodape.php";
?>
