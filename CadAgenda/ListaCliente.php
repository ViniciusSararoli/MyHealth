<?php	/* Listagem.php
		C:\WAMP\WWW\[08-17.10.2019] LISTAGEM */
	
	// 1 - Conectar no MYSQL via PHP
	$con=mysqli_connect('localhost', 'root', '');
	
	// 2 - Abrindo/selecionando o banco de dados
	mysqli_select_db($con, 'myhealth') or 
		die("Erro na sele��o / abertura 
			do banco." . mysqli_error($con)  );
			
	// 3 - Criar a vari�vel com o comando SQL
	$sql = "SELECT * FROM cadconsulta";
	
	// Coloque em aspas abaixo ap�s testar
	//die($sql);
	
	// 4- Enviar o comando (variavel $sql) p/o MYSQL
	$registros = mysqli_query($con, $sql) or 
		die("Erro na sele��o de dados!!" . 
				mysqli_error($con)  );
	
	// 5 - Contando quantas linhas tem em $registros
	$linhas = mysqli_num_rows($registros);
	
	// tabela vazia ? para e avisa
	if($linhas <1)
		die("Cadastro de times est� vazio!!");
	
	// Se chegou at� aqui � pq tem registros/linhas
	
	// Varrer $registros e mostrar linha a linha
	$contador = 0;
	
	echo "<table border='1'>";
	echo "		<tr>";
	echo "			<th>Hora</th>";
	echo "			<th>Cod. Cliente</th>";
	echo "			<th>Nome</th>";
	echo "			<th>Situa��o</th>";
	echo "			<th>Status</th>";
//	echo "			<th>�cone</th>";
//	echo "			<th>A��es</th>";
	echo "		</tr>";

	while($contador < $linhas)
	{
		// mostrar uma linha de registro aqui
		// pega uma linha de $registros
		// separar as colunas
		$dados = mysqli_fetch_array($registros);
		
		// mostrar os dados das colunas
		//echo "C�digo: " . $dados['id'] . "<br>";
		
		// criando vari�veis com os dados das cols.
		$dataConsulta2 = $dados['dataConsulta2'];
		$horaMarcada = $dados['horaMarcada'];
		$codigo = $dados['codCadastro'];
		$nome = $dados['nomePaciente'];
		$tipoAtendi = $dados['tipoAtendi'];
//		$tecnico= $dados['tecnico'];
//		$pontos	= $dados['pontos'];
//		$G4		= $dados['G4'];
//		$icone	= $dados['icone'];
		
		// abrir uma nova linha
		// abrir as c�lulas
		
		echo "<tr>";
		echo "	<td>$horaMarcada</td>";
		echo "	<td>$dataConsulta2</td>";
		echo "	<td>$nome</td>";
		echo "	<td>$codigo</td>";
		echo "	<td>$tipoAtendi</td>";
//		echo "  <td> <a href='excluirTime.php?c=$codigo'>Excluir</a> </td>";

		// fechar a linha
		echo "</tr>";
		
		$contador++;
	}
	
	echo "</table>";
?>



