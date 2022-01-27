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
function inserirTabela($conn, $nome,$doc,$emp,$placa,$cliente,$nf){
$query = "INSERT INTO public.planilha (var_data, doc, nome, emp, placa, cliente)0"
."VALUES (now(), $doc, $nome, $emp, $placa, $cliente)";
$string ="INSERT INTO public.planilha("
	."doc, nome, emp, placa, cliente,var_data)"
	."VALUES ('$doc', '$nome', '$emp', '$placa', '$cliente', now());";
$result =pg_query($conn, $string);
//var_dump($result);
//pg_close($conn);
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
function atualizaGuarita($conn,$cod_visita,$horario){
    $query = "UPDATE public.planilha SET $horario = now() WHERE cod_visita = $cod_visita";
    $result =pg_query($conn, $query);
    //var_dump($result);
    //pg_close($conn);
    } 

?>