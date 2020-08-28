<html>
<head>
</head>
<body>
<?php

	$nomePaciente = $_POST['nomePaciente'] ;

		$nomeFoto = $_FILES['foto'] ['name'];
		$tipoFoto = $_FILES['foto'] ['type'];
		$tamanhoFoto = $_FILES['foto'] ['size'];
		$temporarioFoto = $_FILES['foto'] ['tmp_name'];

	$nomeMae = $_POST['nomeMae'] ;
	$rgPaciente = $_POST['rgPaciente'] ;
	$cpfPaciente = $_POST['cpfPaciente'];
	$dtNascimento = $_POST['dtNascimento'];
	$sexoPaciente = $_POST['sexoPaciente'];

	$statusAtividade=0;
	if (isset($_POST['statusAtividade']))
		$statusAtividade = $_POST['statusAtividade'];

	$estCivil = $_POST['estCivil'];
	$corPaciente = $_POST['corPaciente'];
	$naturalidade = $_POST['naturalidade'];
	$nacionalidade = $_POST['nacionalidade'];
	$tipoSanguineo = $_POST['tipoSanguineo'];
	$dataCadastro = $_POST['dataCadastro'];
	$emailPaciente = $_POST['emailPaciente'];
	$tel1 = $_POST['tel1'];
	$tel2 = $_POST['tel2'];
	$observacoes = $_POST['observacoes'];
	$cepResidencia = $_POST['cepResidencia'];
	$endResidencia = $_POST['endResidencia'];
	$numResidencia = $_POST['numResidencia'];
	$compResidencia = $_POST['compResidencia'];
	$bairroResidencia = $_POST['bairroResidencia'];
	$cidResidencia = $_POST['cidResidencia'];
	$ufEstado = $_POST['ufEstado'];

	echo "Nome completo: $nomePaciente <br>";

		if($nomeFoto <> "")
			{
			echo "<hr>";
			echo "Nome do arquivo: $nomeFoto <br>";
			echo "Tipo: $tipoFoto <br>";
			echo "Tamanho : $tamanhoFoto<br>";
			echo "Local (temporário): $temporarioFoto <br>";

		$destinoFoto ="foto/$nomeFoto";/*. $_FILES['foto'] ['tmp_name'];*/
		//$diretorio = 'foto/';
		if ( move_uploaded_file($temporarioFoto, $destinoFoto))
			{
			echo "Foto transferido para a pasta Fotos. <br>";
			}
		else
			{
			echo "Ocorreu algum erro ao tentar mover o
			arquivo FOTO para a pasta de destino $destinoFoto.<br>";
			}
		}

	echo "Nome da mãe: $nomeMae <br>";
	echo "RG: $rgPaciente <br>";
	echo "CPF: $cpfPaciente<br>";
	echo "Nascimento: $dtNascimento<br>";
	echo "Sexo: $sexoPaciente<br>";
	echo "Ativo/Inativo: $statusAtividade<br>";
	echo "Estado civil: $estCivil<br>";
	echo "Cor: $corPaciente<br>";
	echo "Naturalidade: $naturalidade<br>";
	echo "Nacionalidade:  $nacionalidade<br>";
	echo "Tipo sanguineo: $tipoSanguineo<br>";
	echo "Data de cadastro: $dataCadastro<br>";
	echo "E-mail: $emailPaciente<br>";
	echo "Telefone: $tel1<br>";
	echo "Telefone: $tel2<br>";
	echo "Observações: $observacoes<br>";
	echo "CEP: $cepResidencia<br>";
	echo "Endereço: $endResidencia<br>";
	echo "Número: $numResidencia<br>";
	echo "Complemento: $compResidencia<br>";
	echo "Bairro: $bairroResidencia<br>";
	echo "cidade: $cidResidencia<br>";
	echo "UF: $ufEstado<br>";

if( $nomePaciente =="")
	{
		echo "Nome completo obrigatorio!! <br>";
		die("Programa Cancelada!");
	}
if( $nomeMae =="")
	{
		echo "Nome da mae obrigatorio!! <br>";
		die("Programa Cancelada!");
	}
if( $cpfPaciente =="")
	{
		echo "CPF obrigatorio!! <br>";
		die("Programa Cancelada!");
	}

if( $dtNascimento =="")
	{
		echo "Data de nascimento obrigatoria!! <br>";
		die("Programa Cancelada!");
	}

	$con = mysqli_connect("localhost", "root", "") ;

	$ok=mysqli_select_db($con, "myhealth") or
		die("Erro na seleção do banco:" .
		mysqli_error($con)) ; 

	$comandoSQL = "INSERT INTO dadopessoal (nomePaciente , foto , nomeMae , rgPaciente , cpfPaciente , dtNascimento , sexoPaciente , statusAtividade , estCivil , corPaciente , naturalidade , nacionalidade , tipoSanguineo , dataCadastro , emailPaciente , tel1 , tel2 , observacoes , cepResidencia , endResidencia , numResidencia , compResidencia , bairroResidencia , cidResidencia , ufEstado)VALUES('$nomePaciente', '$nomeFoto', '$nomeMae','$rgPaciente', '$cpfPaciente' , '$dtNascimento' , '$sexoPaciente' , '$statusAtividade' , '$estCivil' , '$corPaciente' , '$naturalidade' , '$nacionalidade' , '$tipoSanguineo' , '$dataCadastro' , '$emailPaciente' , '$tel1' , '$tel2' , '$observacoes' , '$cepResidencia' , '$endResidencia' , $numResidencia , '$compResidencia' , '$bairroResidencia' , '$cidResidencia' , '$ufEstado')";

	echo "Comando SQL: <br> $comandoSQL <hr>";
	
	mysqli_query($con, $comandoSQL) or die ("Erro no envio $comandoSQL".mysqli_error($con));
	
	echo "Dados gravados com sucesso!";

?>

<hr>
	<a href="listagem.php">Listagem</a>
</body>
</html>