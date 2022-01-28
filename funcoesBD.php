<?php
include_once 'conectaBD.php';
include_once 'funcoes.php';
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
function verifExistsPlaca($placa){
    $conn = conexaoBanco();
    $query = "SELECT * FROM planilha where placa = '$placa' order by cod_visita desc";
    $result = pg_query($conn, $query);
    if(pg_num_rows($result) == 0){
        return null;
    }
    return  pg_fetch_array($result, 0);

}
function inserirTabela($conn, $nome,$doc,$emp,$placa,$cliente,$nf,$dest){
$string ="INSERT INTO public.planilha("
	."doc, nome, emp, placa, cliente,var_data,nf,dest)"
	."VALUES ('$doc', '$nome', '$emp', '$placa', '$cliente', now(), '$nf', '$dest');";
$result =pg_query($conn, $string);
//var_dump($result);
//pg_close($conn);
}
function inserirGuarita($conn, $placa, $nome, $doc, $emp, $dest)
{
    $query = "INSERT INTO public.planilha(var_data, doc, nome, emp, placa, dest)"
            ."VALUES (now(), '$doc', '$nome', '$emp', '$placa', '$dest')";
        $result = pg_query($conn, $query);
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