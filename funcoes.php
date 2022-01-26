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
     //  $array["horarioEntrada"] = "00:00";
     //  $array["horarioSaida"] = "00:00";
        echo "<tr>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".preencheEntrada($array)."</td>"
            ."<td>".preencheSaida($array)."</td>"
        ."</tr>";
    endfor;
    echo "<h2>$length resultados encontrados </h2>";
   //var_dump($array);
}
function gerarLinhasRelatorio($obj){
    $length = pg_num_rows($obj);
    $now = date("Y-m-d");
    for($row = 0; $row<$length;$row++):
        $array = pg_fetch_array($obj, $row);
        $data = $array['var_data'];
        echo "<br>";
        $subdata = substr($data,0,10);
        if($subdata == $now){
            echo "<tr>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".$array['horario_entrada']."</td>"
            ."<td>".$array['horario_saida']."</td>"
        ."</tr>";
        }
    endfor;
    echo $now;
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

function gerarTabelaRelatorio($data)
{
    echo 
    "<table border='2'>"
        ."<tr>"
            ."<td>Nome</td>"
            ."<td>Placa</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
        ."</tr>";
        gerarLinhasRelatorio(getDadosBD($data));
    "</table>";
}
//date("H:i:s")

//Função para preencher o horário de entrada
//Dentro da tabela da guarita
function  preencheEntrada($array)
{
    if($array['horario_entrada'] == null){
        return "<input type='text' name =".$array['cod_visita']." "
        ."id = ".$array['cod_visita']." value =".$array['cod_visita'].">"
        ."<input type='submit' id=btn".$array['cod_visita']." value='Registrar'> ";
     }

       
     return $array['horario_entrada'];
}

//Função pra preencher o horário de Saída
//Dentro da tabela da guarita
function preencheSaida($array){
    if($array['horario_entrada'] == null)
    {
       return "<input type='button' id='btnSaida' value = 'Registrar'>";// Registrar</button>";
    } elseif($array['horario_saida'] == null){
        return "<input type='button' id='btnSaida' value = 'Registrar'>";//Registrar</button>";
    }
        return $array['horario_saida'];
}
?>