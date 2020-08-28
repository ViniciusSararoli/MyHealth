 <html>
 	<head>
 		<title>Pagina de alteração</title>
 		<style>
 			body { background:white;
					background-size: 100%;
					margin:0px;
				}


			#faixa {	background-color:#A9BCF5;
					width: 100%;
					height : 60px;
					padding :0px;
					border-width: 2px;
 					border-color: #BDBDBD;		
				}

			#faixa h3 {
				padding: 18px; 
			}

			.principal {
				width:100%;
				height:508px;
				padding-left:0px;
				background:#CEE3F6;
				border-color: #111111;
				border-width: 2px;
 				border-color: #BDBDBD;	
				}

		.dados fieldset.sexo{
				float: left;
				position: relative;
				left: 100px;
				font-size: 10;
				}

			.status{
				float: left;
				position: relative;
				left: 750px;
			}

			.numeros input.form-control{
				padding:  0px;
				position: relative;
				left: 1px;
				
			}

			.dado input.textarea {
					float: left;
					height:80px;
					position: relative;
					left: 980px;
					}
				
			.botao {
				padding: 10px;
				float: right;

				}

			.footer {
				top:80px;
				left:0px;
				background-color:#A9BCF5;
				width:100%;
				height:50px;
				border-width: 2px;
 				border-color: #BDBDBD;	
					
								}


 		</style>
 	</head>
 <body>
 		
 <?php

 	if(! isset ($_GET['c']) )
		die ("Rotina de alteração!");

	$id = $_GET['c'];

	//echo "Alterar paciente cadastrado: $id <br>";
	include "conexao.php";

	

	$sql="SELECT * FROM dadopessoal WHERE id = $id ";

	//die($sql);

	$registros = mysqli_query($con , $sql) or 
		die ("Erro na Seleção do $id: " 
			. mysqli_error($con)	);

	$linhas = mysqli_num_rows ($registros);

	if ($linhas < 1)
		die ("Paciente $id não existente - Alteração encerrada!");
	

	$dados = mysqli_fetch_array($registros);

	//$id = $dados['id'];
	$nomePaciente = $dados['nomePaciente'] ;

	$foto =  $dados['foto'];
		//$nomeFoto = $dados['foto'] ['name'];
		//$tipoFoto = $dados['foto'] ['type'];
		//$tamanhoFoto = $dados['foto'] ['size'];
		//$temporarioFoto = $dados['foto'] ['tmp_name'];

	$nomeMae = $dados['nomeMae'] ;
	$rgPaciente = $dados['rgPaciente'] ;
	$cpfPaciente = $dados['cpfPaciente'];
	$dtNascimento = $dados['dtNascimento'];
	$sexoPaciente = $dados['sexoPaciente'];
	//$statusAtividade=0;
	//if (isset($dados['statusAtividade']))
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
	
