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
 					/*border-style: solid;*/
 					border-color: #BDBDBD;		
				}

			#faixa h3 {
				padding: 18px; 
			}

			.principal {
				width:100%;
				height:440px;
				padding-left:0px;
				background:#CEE3F6;
				border-color: #111111;
				border-width: 2px;
 				/*border-style: solid;*/
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
 			/*	border-style: solid;*/
 				border-color: #BDBDBD;	
					
								}


 		</style>
 	</head>
 <body>
 
 <?php

 	if(! isset ($_GET['c']))
		die ("Rotina de alteração!");

	$id = $_GET['c'];

	//echo "Alterar paciente cadastrado: $id <br>";
	include "Gravar Alteracao.php";

	

	$sql="SELECT * FROM marcacaoconsulta WHERE id = $id ";

	//die($sql);

	$registros = mysqli_query($con , $sql) or 
		die ("Erro na Sele��o do $id: " 
			. mysqli_error($con)	);

	$linhas = mysqli_num_rows ($registros);

	if ($linhas < 1)
	{
		die ('Consulta $id n�o existente - Altera��o encerrada!');
	}

	$dados = mysqli_fetch_array($registros);

	//$id = $dados['id'];
	$nomePaciente = $dados['nomePaciente'];
	$cpfPaciente = $dados['cpfPaciente'];
	$especialidade = $dados['especialidade'] ;
	$Profissional = $dados['Profissional'];
	$data = $dados['data'] ;
	$hora = $dados['hora'] ;
	$emailPaciente = $dados['emailPaciente'];
	$tel1 = $dados['tel1'];
	$tel2 = $dados['tel2'];
	$observacoes = $dados['observacoes'];

	//echo "Dados da consulta $id alterada com sucesso. <hr>";
	//echo "<a href='Listagem.php'>Listagem de pacientes</a>";
?>
	<!--Clique <a href='Listagem.php'>aqui</a>para listagem de pacientes.-->
	
	<div  id= "faixa">	
	
	<h3>Marcação Consulta</h3>
	
		</div>
		
		<div class="principal">

			<!--<br><h3>Marca��o Consulta</h3><br><br>-->
			
			<div class="Marcacao">

				<form action="Marcacao Consulta.php" method="post"  enctype="multipart/form-data">

					<br><label for="nomePaciente">Nome Completo</label>
					<input type="text" name="nomePaciente" maxlength="40" size="90"
					value="<?php echo $nomePaciente; ?>">
					
					<p><label 	for="cpfPaciente">CPF</label>
					<input 	type="text"
							maxlength="10" 
							name="cpfPaciente"
							class="form-control cpf-mask"
							placeholder="Ex.: 000.000.000-00"
							value="<?php echo $cpfPaciente; ?>">
							
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
		
			if ($especialidade == "Ginecologia") $gine = "selected";
			if ($especialidade == "Pisiquiatria") $pisi = "selected";
			if ($especialidade == "Dermatologia") $derma = "selected";
			if ($especialidade == "Cardiologia") $cardio = "selected";
			if ($especialidade == "Oftalmologia") $oftalmo = "selected";
			if ($especialidade == "Cl�nica Geral") $geral = "selected";
			if ($especialidade == "Ortopedia") $orto = "selected";
			if ($especialidade == "Urologia") $urolo = "selected";
			if ($especialidade == "Pediatria") $pedia = "selected";
			if ($especialidade == "Edocrinologia") $endocrino = "selected";
			if ($especialidade == "Acupuntura") $acupun = "selected";
			if ($especialidade == "Otorrinolaringoligia") $otorrino = "selected";
			if ($especialidade == "Fonoaudiologia") $fono = "selected";
			if ($especialidade == "Odontologia") $odonto = "selected";
			if ($especialidade == "Fisioterapia") $fisio = "selected";
		?>
		
		<p><label for="especialidade">Especialidade</label>
					<select id="especialidade" name="especialidade" >
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
					
		
		<p><label for="Profissional">Profissional</label>
					<input type="text" name="Profissional" maxlength="20" size="50"
					value="<?php echo $Profissional; ?>">
					
					<p><label for="Data">Data</label>
					<input type="date" name="data" class="form-control date-mask"
					value="<?php echo $data; ?>">
					
					<p><label for="Hora">Hora</label>
					<input type="time" name="hora" 
					value="<?php echo $hora; ?>">
				
					<p><label for="emailPaciente">E-mail</label>
					<input type="email" name="emailPaciente" maxlength="40"
					value="<?php echo $emailPaciente; ?>">

					<p><label for="tel1">Telefone</label>
					<input type="text" maxlength="11" name="tel1"
					class="form-control phone-ddd-mask" placeholder="Ex.: 1100000000"
					value="<?php echo $tel1; ?>">

					<p><label for="tel2">Telefone</label>
					<input type="text" maxlength="11" name="tel2" 
					class="form-control phone-ddd-mask" placeholder="Ex.: 1100000000"
					value="<?php echo $tel2; ?>">

					<p><label for="observacoes">Observações</label>
					<textarea name="observacoes"
					class="textarea"><?php echo $observacoes;?></textarea>
					<p>
					<br>
					



			<div class="botao">
					<input type="reset" name="voltar" value="Voltar">
					<input type="submit" name="enviar" value="Alterar">
			</div>
				
			</div>

			</form>
		<HR></div>

			<footer class="footer"></footer>

	</body>
</html>
		
		
		
		