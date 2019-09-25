<?php
#CONEXAO COM O BANCO DE DADOS
try {
	$pdo = new PDO("mysql:dbname=se;host=localhost", "root", "");
} catch(PDOExeception $e) {
	echo "Falha ao conectar com o banco de dados".$e->getMassage();
} 
?>