<html>
<head>
	<title> prontuario eletronico</title>
</head>
<body>	




<?php

    $con = mysqli_connect('localhost' , 'root' , '');
 
    /*$resultado =*/ mysqli_select_db($con , 'myhealth') or die ("Erro na seleção do banco de dados." . mysqli_error($con) );
 
     $comandoSQL = "SELECT * FROM prontuario";
    //echo $comandoSQL;
    //die($sql);
 
    $registros = mysqli_query($con , $comandoSQL) or die ("Erro na coleção dos dados." . mysqli_error($con) );
 
    $linhas = mysqli_num_rows($registros);
 
    if ($linhas < 1)
     
        die ("prontuario esta vazio.");
     
    //echo "Registros: $linhas<br>"
     
    $contador = 0;
	echo "<table border = '1'>";
	echo "<tr>";
	echo "<th> id </th>";
	echo "<th>Nome Completo </th>";
    echo "<th>Profissao paciente </th>";
    echo "<th>alergia </th>";
    echo "<th>Observação </th>";
    echo "<th>nome do medico </th>";
    echo "<th>especialidade</th>";
    echo "<th>data do exame </th>";
    echo "<th>exames </th>";
	echo "      <th colspan='2'>Ações</th>";
	 echo "  </tr>"; 
	 
	 while ($contador < $linhas)
        {   
    $dados = mysqli_fetch_array($registros);
	 
	$id = $dados['id'];
    $nomePaciente = $dados['nomePaciente'];
	$profissaoPac = $dados ['profissaoPac'];
    $alergias = 	$dados['alergias'];
    $obs = $dados['obs'] ;
	$nomeMedico = $dados ['nomeMedico'];
    $especialista = $dados ['especialista'];
	$dataExame = $dados['dataExame'] ;
    $exames = $dados['exames'] ;
		
	echo "<tr>";	
	echo "<td> $id </td>";
	echo "<td> $nomePaciente </td>";
    echo "<td> $profissaoPac </td>";
    echo "<td> $alergias </td>";
    echo "<td> $obs </td>";
    echo "<td>$nomeMedico </td>";
    echo "<td> $especialista </td>";
    echo "<td> $dataExame </td>";
    echo "<td> $exames </td>";
	
	   echo "<td> <a href='excluirprontuario.php?c=$id'>Excluir</a></td>";
    echo "<td> <a href='alteracao.php?c=$id'>Alterar</a></td>";
    echo "</tr>";
 
    $contador++;
     }
 
    echo "</table>"
 
?>

<hr>
<a href="prontuario.html">Cadastrar um novo prontuario</a>
 
    </body>
</html>