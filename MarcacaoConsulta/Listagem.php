<html>
	<head>
		<title>Lista de pacientes</title>
</head>
	<body>
<?php
	$con = mysqli_connect('localhost' , 'root' , '');

	/*$resultado =*/ mysqli_select_db($con , 'myhealth') or die ("Erro na seleção do banco de dados." . mysqli_error($con) );

	 $comandoSQL = "SELECT * FROM marcacaoconsulta";
	//echo $comandoSQL;
	//die($sql);

	$registros = mysqli_query($con , $comandoSQL) or die ("Erro na coleção dos dados." . mysqli_error($con) );

	$linhas = mysqli_num_rows($registros);

	if ($linhas < 1)
	
		die ("Lista de marcação de consulta está vazio.");
	
	//echo "Registros: $linhas<br>"
	
	$contador = 0;

	echo "<table border = '1'>";
	echo "	<tr>";
	echo "		<th>ID</th>";
	echo "		<th>Nome paciente</th>";
	echo "		<th>CPF</th>";
	echo "		<th>especialidade</th>";
	echo "		<th>Profissional</th>";
	echo "		<th>data</th>";
	echo "		<th>hora</th>";
	echo "		<th>e-mail</th>";
	echo "		<th>Telefone</th>";
	echo "		<th>Telefone</th>";
	echo "		<th>Observações</th>";
	echo "		<th colspan='2'>Observações</th>";
	echo "	</tr>"; 

	while ($contador < $linhas)
		{	
	$dados = mysqli_fetch_array($registros);
	
	$id = $dados['id'];
	$nomePaciente = $dados['nomePaciente'];
	$cpfPaciente = $dados['cpfPaciente'];
	$especialidade = $dados['especialidade'] ;
	$Profissional = $dados['Profissional'];
	$data = $dados['data'] ;
	$hora = $dados['hora'] ;
	$emailPaciente = $dados['emailPaciente'];
	$tel1 = $dados['tel1'];
	$tel2 = $dados['tel2'];
	$observacoes = $dados['observacoes'];
	

	echo "<tr>";
	echo "<td>$id</td>";
	echo "<td>$nomePaciente</td>";
	echo "<td>$cpfPaciente</td>";
	echo "<td>$especialidade</td>";
	echo "<td>$Profissional</td>";
	echo "<td>$data</td>";
	echo "<td>$hora</td>";
	echo "<td>$emailPaciente</td>";
	echo "<td>$tel1</td>";
	echo "<td>$tel2</td>";
	echo "<td>$observacoes</td>";
	
	echo "<td> <a href='Excluir Consulta.php?c=$id'>Excluir</a></td>";
	echo "<td> <a href='Alteracao.php?c=$id'>Alterar</a></td>";
	echo "</tr>";

	$contador++;
	}

	echo "</table>"

?>
<hr>
<a href="Marcacao Consulta.html">Cadastrar nova consulta</a>

	</body>
</html>