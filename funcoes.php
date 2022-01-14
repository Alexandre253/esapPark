<?php

//preencher o array de teste

function getArray(){
    $array = array(
        "data" => "14/01/2022",
        "documento" => "012.345.678-90",
        "nome" => "Michael de Santa",
        "transportadora" => "Santa Enterprises",
        "placa" => "CVP-8897",
        "horarioChegada" => "09:57",
        "horarioEntrada" => null,
        "horarioSaida" => null,
        "cliente" => "Philips Enterprise",
        "entregaColeta" => "coleta"
    );
 return $array;   
}
//Função pra gerar a tabela com nome, placa, horário de entrada, horário de saída

function gerarTabelaGuarita($array)
{
    echo 
    "<table border='2'>"
        ."<tr>"
            ."<td>Nome</td>"
            ."<td>Placa</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
        ."</tr>"
        ."<tr>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".preencheEntrada($array["horarioEntrada"])."</td>"
            ."<td>".preencheSaida($array["horarioEntrada"],$array["horarioSaida"])."</td>"
        ."</tr>"
    ."</table>";
}
//date("H:i:s")

//Função para preencher o horário de entrada
function  preencheEntrada($entrada)
{
    if($entrada == null){
        return "<button id='btnEntrada' onClick=".atualizarEntrada().">Registrar</button>";
    }
        return $entrada;
}
//Função pra atualizar o valor do horário de entrada
function atualizarEntrada(){
    $array[Entrada]
}
//Função pra preencher o horário de Saída
function preencheSaida($entrada, $saida){
    if($entrada == null)
    {
       return "<button id='btnSaida' disabled> Registrar</button>";
    } elseif($saida == null){
        return "<button id='btnSaida'>Registrar</button>";
    }
        return $saida;
}
//função que faz conexão com o banco de dados
function conexaoBanco(){
    $pdo = new PDO("mysql:host=HOST;dbname=BASE", "USUARIO", "SENHA"); 
}
//função para selecionar dados do banco de dados
function buscaDados(){
    $sql = "SELECT * FROM ESAP ";
    $result = conn->query($sql);
    return $result;
}

?>