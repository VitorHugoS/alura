<?php
   include "cabecalho.php";
?>
<?php include "conecta.php"; ?>
<?php include "banco-categoria.php";
include "logica-usuario.php";
if(verificaUsuario()){
	header("Location: index.php");
}
$produtos = array("nome" =>"", "descricao" =>"", "preco" =>"", "categoria_id" =>"1");
$categorias = listaCategorias($conexao);
$usado = "";
?> 

<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="post">
	<table class="table">
	<?php include("produto-formulario-base.php");?>
	<tr>
		<td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
	</tr>
	</table>
</form>
<?php
   include "rodape.php";
?>