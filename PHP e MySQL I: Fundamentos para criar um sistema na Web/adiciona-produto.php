<?php
include "cabecalho.php";
include "conecta.php";
include "banco-produto.php";
include "logica-usuario.php";

verificaUsuario();
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria = $_POST["categoria_id"];
if(array_key_exists("usado", $_POST)):
	$usado = "true";
else:
	$usado = "false";
endif;
if(insereProduto($conexao, $nome, $preco, $descricao, $categoria, $usado)){
?>
	<p class="text-success">O produto <?=$nome?>, <?=$preco?> foi adicionado.</p>
<?php
}else{
$msg = mysqli_error($conexao);
?>
	<p class="text-danger">O produto <?=$nome?> não foi adicionado: <?=$msg?></p>
<?php
}
mysqli_close($conexao);
?>

<?php
   include "rodape.php";
?>
