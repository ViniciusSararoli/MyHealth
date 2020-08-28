<?php

$url = 'localhost';
$user = 'root';
$senha = '';

$con = mysqli_connect($url, $user, $senha);

$db = 'myhealth';

mysqli_select_db($con, $db) or 
	die ("Erro na selação do banco de dados $db" . 
		mysqli_error($con)	);