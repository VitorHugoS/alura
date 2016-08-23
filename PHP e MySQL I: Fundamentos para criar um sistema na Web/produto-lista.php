<?php include "cabecalho.php"; ?>
<?php include "conecta.php"; ?>
<?php include "banco-produto.php"; ?>
<?php 
if(array_key_exists("removido", $_GET) && $_GET["removido"]==true) :
	?>
	<p class="alert-success">Produto apagado com sucesso!</p>
	<?php
endif
?>
<table class="table table-striped table-bordered">
<?php 
	$produtos = listaProdutos($conexao);
	foreach ($produtos as $produto) :
?>
	<tr>
		<td><?=$produto["nome"]?></td>
		<td><?=$produto["preco"]?></td>
		<td><?=substr($produto["descricao"],0,40)?></td>
		<td><?=$produto["categoria_nome"]?></td>
		<td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a></td>
		<td>
		<form action="remove-produto.php" method="post">
			<input type="hidden" name="id" value="<?=$produto['id']?>">
			<button type="submit" class="btn btn-danger">Remover</button>
		</form>
		</td>
	</tr>
<?php
	endforeach
?>
</table>

<?php include "rodape.php"; ?>