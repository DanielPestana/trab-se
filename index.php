<?php 
session_start();
require 'config.php';
require 'usuarios.class.php';
require 'documentos.class.php';

#Verifica se existe uma sessao logada
if(isset($_SESSION['logado']) && empty($_SESSION['logado']) == false) {
	echo "";
} else {
	header("Location: login.php");
}

$usuarios = new Usuarios($pdo);
$usuarios->setUsuario($_SESSION['logado']);
$usuarios->getPermissoes($_SESSION['logado']);

$documentos = new Documentos($pdo);
$lista = $documentos->getDocumentos();
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
			
			<h2>Segurança da Informação - Área Restrita</h2>
			<hr>

			<?php if($usuarios->temPermissao('ADD')): ?>
				<a href="">Adicionar Documento</a>
			<?php endif; ?>

			<table border="1" width="100%">
				<tr>
					<th>Nome do Arquivo</th>
					<th>Ações</th>
				</tr>
				<?php foreach($lista as $item): ?>
				<tr>
					<td><?php echo utf8_encode($item['titulo']); ?></td>
					<td>
						<?php if($usuarios->temPermissao('EDIT')): ?>
							<a href="">Editar</a>
						<?php endif; ?>
						<?php if($usuarios->temPermissao('DEL')): ?>
							<a href="">Excluir</a>
						<?php endif; ?>

					</td>
				</tr>
			<?php endforeach?>
			</table>

		</div>
	</header>


</body>
</html>