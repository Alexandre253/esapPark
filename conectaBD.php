<?php

$host = 'localhost';
$banco = 'esapbd';
$usuario = 'postgres';
$senha = 'alexandre11';
$dns = "pgsql:host=$host;port=5432;dbname=$banco;";

try{
	$pdo = new PDO($dns,$usuario,$senha,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	echo "Conectado!";
	
}catch(PDOException $e){
	echo "Falha na conexão.";
	die($e->getMessage());
	
}
$connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
$conn = pg_connect($connString);
?>