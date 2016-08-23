<?php
include "cabecalho.php";
include "conecta.php";
include "banco-produto.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria_id"];
if(array_key_exists("usado", $_POST)){
	$usado = "true";
}else{
	$usado = "false";
}
if(alteraProduto($conexao, $nome, $preco, $descricao, $categoria, $usado, $id)){
?>
	<p class="text-success">O produto <?=$nome?>, <?=$preco?> foi alterado.</p>
<?php
}else{
$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?=$nome?> não foi alterado: <?=$msg?></p>
<?php
}
mysqli_close($conexao);
?>

<?php
   include "rodape.php";
?>
