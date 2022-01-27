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
        echo "<form method='POST' action='atualizaguarita.php'>" 
            ."<tr>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".preencheEntrada($array)."</td>"
            ."<td>".preencheSaida($array)."</td>"
        ."</tr>"
        ."</form>";
    endfor;
    echo "<h2>$length resultados encontrados </h2>";
   //var_dump($array);
}
function gerarLinhasRelatorio($obj, $now){
    $length = pg_num_rows($obj);
    $linhas = 0;
    for($row = 0; $row<$length;$row++):
        $array = pg_fetch_array($obj, $row);
        $data = $array['var_data'];
        $subdata = substr($data,0,10);
        if($subdata == $now){
            echo "<tr>"
            ."<td>".substr($array['var_data'],0,10)."</td>"
            ."<td>".$array['doc']."</td>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array["emp"]."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".substr($array["var_data"],11,5)."</td>"
            ."<td>".substr($array['horario_entrada'], 11,5)."</td>"
            ."<td>".substr($array['horario_saida'],11,5)."</td>"
            ."<td>".$array['cliente']."</td>"
            ."<td>".$array['nf']."</td>"
        ."</tr>";
        $linhas++;
        
        }
        
    endfor;
    echo "<h2>$linhas resultados encontrados </h2>";
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
            ."<td>Data</td>"
            ."<td>Documento</td>"
            ."<td>Nome</td>"
            ."<td>Empresa</td>"
            ."<td>Placa</td>"
            ."<td>Horario de Chegada</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
            ."<td>Cliente</td>"
            ."<td>Nota Fiscal</td>"
        ."</tr>";
        gerarLinhasRelatorio(getDadosBDRelatorio(),$data);
    "</table>";
}
//date("H:i:s")

//Função para preencher o horário de entrada
//Dentro da tabela da guarita
function  preencheEntrada($array)
{
    if($array['horario_entrada'] == null){
        return "<input type='hidden' name='cod_visita' value='".$array['cod_visita']."'>"
        ."<input type='hidden' name='horario' value='horario_entrada'>"
        ." <input type='submit' name=btn".$array['cod_visita']." value='Registrar'> ";
     }
     $horario_entrada = substr($array['horario_entrada'], 11 ,5);
     return $horario_entrada;
}

//Função pra preencher o horário de Saída
//Dentro da tabela da guarita
function preencheSaida($array){
    if($array['horario_entrada'] == null)
    {
       return "<input type='button' id='btnSaida' disabled value = 'Registrar'>";
    } elseif($array['horario_saida'] == null){
        return "<input type='hidden' name='cod_visita' value='".$array['cod_visita']."'>"
        ."<input type='hidden' name='horario' value='horario_saida'>"
        ."<input type='submit' id='btnSaida' value = 'Registrar'>";
    }
        $horario_saida = substr($array['horario_saida'], 11, 5);
        return $horario_saida;
}
?>