?>

		<div  id= "faixa" >
			
				<h3>Alteração de Dados</h3>
		
		</div>
		
		<div class="principal">

			<div class="dados">
			

				<form action="conexao.php" method="post"  
				enctype="multipart/form-data">
				<fieldset>
				<legend>Dados principais</legend>
				<label for="nomePaciente">Nome Completo</label>
				<input 	type="text" 
						name="nomePaciente" 
						maxlength="40" size="90" 
						value="<?php echo $nomePaciente; ?>">

				<input 	type="file" 
						name="foto"><p><br>

				<label 	for="nomeMae">Nome da mãe</label>
				<input 	type="text" 
						name="nomeMae" 
						maxlength="40" 
						size="90" 
						value="<?php echo $nomeMae; ?>"><p>

		<fieldset class="sexo">

				<?php
					$checkM = "";
					$checkF = "";

					if ($sexoPaciente == "M")
						$checkM = "checked";

					if ($sexoPaciente == "F")
						$checkF = "checked";
				?>
						<legend>Sexo</legend>
					<input type="radio" 
					name="sexoPaciente" 
					value="M" <?php $checkM;?> checked>Masculino
					<input type="radio" 
					name="sexoPaciente" 
					value="F" <?php $checkF;?>	>Feminino
					</fieldset>

					
				<div class="numeros">
					<label 	for="rgPaciente">RG</label>
					<input 	type="text" 
							maxlength="9"
							name="rgPaciente"
							class="form-control rg-mask" 
							placeholder="00-000-000/0"
							value="<?php echo $rgPaciente; ?>">

					<label 	for="cpfPaciente">CPF</label>
					<input 	type="text"
							maxlength="10" 
							name="cpfPaciente"
							class="form-control cpf-mask"
							placeholder="Ex.: 000.000.000-00"
							value="<?php echo $cpfPaciente; ?>">



					<label 	for="dtNascimento">Nascimento</label>
					<input 	type="date"
							name="dtNascimento" 
							class="form-control date-mask" 
							value="<?php echo $dtNascimento; ?>">
				

				

				<?php
				if ($statusAtividade == "on")
					echo '<input 	class="status" 
							type="checkbox" 
							name="statusAtividade"
							value="1" checked>';
					else
						echo '<input 	class="status" 
							type="checkbox" 
							name="statusAtividade"
							value="1">';
				?>
					<label 	for="statusAtividade" 
							class="status">Ativo/Inativo</label>

					</fieldset>
				<p>
			</div>


			<?php
				$opcaoC = "";
				$opcaoD = "";
				$opcaoS = "";
				$opcaoUE = "";
				$opcaoV = "";

				if ($estCivil == "C")
					$opcaoC = "selected";
				if ($estCivil == "D")
					$opcaoD = "selected";
				if ($estCivil == "S")
					$opcaoS = "selected";
				if ($estCivil == "UE")
					$opcaoUE = "selected";
				if ($estCivil == "V")
					$opcaoV = "selected";
			?>

			<fieldset>
				<label 	for="estCivil">Estado civil</label>
					<select name="estCivil">
						<option value="" ></option>
						<option value="C" <?php echo $opcaoC; ?>>Casado</option>
						<option value="D" <?php echo $opcaoD; ?>>Divorciado</option>
						<option value="S" <?php echo $opcaoS; ?>>Solteiro</option>
						<option value="UE" <?php echo $opcaoUE; ?>>União estável</option>
						<option value="V" <?php echo $opcaoV; ?>>Viuvo</option>
					</select>
			
			<?php
			$opcA = "";
			$opcB ="";
			$opcN ="";
			$opcP ="";

				if ($corPaciente == "A")
				$opcA = "selected";

				if ($corPaciente == "B")
				$opcB = "selected";

				if ($corPaciente == "N")
				$opcN = "selected";

				if ($corPaciente == "P")
				$opcP = "selected";
			?>
				<label for="corPaciente">Cor</label>
						<select name="corPaciente">
							<option value="" ></option>
							<option value="A" <?php echo $opcA; ?>>Asiatico</option>
							<option value="B" <?php echo $opcB; ?>>Branco</option>
							<option value="N" <?php echo $opcN; ?>>Negro</option>
							<option value="P" <?php echo $opcP; ?>>Pardo</option>
						</select>


				<?php
				$opAM ="";
				$opAm ="";
				$opBM ="";
				$opBm ="";
				$opAB ="";
				$opOM ="";
				$opOm ="";
				
					if ($tipoSanguineo == "A+")
					$opAM = "selected";

					if ($tipoSanguineo == "A-")
					$opAm = "selected";

					if ($tipoSanguineo == "B+")
					$opBM = "selected";

					if ($tipoSanguineo == "B-")
					$opBM = "selected";

					if ($tipoSanguineo == "AB")
					$opAB = "selected";

					if ($tipoSanguineo == "O+")
					$opOM = "selected";

					if ($tipoSanguineo == "O-")
					$opOm = "selected";
				?>

				<label for="tipoSanguineo">Tipo sanguineo</label>
						<select name="tipoSanguineo" >
							<option value=""></option>
							<option value="A+" <?php echo $opAM; ?>>A+</option>
							<option value="A-" <?php echo $opAm; ?>>A-</option>
							<option value="B+" <?php echo $opBM; ?>>B+</option>
							<option value="B-" <?php echo $opBm; ?>>B-</option>
							<option value="AB" <?php echo $opAB; ?>>AB</option>
							<option value="O+" <?php echo $opOM; ?>>O+</option>
							<option value="O-" <?php echo $opOm; ?>>O-</option>
						</select>

					<label for="dataCadastro">Data de cadastro</label>
					<input 	type="date" 
							name="dataCadastro"
							value="<?php echo $dataCadastro; ?>">
			
			<?php
			$cidBA = "";
			$cidCE = "";
			$cidDF = "";
			$cidGO = "";
			$cidMA = "";
			$cidMT = "";
			$cidMG = "";
			$cidPA = "";
			$cidPB = "";
			$cidPR = "";
			$cidPE = "";
			$cidPI = "";
			$cidRJ = "";
			$cidRS = "";
			$cidSC = "";
			$cidSP = "";
			$cidSE = "";
			$cidTO = "";
		
			if ($naturalidade == "BA") $cidBA = "selected";
			if ($naturalidade == "CE") $cidCE = "selected";
			if ($naturalidade == "DF") $cidDF = "selected";
			if ($naturalidade == "GO") $cidGO = "selected";
			if ($naturalidade == "MA") $cidMA = "selected";
			if ($naturalidade == "MT") $cidMT = "selected";
			if ($naturalidade == "MG") $cidMG = "selected";
			if ($naturalidade == "PA") $cidPA = "selected";
			if ($naturalidade == "PB") $cidPB = "selected";
			if ($naturalidade == "PR") $cidPR = "selected";
			if ($naturalidade == "PE") $cidPE = "selected";
			if ($naturalidade == "PI") $cidPI = "selected";
			if ($naturalidade == "RJ") $cidRJ = "selected";
			if ($naturalidade == "RS") $cidRS = "selected";
			if ($naturalidade == "SC") $cidSC = "selected";
			if ($naturalidade == "SP") $cidSP = "selected";
			if ($naturalidade == "SE") $cidSE = "selected";
			if ($naturalidade == "TO") $cidTO = "selected";

			?>
				<p><label for="naturalidade">Naturalidade</label>
					<select id="naturalidade" 
							name="naturalidade">
	<option value=""></option>
    <option value="BA" <?php echo $cidBA ?>>Bahia</option>
    <option value="CE" <?php echo $cidCE ?>>Ceará</option>
    <option value="DF" <?php echo $cidDF ?>>Distrito Federal</option>
    <option value="GO" <?php echo $cidGO ?>>Goiás</option>
    <option value="MA" <?php echo $cidMA ?>>Maranhão</option>
    <option value="MT" <?php echo $cidMT ?>>Mato Grosso</option>
    <option value="MG" <?php echo $cidMG ?>>Minas Gerais</option>
    <option value="PA" <?php echo $cidPA ?>>Pará</option>
    <option value="PB" <?php echo $cidPB ?>>Paraíba</option>
    <option value="PR" <?php echo $cidPR ?>>Paraná</option>
    <option value="PE" <?php echo $cidPE ?>>Pernambuco</option>
    <option value="PI" <?php echo $cidPI ?>>Piauí</option>
    <option value="RJ" <?php echo $cidRJ ?>>Rio de Janeiro</option>
    <option value="RS" <?php echo $cidRS ?>>Rio Grande do Sul</option>
    <option value="SC" <?php echo $cidSC ?>>Santa Catarina</option>
    <option value="SP" <?php echo $cidSP ?>>São Paulo</option>
    <option value="SE" <?php echo $cidSE ?>>Sergipe</option>
    <option value="TO" <?php echo $cidTO ?>>Tocantins</option>
					</select>


					<?php
			$paisBR = "";
			$paisOutro = "";
		
			if ($nacionalidade == "Brasil") $paisBR = "selected";
			if ($nacionalidade == "Outros") $paisOutro = "selected";
			?>

	<label for="nacionalidade">Nacionalidade</label>
		<select id="nacionalidade" 
				name="nacionalidade">
			<option value=""></option>
   			<option value="Brasil" <?php echo $paisBR ?>>Brasil</option>
			<option value="Outros" <?php echo $paisOutro ?>>Outros</option>
		</select>
	</fieldset>
						

			
							

					<fieldset>

			<legend>Contatos</legend><p>
				<label for="emailPaciente">E-mail</label>
					<input 	type="email" 
							name="emailPaciente" 
							maxlength="40" 
							value="<?php echo $emailPaciente; ?>">

			<label for="tel1">Telefone</label>
				<input 	type="text" 
						maxlength="11" 
						name="tel1"
						class="form-control phone-ddd-mask"
						 placeholder="Ex.: 1100000000" 
						 value="<?php echo $tel1; ?>">

				<label for="tel2">Telefone</label>
					<input 	type="text" 
							maxlength="11" 
							name="tel2" 
							class="form-control phone-ddd-mask" 
							placeholder="Ex.: 1100000000" 
							value="<?php echo $tel2; ?>">
					

				<label for="observacoes">Observações</label>
					<textarea 	name="observacoes" 
								maxlength="50" 
								class="textarea"><?php echo $observacoes;?></textarea>
								<p>
								<br>
					
					
				
				<label for="cepResidencia">CEP</label>
					<input type="text" maxlength="10" name="cepResidencia"
					class="form-control cep-mask" placeholder="Ex.: 00000-000" value="<?php echo $cepResidencia; ?>">

				<label for="endResidencia">Endereço</label>
					<input type="text" name="endResidencia" maxlength="40" value="<?php echo $endResidencia; ?>">

				<label for="numResidencia">Numero</label>
					<input type="number" maxlength="5" name="numResidencia" value="<?php echo $numResidencia; ?>"><p><br>

				<label for="compResidencia">Complemento</label>
					<input type="text" name="compResidencia" maxlength="20" value="<?php echo $compResidencia; ?>">

				<label for="bairroResidencia">Bairro</label>
					<input type="text" name="bairroResidencia" maxlength="30" value="<?php echo $bairroResidencia; ?>">


					<?php
			$cidBA = "";
			$cidCE = "";
			$cidDF = "";
			$cidGO = "";
			$cidMA = "";
			$cidMT = "";
			$cidMG = "";
			$cidPA = "";
			$cidPB = "";
			$cidPR = "";
			$cidPE = "";
			$cidPI = "";
			$cidRJ = "";
			$cidRS = "";
			$cidSC = "";
			$cdSP = "";
			$cidSE = "";
			$cidTO = "";
		
			if ($cidResidencia == "BA") $cidBA = "selected";
			if ($cidResidencia == "CE") $cidCE = "selected";
			if ($cidResidencia == "DF") $cidDF = "selected";
			if ($cidResidencia == "GO") $cidGO = "selected";
			if ($cidResidencia == "MA") $cidMA = "selected";
			if ($cidResidencia == "MT") $cidMT = "selected";
			if ($cidResidencia == "MG") $cidMG = "selected";
			if ($cidResidencia == "PA") $cidPA = "selected";
			if ($cidResidencia == "PB") $cidPB = "selected";
			if ($cidResidencia == "PR") $cidPR = "selected";
			if ($cidResidencia == "PE") $cidPE = "selected";
			if ($cidResidencia == "PI") $cidPI = "selected";
			if ($cidResidencia == "RJ") $cidRJ = "selected";
			if ($cidResidencia == "RS") $cidRS = "selected";
			if ($cidResidencia == "SC") $cidSC = "selected";
			if ($cidResidencia == "SP") $cdSP = "selected";
			if ($cidResidencia == "SE") $cidSE = "selected";
			if ($cidResidencia == "TO") $cidTO = "selected";

			?>
				<label for="cidResidencia">Cidade</label>
					<select id="cidResidencia" name="cidResidencia" value="<?php echo $cidResidencia; ?>">
					<option value=""></option>
    <option value="BA"<?php echo $cidBA ?>>Bahia</option>
    <option value="CE"<?php echo $cidCE ?>>Ceará</option>
    <option value="DF"<?php echo $cidDF ?>>Distrito Federal</option>
    <option value="GO"<?php echo $cidGO ?>>Goiás</option>
    <option value="MA"<?php echo $cidMA ?>>Maranhão</option>
    <option value="MT"<?php echo $cidMT ?>>Mato Grosso</option>
    <option value="MG"<?php echo $cidMG ?>>Minas Gerais</option>
    <option value="PA"<?php echo $cidPA ?>>Pará</option>
    <option value="PB"<?php echo $cidPB ?>>Paraíba</option>
    <option value="PR"<?php echo $cidPR ?>>Paraná</option>
    <option value="PE"<?php echo $cidPE ?>>Pernambuco</option>
    <option value="PI"<?php echo $cidPI ?>>Piauí</option>
    <option value="RJ"<?php echo $cidRJ ?>>Rio de Janeiro</option>
    <option value="RS"<?php echo $cidRS ?>>Rio Grande do Sul</option>
    <option value="SC"<?php echo $cidSC ?>>Santa Catarina</option>
    <option value="SP"<?php echo $cdSP ?>>São Paulo</option>
    <option value="SE"<?php echo $cidSE ?>>Sergipe</option>
    <option value="TO"<?php echo $cidTO ?>>Tocantins</option>
					</select>




					<?php
			$cidBA = "";
			$cidCE = "";
			$cidDF = "";
			$cidGO = "";
			$cidMA = "";
			$cidMT = "";
			$cidMG = "";
			$cidPA = "";
			$cidPB = "";
			$cidPR = "";
			$cidPE = "";
			$cidPI = "";
			$cidRJ = "";
			$cidRS = "";
			$cidSC = "";
			$ciSP = "";
			$cidSE = "";
			$cidTO = "";
		
			if ($ufEstado == "BA") $cidBA = "selected";
			if ($ufEstado == "CE") $cidCE = "selected";
			if ($ufEstado == "DF") $cidDF = "selected";
			if ($ufEstado == "GO") $cidGO = "selected";
			if ($ufEstado == "MA") $cidMA = "selected";
			if ($ufEstado == "MT") $cidMT = "selected";
			if ($ufEstado == "MG") $cidMG = "selected";
			if ($ufEstado == "PA") $cidPA = "selected";
			if ($ufEstado == "PB") $cidPB = "selected";
			if ($ufEstado == "PR") $cidPR = "selected";
			if ($ufEstado == "PE") $cidPE = "selected";
			if ($ufEstado == "PI") $cidPI = "selected";
			if ($ufEstado == "RJ") $cidRJ = "selected";
			if ($ufEstado == "RS") $cidRS = "selected";
			if ($ufEstado == "SC") $cidSC = "selected";
			if ($ufEstado == "SP") $ciSP = "selected";
			if ($ufEstado == "SE") $cidSE = "selected";
			if ($ufEstado == "TO") $cidTO = "selected";

			?>
				<label for="ufEstado">UF</label>
					<select id="ufEstado"name="ufEstado" value="<?php echo $ufEstado; ?>">
	<option value=""></option>
    <option value="BA"<?php echo $cidBA ?>>BA</option>
    <option value="CE"<?php echo $cidCE ?>>CE</option>
    <option value="DF"<?php echo $cidDF ?>>DF</option>
    <option value="GO"<?php echo $cidGO ?>>GO</option>
    <option value="MA"<?php echo $cidMA ?>>MA</option>
    <option value="MT"<?php echo $cidMT ?>>MT</option>
    <option value="MG"<?php echo $cidMG ?>>MG</option>
    <option value="PA"<?php echo $cidPA ?>>PA</option>
    <option value="PB"<?php echo $cidPB ?>>PB</option>
    <option value="PR"<?php echo $cidPR?>>PR</option>
    <option value="PE"<?php echo $cidPE ?>>PE</option>
    <option value="PI"<?php echo $cidPI ?>>PI</option>
    <option value="RJ"<?php echo $cidRJ ?>>RJ</option>
    <option value="RS"<?php echo $cidRS ?>>RS</option>
    <option value="SC"<?php echo $cidSC ?>>SC</option>
    <option value="SP"<?php echo $ciSP ?>>SP</option>
    <option value="SE"<?php echo $cidSE ?>>SE</option>
    <option value="TO" <?php echo $cidTO ?>>TO</option>
					</select>
				</fieldset><p>
		



			<div class="botao">
					<input type="reset" value="Voltar">
					<input type="submit"  value="Alterar">
					

		

			</form>
		</div>

			<footer class="footer"></footer>
	</body>
 </html>
