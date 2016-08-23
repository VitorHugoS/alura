<?php
   include "cabecalho.php";
?>
<form action="envia-contato.php" method="post">
<table class="table">
	<tr>
		<td>Nome</td>
		<td><input class="form-control" type="text" name="nome"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input class="form-control" type="email" name="email"></td>
	</tr>
	<tr>
		<td>Observações</td>
		<td><textarea class="form-control" name="texto"></textarea></td>
	</tr>
</table>
	
</form>
<?php
   include "rodape.php";
?>