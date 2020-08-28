<?php
$url = "localhost";
$user = "root";
$senha = "";
$db = "myhealth";

$con = mysqli_connect($url, $user, $senha);



mysqli_select_db($con, $db) or 
die ("Erro na selação do banco de dados $db" . 
mysqli_error($con)	);

	
?>
