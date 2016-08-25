<?php
require_once ("conecta.php");
require_once ("banco-usuarios.php");
require_once "logica-usuario.php";

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
if ($usuario == null):
	$_SESSION["danger"] = "Usuário ou senha incorretos.";
	header("Location: index.php");
else:
	logaUsuario($usuario["email"]);
	$_SESSION["success"] = "Usuário logado com sucesso.";
	header("Location: index.php");
endif
?>