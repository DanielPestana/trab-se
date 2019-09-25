<?php

session_start();
require 'config.php';
require 'usuarios.class.php';


if(isset($_POST['nome']) && !empty($_POST['nome'])){

	$nome = addslashes($_POST['nome']);
	$senha = md5(addslashes($_POST['senha']));

	$usuario = new Usuarios($pdo);

	if($usuario->fazerLogin($nome, $senha)) {
		header("Location: index.php");
		exit;
	} else {
		echo "Usuário e/ou senha estão errados!";
	}
}


/*
#SE A VARIAVEL POST ESTIVER SETADA E NAO VAZIA
if(isset($_POST['nome']) && !empty($_POST['nome'])){
	
	$nome = addslashes($_POST['nome']);
	$senha = md5(addslashes($_POST['senha']));

	try {
	$pdo = new PDO("mysql:dbname=se;host=localhost", "root", "");

	$sql = "SELECT * FROM usuarios WHERE nome = :nome AND senha = :senha";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':senha', $senha);
	$sql->execute();

	if($sql->rowCount() > 0) {
		$usuario = $sql->fetch();
		$_SESSION['id'] = $usuario['id'];
		header("Location: index.php");
	} else {
		echo "Senha inválida";
	}
	} catch (PDOExeception $e) {
	echo "Falha ao conectar com o banco de dados".$e->getMassage();
	} 

} 
*/

?>
<html>
<head>
	<title>Segurança da Informação</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=0">

	<link rel="stylesheet" type="text/css" href="template.css">
</head>
<body>
	

	<header>
		<div class="top">
			
			<h2>Segurança da Informação - Página de Login</h2>
			<hr>

		</div>

		<div class="login">
			<form method="POST">
				Nome: <br>
				<input type="text" name="nome"><br><br>

				Senha:<br>
				<input type="password" name="senha"><br><br>

				<input type="submit" value="Logar">
			</form>
		</div>
	</header>


</body>
</html>