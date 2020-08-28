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
					height : 65px;
					padding :0px;
					border-width: 0px;
 					/*border-style: solid; */
 					border-color: #BDBDBD;		
				}
				
				#faixa h3 {
				padding: 18px; 
			}

			.principal {
				width:100%;
				height:480px;
				padding-left:1px;
				background:#CEE3F6;
				border-color: #111111;
				border-width: 4px;
 				/*border-style: solid;*/
 				border-color: #BDBDBD;	
				}

			label {
    
    display: inline-block;
    width: 150px;
    text-align: right;
}

			.dado input.textarea {
					float: left;
					height:380px;
					position: relative;
					left: 980px;
					}

				

			.botao {
			
			padding: 10px;
				float: right;

				}

			

				.footer {
				top:90px;
				left:0px;
				background-color:#A9BCF5;
				width:100%;
				margin-left: px;
				height:60px;
				border-width: 0px;
 			/*	border-style: solid;*/
 				border-color: #BDBDBD;	
					
								}
								
						
		</style>
 	</head>
 <body>
 		
 <?php

 	if(! isset ($_GET['c']) )
		die ("Rotina de alteração!");

	$id = $_GET['c'];

	//echo "Alterar Medico cadastrado: $id <br>";
	include "conexao.php";

	

	$sql="SELECT * FROM cadastroMedicos WHERE id = $id ";

	//die($sql);

	$registros = mysqli_query($con , $sql) or 
		die ("Erro na Seleção do $id: " 
			. mysqli_error($con)	);

	$linhas = mysqli_num_rows ($registros);

	if ($linhas < 1)
		die ("Medico $id não existente - Alteração encerrada!");
	

	$dados = mysqli_fetch_array($registros);

	//$id = $dados['id'];
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

	//echo "Dados do Medico $id alterado com sucesso. <hr>";
	//echo "<a href='listagem.php'>Listagem de Medicos</a>";
