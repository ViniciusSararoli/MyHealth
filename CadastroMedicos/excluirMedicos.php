 <html>
 	<head>
 		<title>Pagina de exclusão</title>
 	</head>
 <body>
 <?php

 	/*$con=mysqli_connect("localhost", "root", "") ;

 	mysqli_select_db($con, "myhealth") or
die("Falha na seleção do banco de dados:" . mysqli_error($con) );


if(!isset($_GET["cadastroMedicos"]))
die("Página chamada de forma incorreta. Use a página de listagem para selecionar o Medico a ser excluído. Sistema Interrompido.") ;


if( (int) $_GET["cadastroMedicos"] < 1)
die("Código de Medico a ser excluído está inválido. Sistema Interrompido.") ;

$comandoSQL= "DELETE FROM cadastroMedicos WHERE codigo=" . $_GET["cadastroMedicos"];


mysqli_query($con, $comandoSQL) or die("Erro na tentativa de eliminação do Paciente código $cadastroMedicos: " . mysqli_error() ) ;

echo"Medico excluido com sucesso <hr>";*/

	$id = $_GET['c']; 


	echo "Eliminado medicos cadastrados: $id <br>";

	$url = 'localhost';
	$user = 'root';
	$senha = '';

	$con = mysqli_connect($url, $user, $senha);

	$db = 'myhealth';

	mysqli_select_db($con, $db) or 
		die ("Erro na selaçã do banco de dados" . 
			mysqli_error($sql)	);

	$sql="DELETE FROM cadastromedicos WHERE id = $id ";

	//die($sql);

	mysqli_query($con , $sql) or 
		die ("Erro na exclusão $id: " 
			. mysqli_error($con)	);

	echo "Medicos $id excluido com sucesso. <hr>";
	echo "<a href='listagemMed.php'>Listagem de medicos</a>";
?>
	<Clique <a href='listagemMed.php'>aqui</a>para listagem de pacientes.
 </body>
 </html>