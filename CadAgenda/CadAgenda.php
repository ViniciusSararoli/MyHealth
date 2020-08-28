<?php
	
	// Criando variÃ¡veis com dados que chegaram
	
	$medico = $_POST["medico"];
 	$dataConsulta = $_POST["dataConsulta"];
	$codCadastro = $_POST["codCadastro"];
 	$dataConsulta2 = $_POST["dataConsulta2"];
	$horaMarcada = $_POST["horaMarcada"];
	$tipoAtendi = $_POST["tipoAtendimento"];
	$nomePaciente = $_POST["nomePaciente"];
	$tel1 = $_POST["tel1"];
	$emailPaciente = $_POST["emailPaciente"];
	$convenio = $_POST["convenio"];
//	$observacoes = $_POST["observacoes"];
//	$stipo = $_POST["tipo"];
	
	
	echo "Nome Medico: $medico <br>";
	echo "Data Consulta: $dataConsulta <br>";
	echo "Código Cliente: $codCadastro <br>";
	echo "Data Consulta: $dataConsulta2 <br>";
	echo "Hora Consulta: $horaMarcada <br>";
	echo "Situação: $tipoAtendi<br>";
	echo "Nome completo: $nomePaciente <br>";
	echo "Telefone: $tel1<br>";
	echo "E-mail: $emailPaciente<br>";
	echo "Convênio: $convenio<br>";
//	echo "Observações: $observacoes<br>";


		if( $nomePaciente =="")
			{
				echo "Nome do Paciente obrigatorio!! <br>";
				die("Programa Cancelada!");
			}

		$con = mysqli_connect("localhost", "root", "") ;

			mysqli_select_db($con, "myhealth") or
				die("Erro na seleção do banco:" .
				mysqli_error($con)) ;

			$sql = "INSERT INTO cadconsulta
			(medico, codCadastro, dataConsulta2, horaMarcada, tipoAtendi, nomePaciente, tel1, emailPaciente, convenio) VALUES	
			('$medico', '$codCadastro', '$dataConsulta2', '$horaMarcada', '$tipoAtendi', '$nomePaciente', '$tel1', '$emailPaciente', '$convenio')";

			echo "Comando SQL: <br> $sql <hr>";
		// 4 Enviando o comando de inserção para o MYSQL	

			mysqli_query($con, $sql) or
			die ("Erro na inserção de registro no banco: " .
				mysqli_error ($con));
				
			echo "Dados gravados com sucesso! <br><br>";


//			$linha=1;
//			$n= 0;
//			echo "<table border='1'>";
//			echo " <tr>";
//			echo " <th>Médico</th>";
//			echo " <th>Nome</th>";
//			echo " <th>Hora Marcada</th>";
//			echo " <th>Status</th>";
//			echo " <th>Está no G4</th>";
//			echo " <th>Ícone</th>";
//			echo " </tr>";

//			for($n=0; $n<$linhas; $n++)
//				{
//			$dados = mysqli_fetch_array($registros);
//			$id = $dados["medico"];
//			$nome = $dados["nome"];
//			$tecnico= $dados["codCadastro"];
//			$pontos = $dados["horaMarcada"];
//			$G4 = $dados["tipoAtendimento"];
//			$icone = $dados["nomePaciente"];
//		
//			echo " <tr>";
//			echo " <td> $id</td>";
//			echo " <td> $nome </td>";
//			echo " <td> $tecnico</td>";
//			echo " <td> $pontos</td>";
//			echo " <td> $G4</td>";
//			echo " <td> $icone</td>";
//			echo " </tr>";
//			}
//			echo "</table>";


?>