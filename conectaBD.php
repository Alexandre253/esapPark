<?php

$host = 'localhost';
$banco = 'esapbd';
$usuario = 'postgres';
$senha = 'alexandre11';
$dns = "pgsql:host=$host;port=5432;dbname=$banco;";

$connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
$conn = pg_connect($connString);
?>