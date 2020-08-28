<?php

	$nomePaciente = $_POST['nomePaciente'];
	$cpfPaciente = $_POST['cpfPaciente'];
	$especialidade = $_POST['especialidade'];
	$Profissional = $_POST['Profissional'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$emailPaciente = $_POST['emailPaciente'];
	$tel1 = $_POST['tel1'];
	$tel2 = $_POST['tel2'];
	$observacoes = $_POST['observacoes'];
	

	echo "Nome completo: $nomePaciente <br>";
	echo "CPF: $cpfPaciente <br>";
	echo "Especialidade: $especialidade <br>";
    echo "Profissional: $Profissional <br>";
	echo "Data: $data <br>";
	echo "Hora: $hora <br>";
	echo "E-mail: $emailPaciente<br>";
	echo "Telefone: $tel1<br>";
	echo "Telefone: $tel2<br>";
	echo "Observações: $observacoes<br>";
	

if( $nomePaciente =="")
	{
		echo "Nome do Paciente obrigatório!! <br>";
		die("Programa Cancelado!");
	}
	
if( $cpfPaciente =="")
    {
        echo "CPF do Paciente obrigatório!! <br>";
        die("Programa Cancelado!");
    }	

if( $data =="")
	{
		echo "Data obrigatória!! <br>";
		die("Programa Cancelado!");
	}
	
if( $hora =="")
	{
		echo "Hora obrigatória!! <br>";
		die("Programa Cancelado!");
	}	
	
if( $tel1 =="")
	{
		echo "Telefone obrigatório!! <br>";
		die("Programa Cancelado!");
	}	
	

	$con = mysqli_connect("localhost", "root", "") ;

	$ok = mysqli_select_db($con, "myhealth") or
		die("Erro na seleção do banco:" .
		mysqli_error($con)) ;

	$comandoSQL = "INSERT INTO marcacaoconsulta (nomePaciente , cpfPaciente, especialidade , Profissional , data , hora , emailPaciente , tel1 , tel2 , observacoes ) VALUES
	('$nomePaciente', '$cpfPaciente', '$especialidade', '$Profissional','$data', '$hora' , '$emailPaciente' , '$tel1' , '$tel2' , '$observacoes')";

	//echo "Comando SQL: <br> $comandoSQL <hr>";
	
	mysqli_query($con, $comandoSQL)or die ("Erro no envio $comandoSQL".mysqli_error($con));
	
	echo "Dados gravados com sucesso!";
?>
<br>
<a href="Listagem.php">Listagem Marcada com Sucesso</a>