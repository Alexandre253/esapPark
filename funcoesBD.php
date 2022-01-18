<?
include_once 'conectaBD';

//retorna as linhas da tabela
function resultQuery(){
$result = pg_query(resource $conn, string $query);
for($i;$i<pg_num_rows($result;$i++){
 $array[$i] = pg_fetch_array($result, $i);
}
echo $array['nome'];
pg_close($conn);

}

//insere os dados na tabela
function inserirTabela($documento,$nome,$empresa,$cliente,$coletaEntrega){
$query = "INSERT INTO planilha (data, documento, nome, transportadora, placa, horarioChegada, cliente, 
coletaEntrega) values()";
pg_query($query);
pg_close($conn);
} 
?>