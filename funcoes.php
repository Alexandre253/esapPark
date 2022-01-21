<?php
include 'funcoesBD.php';
//preencher o array de teste

//Função para gerar o cabeçalho da tabela da guarita
function GerarCabecalhoGuarita(){
    
}

//função para gerar as linhas da tabela
// Os dados vem em forma de objeto, do banco de dados psql
function gerarLinhas($obj){
    $length = pg_num_rows($obj);
    for($row = 0;$row<$length;$row++):
        $array = pg_fetch_array($obj,$row);
        echo "<tr>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".preencheEntrada($array["horarioEntrada"])."</td>"
            ."<td>".preencheSaida($array["horarioEntrada"],$array["horarioSaida"])."</td>"
        ."</tr>";
    endfor;

}

//Função pra gerar a tabela com nome, placa, horário de entrada, horário de saída
//Usando os dados vindo da select do banco como parâmetro
//A tabela é gerada por html 
function gerarTabelaGuarita()
{
    echo 
    "<table border='2'>"
        ."<tr>"
            ."<td>Nome</td>"
            ."<td>Placa</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
        ."</tr>";
        gerarLinhas(getDadosBD());
    "</table>";
}
//date("H:i:s")

//Função para preencher o horário de entrada
//Dentro da tabela da guarita
function  preencheEntrada($entrada)
{
    if($entrada == null){
        return "<button id='btnEntrada' onClick=".atualizarEntrada().">Registrar</button>";
    }
        return $entrada;
}
//Função pra atualizar o valor do horário de entrada
//Dentro da tabela da guarita

function atualizarEntrada(){
    $array["horarioEntrada"] = date("H:i:s");
}
//Função pra preencher o horário de Saída
//Dentro da tabela da guarita
function preencheSaida($entrada, $saida){
    if($entrada == null)
    {
       return "<button id='btnSaida' disabled> Registrar</button>";
    } elseif($saida == null){
        return "<button id='btnSaida'>Registrar</button>";
    }
        return $saida;
}
?>