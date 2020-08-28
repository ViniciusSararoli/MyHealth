<?php	// salvar como excluirConsulta.php

	$codCadastro = $_GET['c'];
	echo "Vou excluir a Consulta $codCadastro <br>";

	// 1 - conectar no MYSQL
	$con = mysqli_connect("localhost","root","");

	// 2 - abrir / selecionar o banco
	$db = "myhealth";
	mysqli_select_db($con , $db) or 
		die("Erro na abertura do banco $db: " .
			mysqli_error($con) );
	
	//	3 - criar a variável com o comando de deleção
	$sql = "DELETE FROM cadconsulta WHERE codCadastro=$codCadastro";
	
	// Mostrando o comando na tela p/testar
	//die($sql);
	
	// 4 - enviar a variável de comando para o MYSQL
	mysqli_query($con, $sql) or 
		die("Erro na eliminação da Consulta 
			código $codCadastro: " . 
				mysqli_error($con) );
				
	// 5 - Se chegou até aqui - deletou :)
	echo "Registro $codCadastro eliminado c/sucesso<hr>";
	echo "<a href='CadAgenda2.php'>Listagem de Consultas</a>";
	
?>