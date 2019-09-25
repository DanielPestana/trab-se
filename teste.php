if(isset($_POST['email']) && empty($_POST['email']) == false){
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	try {
	$pdo = new PDO("mysql:dbname=usuarios;host=localhost", "root", "");

	$sql = $pdo->query("SELECT * FROM usuarios WHERE email = $email AND senha = $senha");

	if($sql->rowCount() > 0) {
		$usuario = $sql->fetch();
		$_SESSION['id'] = $usuario['id'];
		header("Location: index.php");
	}

	} catch (PDOExeception $e) {
	echo "Falha ao conectar com o banco de dados"->getMassage();
	} 

}