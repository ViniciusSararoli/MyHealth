<?php
 
    $nomePaciente = $_POST['nomePaciente'];
    $profissaoPac= $_POST['profissaoPac'];
    $alergias = $_POST['alergias'];
    $obs = $_POST['obs'];
	$nomeMedico= $_POST['nomeMedico'];
	$especialista= $_POST['especialista'];
	$dataExame= $_POST['dataExame'];
    $exames= $_POST['exames'];

    echo "Nome completo: $nomePaciente <br>";
    echo "Profissao paciente: $profissaoPac <br>";
	echo "alergia: $alergias <br>";
	echo "Observação: $obs <br>";
	echo "nome do medico: $nomeMedico <br>";
	echo "especialidade: $especialista <br>";
	echo "data do exame: $dataExame <br>";
    echo "exames: $exames <br>";
if( $nomePaciente =="")
   {
    echo "Nome do paciente obrigatorio!! <br>";
    die("Programa Cancelada!");
   }
 
     
 
    $con = mysqli_connect("localhost", "root", "") ;
 
    
	//$comandoSQL = "SELECT * FROM myhealth" ;
    
	$ok = mysqli_select_db($con, "myhealth") or
        die("Erro na seleção do banco:" .
        mysqli_error($con)) ;

	//$linhas = mysqli_num_rows($registros) ;
	//if ($linhas<1)
//{
//die('Cadastro está vazio!');
//}
// Se chegou aqui é porque tem registros
//echo "Registros encontrados: $linhas <br>";
	
	$sql = "INSERT INTO prontuario (nomePaciente, profissaoPac , alergias,obs,nomeMedico, especialista ,dataExame, exames ) VALUES ('$nomePaciente','$profissaoPac','$alergias','$obs','$nomeMedico','$especialista', '$dataExame', '$exames')";
 
    echo "Comando SQL: <br> $sql <hr>";
     
    mysqli_query($con, $sql) or die ("Erro no envio $sql". mysqli_error($con));
    
     
    echo "Dados gravados com sucesso!";
    echo "<br><a href='listagem.php'>Listagem</a>";
?>