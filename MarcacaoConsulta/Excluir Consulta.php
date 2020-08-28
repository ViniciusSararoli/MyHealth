 <!--<html>
 	<head>
 		<title>Pagina de exclusão</title>
 	</head>
 <body> -->
 <?php

 	/*$con=mysqli_connect("localhost", "root", "") ;

 	mysqli_select_db($con, "myhealth") or
die("Falha na seleção do banco de dados:" . mysqli_error($con) );


if(!isset($_GET["cpfPaciente"]))
die("Página chamada de forma incorreta. Use a página de listagem para selecionar o Paciente a ser excluído. Sistema Interrompido.") ;


if( (int) $_GET["cpfPaciente"] < 1)
die("Código de Paciente a ser excluído está inválido. Sistema Interrompido.") ;

$comandoSQL= "DELETE FROM marcacaoConsulta WHERE codigo=" . $_GET["cpfPaciente"];


mysqli_query($con, $comandoSQL) or die("Erro na tentativa de eliminação da consulta código $cpfPaciente: " . mysqli_error() ) ;

echo"Consulta excluida com sucesso <hr>";*/

	$id = $_GET['c'];

	echo "Eliminado consultas cadastradas: $id <br>";

	$url = 'localhost';
	$user = 'root';
	$senha = '';

	$con = mysqli_connect($url, $user, $senha);

	$db = 'myhealth';

	mysqli_select_db($con, $db) or 
		die ("Erro na selação do banco de dados" . 
			mysqli_error($sql)	);

	$sql="DELETE FROM marcacaoconsulta WHERE id = $id";
	//die($sql);

	mysqli_query($con , $sql) or 
		die ("Erro na exclusão $id: " 
			. mysqli_error($con)	);

	echo "Consulta $id excluida com sucesso. <hr>";
	echo "<a href='Listagem.php'>Listagem de consultas</a>";
?>
	<!--Clique <a href='Listagem.php'>aqui</a>para listagem de consultas.
 </body>
 </html>-->