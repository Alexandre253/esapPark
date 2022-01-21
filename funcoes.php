<?php
include 'funcoesBD.php';
//preencher o array de teste

//Função pra gerar a tabela com nome, placa, horário de entrada, horário de saída
//Usando os dados vindo da select do banco como parâmetro
//A tabela é gerada por html 

function gerarTabelaGuarita($array)
{
    $row = 1;
    echo 
    "<table border='2'>"
        ."<tr>"
            ."<td>Nome</td>"
            ."<td>Placa</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
        ."</tr>";
         $rs = pg_fetch_array($array,$row);
        echo "<tr>"
            ."<td>".$rs["nome"]."</td>"
            ."<td>".$rs["placa"]."</td>"
            ."<td>".preencheEntrada($rs["horarioEntrada"])."</td>"
            ."<td>".preencheSaida($rs["horarioEntrada"],$rs["horarioSaida"])."</td>"
        ."</tr>"
    ."</table>";
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
//função que faz conexão com o banco de dados
//Mas aparentemente não serve de nada
function conexaoBanco(){
    $pdo = new PDO("mysql:host=HOST;dbname=BASE", "USUARIO", "SENHA"); 
}

?>