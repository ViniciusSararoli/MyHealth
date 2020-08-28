<html>
	<head>

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
 					border-style: solid;
 					border-color: #BDBDBD;		
				}

			.principal {
				width:100%px;
				height:700px;
				padding-left:100px;
				background:#CEE3F6;
				border-color: #111111;
				border-width: 2px;
 				border-style: solid;
 				border-color: #BDBDBD;	
				}

			label {
    
    display: inline-block;
    width: 90px;
    text-align: right;
}

			.dadosMedico {
				height:460px;/*altura*/
				width:400px;/*largura*/
				position:absolute;
				top:150px;
				left:880px;
				
			}

				

			.dadosPaciente {
				height:460px;
				width:400;
				top:150px;
				right:880px;
				



			}


			#form1{
				height:300px;
				width:400px;
				}


				.footer {
					 
					top:60px;
					left:0px;
					background-color:#A9BCF5;
					width:100%;
					height:30px;
					border-width: 2px;
 					border-style: solid;
 					border-color: #BDBDBD;	
					
								}

		</style>

			<title> Prontuario </title>

	</head>

	<body>

	<?php
	
	if(! isset ($_GET['c']))
		die ("Rotina de alteração!");
	
	$id = $_GET['c'];
	
	include "conexao.php";
	
	$sql="SELECT * FROM prontuario WHERE id = $id";
	
	$registros = mysqli_query($con, $sql) or
		die ("Erro na selecção do $id:"
			.	msqli_error($con) );
			
	$linhas = mysqli_num_rows ($registros);

	if($linhas < 1)
				die( "Time $id nao encontrado.");
			
			
			$dados = mysqli_fetch_array($registros);
	
 $nomePaciente = $dados['nomePaciente'];
	$profissaoPac = $dados ['profissaoPac'];
    $alergias = 	$dados['alergias'];
    $obs = $dados['obs'] ;
	$nomeMedico = $dados ['nomeMedico'];
    $especialista = $dados ['especialista'];
	$dataExame = $dados['dataExame'] ;
    $exames = $dados['exames'] ;			
			
			
?>			
			

			
	
		<div  id= "faixa" border="0">	
		</div>
		
	<div class="principal">
			
			
		<div class="dadosPaciente">
			<br><h3>Prontuário</h3><br><br>

				<form action="prontuario.php" 
				method="post"  
				enctype="multipart/form-data">
				
				
				
				
				
					
					<label for="nomePaciente">Nome do paciente</label>
					<input type="text" 
					name="nomePaciente" 
					maxlength="40" 
					size="50" 
					value="<?php echo $nomePaciente;?>"> 
					<br>
					

					
					<p><label for="profissaoPac">Profissao do paciente</label>
					<input type="text" 
					name="profissaoPac" 
					maxlength="50" 
					value="<?php echo $profissaoPac; ?>"> 
					<br>
					



				<?php
					$Csim="";
					$Cnao="";

					if($alergias =="N")  $Csim  ="checked";
					if($alergias =="N")  $Cnao  ="checked";
				?>
					
					<p><label for = "alergias"> Tem alergia ?</label>
					<input type="radio" name= "alergias" value="sim"  <?php echo $Csim;?> checked> sim 
					<input type= "radio"  name= "alergias" value="nao"<?php echo $Cnao;?> > nao		
		
					<p><label for = "obs">	Observações </label>
				<input type= "textarea" name="obs" placeholder="Ex: o paciente tem alergia a medicação .." 
				id="form1"  value="<?php echo $obs; ?>">
	        
		
					<div class= "dadosMedico">
					<p><label for="nomeMedico">Profissional</label>
					<input type="text" name="nomeMedico" maxlength="20" size="50" value ="<?php echo $nomeMedico;?>" > <br>
				
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
         
            if ($especialista == "Ginecologia") $gine = "selected";
            if ($especialista == "Pisiquiatria") $pisi = "selected";
            if ($especialista == "Dermatologia") $derma = "selected";
            if ($especialista == "Cardiologia") $cardio = "selected";
            if ($especialista == "Oftalmologia") $oftalmo = "selected";
            if ($especialista == "Clínica Geral") $geral = "selected";
            if ($especialista == "Ortopedia") $orto = "selected";
            if ($especialista == "Urologia") $urolo = "selected";
            if ($especialista == "Pediatria") $pedia = "selected";
            if ($especialista == "Edocrinologia") $endocrino = "selected";
            if ($especialista == "Acupuntura") $acupun = "selected";
            if ($especialista == "Otorrinolaringoligia") $otorrino = "selected";
            if ($especialista == "Fonoaudiologia") $fono = "selected";
            if ($especialista == "Odontologia") $odonto = "selected";
            if ($especialista == "Fisioterapia") $fisio = "selected";
        ?>
				
				
				<p><label for="Especialista">Especialista</label>
				
				
					<select name="especialista"  value="<?php echo $especialidade; ?>">
		<option value="Ginecologia e Obstetricia"<?php echo $gine ?>>Ginecologia e Obstetricia</option>
    <option value="Psiquiatria"<?php echo $pisi ?>>Psiquiatria</option>
    <option value="Dermatologia"<?php echo $derma ?>>Dermatologia</option>
    <option value="Cardiologia"<?php echo $cardio ?>>Cardiologia</option>
    <option value="Oftalmologia"<?php echo $oftalmo ?>>Oftalmologia</option>
    <option value="Clínica Geral"<?php echo $geral ?>>Clínica Geral</option>
    <option value="Ortopedia"<?php echo $orto ?>>Ortopedia</option>
    <option value="Urologia"<?php echo $urolo ?>>Urologia</option>
    <option value="Pediatria"<?php echo $pedia ?>>Pediatria</option>
    <option value="Endocrinologia"<?php echo $endocrino ?>>Endocrinologia</option>
    <option value="Acupuntura"<?php echo $acupun ?>>Acupuntura</option>
    <option value="Otorrinolaringologia"<?php echo $otorrino ?>>Otorrinolaringologia</option>
    <option value="Fonoaudiologia"<?php echo $fono ?>>Fonoaudiologia</option>
    <option value="Odontologia"<?php echo $odonto ?>>Odontologia</option>
    <option value="Fisioterapia"<?php echo $fisio ?>>Fisioterapia</option>
                    </select>
					<p><label for="dataExame">Data do exame</label>
					<input type="date" name="dataExame" maxlength="20" size="10" value ="<?php echo $dataExame; ?>"> <br>
					
					<p><label for="exames">Exames</label>
					<select name="exames" > 
					<option value="raiox">Raio X </option> 
					<option value="examedesangue">Exame de Sangue</option>
					<option value="biopsia">Biopsia</option> <br>
					
					</select>
	
				<div class="botao">
					<input type="reset"value="Voltar">
					<input type="submit" value="Enviar">
			</div>
			</div>
		</div>
		
		
	

		</form>
	</div>				
		
		
		

			<footer class="footer"></footer>

	</body>
</html>