<?php
   include "cabecalho.php";
?>
<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="get">
	Nome: <input type="text" name="nome">
	Preço: <input type="number" name="preco">
	<input type="submit" name="Enviar">
</form>
<?php
   include "rodape.php";
?>