<?php
include_once 'conectaBD.php';
$host = 'localhost';
$banco = 'esapbd';
$usuario = 'postgres';
$senha = 'alexandre11';
$connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
$conn = pg_connect($connString);
//retorna as linhas da tabela
//function resultQuery($query){
function getDadosBD(){
    $host = 'localhost';
    $banco = 'esapbd';
    $usuario = 'postgres';
    $senha = 'alexandre11';
    $connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
    $conn = pg_connect($connString);
    $row = 1;
    $query = "SELECT * FROM planilha";
    $result = pg_query($conn,$query);
    //echo $rs['varData'];
    //echo($rs["varData"]);
    pg_close($conn);
return $result;
}
//echo(getDadosBD());
function inserirTabela($documento,$nome,$empresa,$cliente,$coletaEntrega){
$query = "INSERT INTO planilha (varData, documento, nome, transportadora, placa, horarioChegada, cliente, 
coletaEntrega) values()";
pg_query($query);
pg_close($conn);
} 
?>