<?php require_once "cabecalho.php"; ?>
<?php require_once "conecta.php"; ?>
<?php require_once "banco-produto.php"; 
require_once "logica-usuario.php"; 
$id = $_POST["id"];
$ProdutoDAO = new ProdutoDAO($conexao);
$ProdutoDAO->removeProduto($id);
$_SESSION["success"] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die();
?>

