<html>
	<head>
		<title>Lista de pacientes</title>
	</head>
	<body>
<?php
	$con = mysqli_connect('localhost' , 'root' , '');

	/*$resultado =*/ mysqli_select_db($con , 'myhealth') or die ("Erro na seleção do banco de dados." . mysqli_error($con) );

	 $comandoSQL = "SELECT * FROM dadopessoal";
	//echo $comandoSQL;
	//die($sql);

	$registros = mysqli_query($con , $comandoSQL) or die ("Erro na celeção dos dados." . mysqli_error($con) );

	$linhas = mysqli_num_rows($registros);

	if ($linhas < 1)
		die ("Cadastro de pacientes está vazio.");
	
	//echo "Registros: $linhas<br>"
	
	$contador = 0;

	echo "<table border = '1'>";
	echo "	<tr>";
	echo "		<th>ID</th>";
	echo "		<th>Nome paciente</th>";
	echo "		<th>Foto</th>";
	echo "		<th>Nome da mãe</th>";
	echo "		<th>RG</th>";
	echo "		<th>CPF</th>";
	echo "		<th>Data de Nascimento</th>";
	echo "		<th>Sexo</th>";
	echo "		<th>Ativo/Inativo</th>";
	echo "		<th>Estado civil</th>";
	echo "		<th>Cor</th>";
	echo "		<th>Naturalidade</th>";
	echo "		<th>Nacionalidade</th>";
	echo "		<th>Tipo sanguineo</th>";
	echo "		<th>Data de cadastro</th>";
	echo "		<th>E-mail</th>";
	echo "		<th>Telefone</th>";
	echo "		<th>Telefone</th>";
	echo "		<th>Observações</th>";
	echo "		<th>CEP</th>";
	echo "		<th>Endereço</th>";
	echo "		<th>Numero</th>";
	echo "		<th>Complemento</th>";
	echo "		<th>Bairro</th>";
	echo "		<th>Estado</th>";
	echo "		<th>UF</th>";
	echo "		<th colspan='2'>Ações</th>";
	echo "	</tr>"; 

	while ($contador < $linhas)
		{	
	$dados = mysqli_fetch_array($registros);

	$id = $dados['id'];
	$nomePaciente = $dados['nomePaciente'] ;

	$foto =  $dados['foto'];

	$nomeMae = $dados['nomeMae'] ;
	$rgPaciente = $dados['rgPaciente'] ;
	$cpfPaciente = $dados['cpfPaciente'];
	$dtNascimento = $dados['dtNascimento'];
	$sexoPaciente = $dados['sexoPaciente'];
	$statusAtividade=0;
	if (isset($dados['statusAtividade']))
		$statusAtividade = $dados['statusAtividade'];
	$estCivil = $dados['estCivil'];
	$corPaciente = $dados['corPaciente'];
	$naturalidade = $dados['naturalidade'];
	$nacionalidade = $dados['nacionalidade'];
	$tipoSanguineo = $dados['tipoSanguineo'];
	$dataCadastro = $dados['dataCadastro'];
	$emailPaciente = $dados['emailPaciente'];
	$tel1 = $dados['tel1'];
	$tel2 = $dados['tel2'];
	$observacoes = $dados['observacoes'];
	$cepResidencia = $dados['cepResidencia'];
	$endResidencia = $dados['endResidencia'];
	$numResidencia = $dados['numResidencia'];
	$compResidencia = $dados['compResidencia'];
	$bairroResidencia = $dados['bairroResidencia'];
	$cidResidencia = $dados['cidResidencia'];
	$ufEstado = $dados['ufEstado'];

	echo "<tr>";
	echo "<td>$id</td>";
	echo "<td>$nomePaciente</td>";
		if ($foto <> "")
			echo "<td><img src='foto/$foto'></td>";
		else "<td>Foto não encontrda</td>";
	echo "<td>$nomeMae</td>";
	echo "<td>$rgPaciente</td>";
	echo "<td>$cpfPaciente</td>";
	echo "<td>$dtNascimento</td>";
	echo "<td>$sexoPaciente</td>";
	echo "<td>$statusAtividade</td>";
	echo "<td>$estCivil</td>";
	echo "<td>$corPaciente</td>";
	echo "<td>$naturalidade</td>";
	echo "<td>$nacionalidade</td>";
	echo "<td>$tipoSanguineo</td>";
	echo "<td>$dataCadastro</td>";
	echo "<td>$emailPaciente</td>";
	echo "<td>$tel1</td>";
	echo "<td>$tel2</td>";
	echo "<td>$observacoes</td>";
	echo "<td>$cepResidencia</td>";
	echo "<td>$endResidencia</td>";
	echo "<td>$numResidencia</td>";
	echo "<td>$compResidencia</td>";
	echo "<td>$bairroResidencia</td>";
	echo "<td>$cidResidencia</td>";
	echo "<td>$ufEstado</td>";
	echo "<td> <a href='excluirPaciente.php?c=$id'>Excluir</a></td>";
	echo "<td> <a href='alteracao.php?c=$id'>Alterar</a></td>";
	echo "</tr>";

	$contador++;
	}

	echo "</table>";

?>

<hr>
<a href="dadosPessoais.html">Cadastrar novo paciente</a>

	</body>
</html>