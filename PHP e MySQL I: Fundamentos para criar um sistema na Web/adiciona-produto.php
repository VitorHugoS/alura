<?php
include "cabecalho.php";
include "conecta.php";
include "banco-produto.php";
include "logica-usuario.php";
include "class/Produto.php";

verificaUsuario();
$produto = new Produto();
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];
$produto->categoria = $_POST["categoria_id"];
if(array_key_exists("usado", $_POST)):
	$produto->usado = "true";
else:
	$produto->usado = "false";
endif;

if(insereProduto($produto)){
?>
	<p class="text-success">O produto <?=$produto->nome?>, <?=$produto->preco?> foi adicionado.</p>
<?php
}else{
$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?=$produto->nome?> não foi adicionado: <?=$msg?></p>
<?php
}
mysqli_close($conexao);
?>

<?php
   include "rodape.php";
?>
