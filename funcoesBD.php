<script>
    function clickMe(){
        
    }
</script>
<?php
include_once 'conectaBD.php';
//retorna as linhas da tabela
//function resultQuery($query){
function getDadosBD(){
    $conn = conexaoBanco();
    $row = 1;
    $query = "SELECT * FROM planilha order by cod_visita asc";
    $result = pg_query($conn,$query);
    pg_close($conn);
return $result;
}
function getDadosBDRelatorio(){
    $conn = conexaoBanco();
    $row = 1;
    $query = "SELECT * FROM planilha order by cod_visita asc ";
    $result = pg_query($conn,$query);
    return $result;
}
function inserirTabela($documento,$nome,$empresa,$cliente,$coletaEntrega){
$query = "INSERT INTO planilha (varData, documento, nome, transportadora, placa, horarioChegada, cliente, 
coletaEntrega) values()";
pg_query($query);
pg_close($conn);
} 
//função que gera o conn
//conn é a variável que contém a conexão com o banco
function conexaoBanco(){
    $host = 'localhost';
    $banco = 'esapbd';
    $usuario = 'postgres';
    $senha = 'alexandre11';
    $connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
    return pg_connect($connString);
}
//Função pra atualizar o valor do horário de entrada
//Dentro da tabela da guarita


?>