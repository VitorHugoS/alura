<?php
   require_once "cabecalho.php";
?>
<?php require_once "conecta.php"; ?>
<?php require_once "banco-categoria.php";
require_once "logica-usuario.php";
require_once "class/Categoria.php";
require_once "class/Produto.php";
if(verificaUsuario()){
	header("Location: index.php");
}
$categoria = new Categoria();
$categoria->setId(1);
$produto = new Produto("","",$categoria,"","");
$categorias = listaCategorias($conexao);
?> 

<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="post">
	<table class="table">
	<?php require_once("produto-formulario-base.php");?>
	<tr>
		<td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
	</tr>
	</table>
</form>
<?php
   require_once "rodape.php";
?>