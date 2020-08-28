<?php

	$nomeMedico = $_POST["nomeMedico"] ;

	//$foto =  $_FILES["foto"];
		$nomeFoto = $_FILES["foto"] ["name"];
		$tipoFoto = $_FILES["foto"] ["type"];
		$tamanhoFoto = $_FILES["foto"] ["size"];
		$temporarioFoto = $_FILES["foto"] ["tmp_name"];

	$crm = $_POST["crm"] ;
	$cpfMed = $_POST["cpfMed"];
	$ufMed = $_POST["ufMed"];
	$cbos = $_POST["cbos"];
	$tipoMed = $_POST["tipoMed"];
	$cns = $_POST["cns"];
	$emailMed = $_POST["emailMed"];
	$tel1Med = $_POST["tel1Med"];
	$tel2Med = $_POST["tel2Med"];
	$bancoMed = $_POST["bancoMed"];
	$agenciaMed = $_POST["agenciaMed"];
	$contaMed = $_POST["contaMed"];
	$obs = $_POST["obs"];



	echo "Nome completo: $nomeMedico <br>";
	

		if($nomeFoto <> "")
			{
			echo "<hr>";
			echo "Nome do arquivo: $nomeFoto <br>";
			echo "Tipo: $tipoFoto <br>";
			echo "Tamanho : $tamanhoFoto<br>";
			echo "Local (temporário): $temporarioFoto <br>";

		$destinoFoto = "foto/$nomeFoto"; /*. $_FILES['foto'] ['nomeFoto'];*/
		if ( move_uploaded_file($temporarioFoto, $destinoFoto))
			{
			echo "Foto transferido para a pasta Fotos. <br>";
			}
		else
			{
			echo "Ocorreu algum erro ao tentar mover o
			arquivo para a pasta destino.<br>";
			}

			}



	echo "CRM Médico: $crm<br>";
	echo "CPF: $cpfMed<br>";
	echo "UF: $ufMed<br>";
	echo "CBOS: $cbos<br>";
	echo "Tipo de Médico: $tipoMed<br>";
	echo "CNS: $cns<br>";
	echo "E-MAIL: $emailMed<br>";
	echo "TELEFONE: $tel1Med<br>";
	echo "TELEFONE:  $tel2Med<br>";
	echo "BANCO: $bancoMed<br>";
	echo "AGENCIA: $agenciaMed<br>";
	echo "CONTA: $contaMed<br>";
	echo "Observações: $obs<br>";
	
	
	

if( $nomeMedico =="")
	{
		echo "Nome do Medico obrigatorio! <br>";
		die("Programa Cancelado!");
	}
if( $crm =="")
	{
		echo "Crm do Medico Obrigatorio! <br>";
		die("Programa Cancelada!");
	}
	
if( $tipoMed =="")
	{
		echo "Tipo de Medico  Obrigatorio! <br>";
		die("Programa Cancelada!");
	}
	
	
if( $cbos =="")
	{
		echo "CBOS (Especialidade) do Medico obrigatorio!! <br>";
		die("Programa Cancelada!");
	}

	$con = mysqli_connect("localhost", "root", "") ;

	$ok=mysqli_select_db($con, "myhealth") or
		die("Erro na seleção do banco:" .
		mysqli_error($con)) ;

	$sql = "INSERT INTO cadastromedicos
	(nomeMedico,foto, crm, cpfMed, ufMed, cbos, tipoMed, cns, emailMed, tel1Med, tel2Med, bancoMed, agenciaMed, contaMed,obs) VALUES
	('$nomeMedico', '$nomeFoto', '$crm', '$cpfMed' ,'$ufMed', '$cbos' , '$tipoMed' , '$cns' , '$emailMed','$tel1Med' , '$tel2Med' , '$bancoMed' , '$agenciaMed' , '$contaMed' , '$obs')";

	echo "Comando SQL: <br> $sql <hr>";
	
	mysqli_query($con, $sql);
	
	echo "Dados gravados com sucesso!";
?>