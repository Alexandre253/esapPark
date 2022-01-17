<?php
//endereço
//nome do BD
//usuario
//senha

$endereco = 'localhost';
$banco = 'esapbd';
$usuario = 'postgres';
$senha = 'alexandre11';

try{
	//sgbd:host;port;dbname
	//usuario
	//senha
	
	$pdo = new PDO("pgsql:host=$endereço;port=5432;dbname=$banco", $usuario, $senha,[PDO::ATTR_ERRMODE => 
	PDO::ERRMODE_EXCEPTION]);
	
	echo "Conectado!";
	
}catch(PDOException $e){
	echo "Falha na conexão.";
	die($e->getMessage());
	
}
?>