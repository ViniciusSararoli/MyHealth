<html>
    <head>
        <title>Lista de Médicos</title>
</head>
    <body>
<?php
	$con = mysqli_connect('localhost' , 'root' , '');

	/*$resultado =*/ mysqli_select_db($con , 'myhealth') or die ("Erro na seleção do banco de dados." . mysqli_error($con) );

	 $comandoSQL = "SELECT * FROM cadastroMedicos";
	//echo $comandoSQL;
	//die($sql);

	$registros = mysqli_query($con , $comandoSQL) or die ("Erro na celeção dos dados." . mysqli_error($con) );

	$linhas = mysqli_num_rows($registros);

	if ($linhas < 1)
		die ("Cadastro de Medicos está vazio.");
	
	//echo "Registros: $linhas<br>"
	
	$contador = 0;

	echo "<table border = '1'>";
	echo "	<tr>";
	echo "		<th>ID</th>";
	echo "		<th>Nome do Médico</th>";
	echo "		<th>Foto</th>";
	echo "		<th>CRM</th>";
	echo "		<th>CPF</th>";
	echo "		<th>UF</th>";
	echo "		<th>CBOS</th>";
	echo "		<th>Tipo</th>";
	echo "		<th>cns</th>";
	echo "		<th>E-mail</th>";
	echo "		<th>Telefone</th>";
	echo "		<th>Telefone</th>";
	echo "		<th>Banco</th>";
	echo "		<th>Agencia</th>";
	echo "		<th>Conta</th>";	
	echo "		<th>Observações</th>";
	echo "		<th colspan='2'>Ações</th>";
	echo "	</tr>"; 

	while ($contador < $linhas)
		{	
	$dados = mysqli_fetch_array($registros);

	$id = $dados['id'];
	$nomeMedico = $dados['nomeMedico'] ;

	$foto =  $dados['foto'];
		//$nomeFoto = $dados['foto'] ['name'];
		//$tipoFoto = $dados['foto'] ['type'];
		//$tamanhoFoto = $dados['foto'] ['size'];
		//$temporarioFoto = $dados['foto'] ['tmp_name'];

	$crm = $dados['crm'] ;
	$cpfMed = $dados['cpfMed'] ;
	$ufMed = $dados['ufMed'];
	$cbos = $dados['cbos'];
	$tipoMed = $dados['tipoMed'];
	$cns = $dados['cns'];
	$emailMed = $dados['emailMed'];
	$tel1Med = $dados['tel1Med'];
	$tel2Med = $dados['tel2Med'];
	$bancoMed = $dados['bancoMed'];
	$agenciaMed = $dados['agenciaMed'];
	$contaMed = $dados['contaMed'];
	$obs = $dados['obs'];
	

	echo "<tr>";
	echo "<td>$id</td>";
	echo "<td>$nomeMedico</td>";
		if ($foto <> "")
			echo "<td><img src='foto/$foto'></td>";
		else "<td>Foto não encontrada</td>";
	echo "<td>$crm</td>";
	echo "<td>$cpfMed</td>";
	echo "<td>$ufMed</td>";
	echo "<td>$cbos</td>";
	echo "<td>$tipoMed</td>";
	echo "<td>$cns</td>";
	echo "<td>$emailMed</td>";
	echo "<td>$tel1Med</td>";
	echo "<td>$tel2Med</td>";
	echo "<td>$bancoMed</td>";
	echo "<td>$agenciaMed</td>";
	echo "<td>$contaMed</td>";
	echo "<td>$obs</td>";
	echo "<td> <a href='excluirMedicos.php?c=$id'>Excluir</a></td>";
	echo "<td> <a href='alteracao.php?c=$id'>Alterar</a></td>";
	echo "</tr>";

	$contador++;
	}

	echo "</table>"

?>
<hr>
<a href="CadastroMedicos.html">Cadastrar nova Medico</a>
 
    </body>
</html>