?>
		<!--Clique <a href='listagem.php'>aqui</a>para listagem de Medicos.-->
		<div  id= "faixa" >
			
		<h3>Alteração de Dados</h3>
		
		</div>
		
		<div class="principal">

			<div class="dados">
			
				<fieldset><br><br>
				<form action="conexao.php" method="post"  
				enctype="multipart/form-data">
				<fieldset>
				<legend>Cadastro Medico</legend>
				<label for="nomeMedico">Nome do Médico</label>
					<input type="text" name="nomeMedico" maxlength="40" size="90"
					value="<?php echo $nomeMedico; ?>">
					
					<input   type="file"
                        name="foto"><p><br>


					<label 	for="crm">CRM</label>
					<input 	type="text" 
							maxlength="9"
							name="crm"
							value="<?php echo $crm; ?>">
							
							
								<label 	for="cpfMed">CPF</label>
					<input 	type="text"
							maxlength="10" 
							name="cpfMed"
							class="form-control cpf-mask"
							placeholder="Ex.: 000.000.000-00"
							value="<?php echo $cpfMed; ?>">

			</div>


						<?php
			$ufAC = "";
			$ufAL = "";
			$ufAP = "";
			$ufAM = "";
			$ufBA = "";
			$ufCE = "";
			$ufDF = "";
			$ufES = "";
			$ufGO = "";
			$ufMA = "";
			$ufMT = "";
			$ufMS = "";
			$ufMG = "";
			$ufPA = "";
			$ufPB = "";
			$ufPR = "";
			$ufPE = "";
			$ufPI = "";
			$ufRJ = "";
			$ufRN = "";
			$ufRS = "";
			$ufRO = "";
			$ufRR = "";
			$ufSC = "";
			$ufSP = "";
			$ufSE = "";
			$ufTO = "";
		
				if ($ufMed == "AC") $ufAC = "selected";
			if ($ufMed == "AL") $ufAL = "selected";
			if ($ufMed == "AP") $ufAP = "selected";
			if ($ufMed == "AM") $ufAM = "selected";
			if ($ufMed == "NA") $ufBA = "selected";
			if ($ufMed == "CE") $ufCE = "selected";
			if ($ufMed == "DF") $ufDF = "selected";
			if ($ufMed == "ES") $ufES = "selected";
			if ($ufMed == "GO") $ufGO = "selected";
			if ($ufMed == "MA") $ufMA = "selected";
			if ($ufMed == "MT") $ufMT = "selected";
			if ($ufMed == "NS") $ufMS = "selected";
			if ($ufMed == "MG") $ufMG = "selected";
			if ($ufMed == "PA") $ufPA = "selected";
			if ($ufMed == "PB") $ufPB = "selected";
			if ($ufMed == "PR") $ufPR = "selected";
			if ($ufMed == "PE") $ufPE = "selected";
			if ($ufMed == "PI") $ufPI = "selected";
			if ($ufMed == "RJ") $ufRJ = "selected";
			if ($ufMed == "RN") $ufRN = "selected";
			if ($ufMed == "RO") $ufRS = "selected";
			if ($ufMed == "RR") $ufRR = "selected";
			if ($ufMed == "SC") $ufSC = "selected";
			if ($ufMed == "SP") $ufSP = "selected";
			if ($ufMed == "SE") $ufSE = "selected";
			if ($ufMed == "TO") $ufTO = "selected";

			?>
				<p><label for="uf">UF</label>
					<select id="UF" 
							name="ufMed">
	<option value=""></option>
	<option value="AC" <?php echo $ufAC ?>>Acre</option>
	<option value="AL" <?php echo $ufAL ?>>Alagoas</option>
	<option value="AP" <?php echo $ufAP ?>>Amapa</option>
	<option value="AM" <?php echo $ufAM ?>>Amazonas</option>
    <option value="BA" <?php echo $ufBA ?>>Bahia</option>
    <option value="CE" <?php echo $ufCE ?>>Ceará</option>
	<option value="DF" <?php echo $ufDF ?>>Distrito Federal</option>
	<option value="ES" <?php echo $ufES ?>>Espirito Santo</option>
    <option value="GO" <?php echo $ufGO ?>>Goiás</option>
    <option value="MA" <?php echo $ufMA ?>>Maranhão</option>
    <option value="MT" <?php echo $ufMT ?>>Mato Grosso</option>
	<option value="MS" <?php echo $ufMS ?>>Mato Grosso do Sul</option>
    <option value="MG" <?php echo $ufMG ?>>Minas Gerais</option>
    <option value="PA" <?php echo $ufPA ?>>Pará</option>
    <option value="PB" <?php echo $ufPB ?>>Paraíba</option>
    <option value="PR" <?php echo $ufPR ?>>Paraná</option>
    <option value="PE" <?php echo $ufPE ?>>Pernambuco</option>
    <option value="PI" <?php echo $ufPI ?>>Piauí</option>
    <option value="RJ" <?php echo $ufRJ ?>>Rio de Janeiro</option>
	<option value="RN" <?php echo $ufRN ?>>Rio Grande do Norte</option>
    <option value="RS" <?php echo $ufRS ?>>Rio Grande do Sul</option>
	<option value="RO" <?php echo $ufRO ?>>Rondonia</option>
	<option value="RR" <?php echo $ufRS ?>>Roraima</option>
    <option value="SC" <?php echo $ufSC ?>>Santa Catarina</option>
    <option value="SP" <?php echo $ufSP ?>>São Paulo</option>
    <option value="SE" <?php echo $ufSE ?>>Sergipe</option>
    <option value="TO" <?php echo $ufTO ?>>Tocantins</option>
					</select>
					
						<br><br><br>
			
			<?php
            $gine = "";
            $pisi = "";
            $derma = "";
            $cardio = "";
            $oftalmo = "";
            $geral = "";
            $orto = "";
            $urolo = "";
            $pedia = "";
            $endocrino = "";
            $acupun = "";
            $otorrino = "";
            $fono = "";
            $odonto = "";
            $fisio= "";
         
            if ($cbos == "Ginecologia") $gine = "selected";
            if ($cbos == "Pisiquiatria") $pisi = "selected";
            if ($cbos == "Dermatologia") $derma = "selected";
            if ($cbos == "Cardiologia") $cardio = "selected";
            if ($cbos == "Oftalmologia") $oftalmo = "selected";
            if ($cbos == "Cl�nica Geral") $geral = "selected";
            if ($cbos == "Ortopedia") $orto = "selected";
            if ($cbos == "Urologia") $urolo = "selected";
            if ($cbos == "Pediatria") $pedia = "selected";
            if ($cbos == "Edocrinologia") $endocrino = "selected";
            if ($cbos == "Acupuntura") $acupun = "selected";
            if ($cbos == "Otorrinolaringoligia") $otorrino = "selected";
            if ($cbos == "Fonoaudiologia") $fono = "selected";
            if ($cbos == "Odontologia") $odonto = "selected";
            if ($cbos == "Fisioterapia") $fisio = "selected";
        ?>
         
        <p><label for="especialidade">CBOS(Especialidade)</label>
                    <select id="especialidade" name="cbos" >
    <option value="Ginecologia e Obstetricia"<?php echo $gine ?>>Ginecologia e Obstetricia</option>
    <option value="Psiquiatria"<?php echo $pisi ?>>Psiquiatria</option>
    <option value="Dermatologia"<?php echo $derma ?>>Dermatologia</option>
    <option value="Cardiologia"<?php echo $cardio ?>>Cardiologia</option>
    <option value="Oftalmologia"<?php echo $oftalmo ?>>Oftalmologia</option>
    <option value="Cl�nica Geral"<?php echo $geral ?>>Cl�nica Geral</option>
    <option value="Ortopedia"<?php echo $orto ?>>Ortopedia</option>
    <option value="Urologia"<?php echo $urolo ?>>Urologia</option>
    <option value="Pediatria"<?php echo $pedia ?>>Pediatria</option>
    <option value="Endocrinologia"<?php echo $edocrino ?>>Endocrinologia</option>
    <option value="Acupuntura"<?php echo $acupun ?>>Acupuntura</option>
    <option value="Otorrinolaringologia"<?php echo $otorrino ?>>Otorrinolaringologia</option>
    <option value="Fonoaudiologia"<?php echo $fono ?>>Fonoaudiologia</option>
    <option value="Odontologia"<?php echo $odonto ?>>Odontologia</option>
    <option value="Fisioterapia"<?php echo $fisio ?>>Fisioterapia</option>
                    </select>


				<?php
				$exe ="";
				$soli ="";
				$amb ="";
				
					if ($exe == "Executante")
					$exe = "selected";

					if ($soli == "Solicitante")
					$soli = "selected";

					if ($amb == "Ambos")
					$amb = "selected";

				
				?>

				<label for="tipoMed">Tipo</label>
						<select name="tipoMed" >
							<option value=""></option>
							<option value="A" <?php echo $exe; ?>>Executante</option>
							<option value="B" <?php echo $soli; ?>>Solicitante</option>
							<option value="N" <?php echo $amb; ?>>Ambos</option>
						</select>

				<label for="cns">CNS</label>
					<input type="number" name="cns" maxlength="30"
					value="<?php echo $cns; ?>">
			<fieldset><br>
			
			<fieldset>
				<p><label for="emailMed">E-mail</label>
					<input type="email" name="emailMed" maxlength="40"
					value="<?php echo $emailMed; ?>">

					<label for="tel1Med">Telefone</label>
					<input type="text" maxlength="11" name="tel1Med"
					class="form-control phone-ddd-mask" placeholder="Ex.: 1100000000"
					value="<?php echo $tel1Med; ?>">

					<label for="tel2Med">Telefone</label>
					<input type="text" maxlength="11" name="tel2Med" 
					class="form-control phone-ddd-mask" placeholder="Ex.: 1100000000"
					value="<?php echo $tel2Med; ?>">

                       
					    <br><br>
					   
					<label for="bancoMed">Banco</label>
					<input type="number" name="bancoMed" maxlength="8"
					value="<?php echo $bancoMed; ?>">
					

					<label for="agenciaMed">Agencia</label>
					<input type="number" name="agenciaMed" maxlength="8"
					value="<?php echo $agenciaMed; ?>">

					<label for="contaMed">Conta</label>
					<input type="number" maxlength="11" name="contaMed"
					value="<?php echo $contaMed; ?>"><p><br>


					 <p><label for="observacoes">Observações</label>
                    <textarea name="obs"
                    class="textarea"><?php echo $obs;?></textarea>
                    <p>
                    <br>
				</fieldset><br>
		


			<div class="botao">
					<input type="reset" name="voltar" value="Voltar">
					<input type="submit" name="alterar" value="Alterar">
			</div>
				
			</div>

			</form>
		<HR></div>

			<footer class="footer"></footer>

	</body>
</html>
