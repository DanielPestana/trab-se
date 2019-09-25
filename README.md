Trabalho - Segurança da Informação 

----- BANCO DE DADOS -----

	Nome do banco: se

Tabela usuarios:
	id 			INT			11
	nome 		VARCHAR 	100
	senha 		VARCHAR		50
	ip 			VARCHAR    	20
	permissoes 	TEXT

	Adicionar o usuário:
	INSERT INTO usuarios SET nome = 'admin' and senha = md5('admin');


Tabela documentos:
	id 			INT 		11
	titulo		VARCHAR		100	