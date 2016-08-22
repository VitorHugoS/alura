<?php
include "cabecalho.php";
$nome = $_GET["nome"];
$preco = $_GET["preco"];
$conexao = mysqli_connect("localhost", "root", "", "loja");
$query = "insert into produtos (nome, preco) values ('{$nome}',{$preco})";
if(mysqli_query($conexao, $query)){
?>
	<p class="alert-success">O produto <?=$nome?>, <?=$preco?> foi adicionado.</p>
<?php
}else{
?>
	<p class="alert-danger">O produto <?=$nome?> não foi adicionado.</p>
<?php
}
mysqli_close($conexao);
?>

<?php
   include "rodape.php";
?>
