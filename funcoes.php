<?php
include 'funcoesBD.php';
//preencher o array de teste

//Função para gerar o cabeçalho da tabela da guarita
function GerarCabecalhoGuarita(){
    
}

//função para gerar as linhas da tabela
// Os dados vem em forma de objeto, do banco de dados psql
function gerarLinhas($obj){
    $now = date('Y-m-d');
    $length = pg_num_rows($obj);
    for($row = 0;$row<$length;$row++):
        $array = pg_fetch_array($obj,$row);
        echo "<form method='POST' action='atualizaguarita.php'>" 
            ."<tr>"
            ."<td>".$array["nome"]."</td>"
            ."<td>".$array['emp']."</td>"
            ."<td>".$array["placa"]."</td>"
            ."<td>".preencheEntrada($array)."</td>"
            ."<td>".preencheSaida($array)."</td>"
            ."<td>".$array['dest']."</td>"
        ."</tr>"
        ."</form>";
    endfor;
    $texto = " 'Deseja mesmo fazer isso?')";
    echo"</table>"
        ."<br>"
        ."<form onsubmit='return confirm()' action='guaritacadastro.php' method='post'>"
        ."<lable for = 'placa'>INSERIR PLACA NOVA:</lable>" 
        ." <input type='text' name='placa' placeholder='AAA-0000' style='text-transform:uppercase'>"
        ." <input type='submit' value='INSERIR'>"
        ."</form>";
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
            ."<td>Empresa</td>"
            ."<td>Placa</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
            ."<td>Destino</td>"
        ."</tr>";
        gerarLinhas(buscaDadosGuarita());
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
        
        gerarLinhasRelatorio(getDadosBD(),$data);
    "</table>";
}


function gerarLinhasView($obj){
    //$now = date('Y-m-d');
    $length = pg_num_rows($obj);
    $linhas = 0;
    for($row = 0; $row<$length;$row++):
        $array = pg_fetch_array($obj, $row);
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
            ."<td>".preencheAutorizar($array)."</td>"
            ."<td>".preencheCancelar($array)."</td>"
        ."</tr>";
    endfor;
}

//função para gerar a tabela VIEW 
function gerarView()
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
            ."<td>Autorizar</td>"
            ."<td>Cancelar</td>"
        ."</tr>";
        gerarLinhasView(buscaDadosView());
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

function preencheAutorizar($array){
    if($array['autorizado'] == "t")
    {
        return "Autorizado";
    }elseif($array['cancelado'] == "t")
    {
        return "Cancelado";
    }
    return "<form onsubmit='return confirm()' action='atualizaview.php' method ='POST'>"
    ."<input type='hidden' name='cod_visita' value='".$array['cod_visita']."'>"
    ."<input type='hidden' name='bool' value='autorizado'>"
    ."<input type = 'submit' value = 'Autorizar'>"
    ."</form>";
}
function preencheCancelar($array){
    if($array['cancelado'] =="t")
    {
        return "Cancelado";
    }elseif($array['autorizado'] == "t")
    {
        return "Autorizado";
    }
    return "<form onsubmit='return confirm()' action='atualizaview.php' method ='POST'>"
    ."<input type='hidden' name='cod_visita' value='".$array['cod_visita']."'>"
        ."<input type='hidden' name='bool' value='cancelado'>" 
        ."<input type = 'submit' value = 'Cancelar'>"
        ."</form>";
}

function gerarCadastroGuarita($array, $placa){
    if($array == null)
    {
    echo "<h2>PLACA NÃO CONSTA NO SISTEMA, FAÇA O CADASTRO</h2>"
        ."<lable for ='placa'>Placa</lable>
        <input type='text' name='placa' value ='$placa' placeholder='AAA-0000' style='text-transform:uppercase' required> <br><br>
        <lable for ='doc'>Documento</lable>
        <input type='text' name='doc' style='text-transform:uppercase' required> <br><br>
        <lable for ='nome'>Nome</lable>
        <input type='text' name='nome' style='text-transform:uppercase' required> <br><br>
        <lable for ='Empresa'>Empresa do motorista</lable>
        <input type='text' name='emp' style='text-transform:uppercase' required> <br><br>
        <lable for ='dest'>Empresa Condominio</lable>
        <select name='dest' required>
            <option value=''>Clique aqui</option>
            <option value='ibl'>IBL</option>
            <option value='lyb'>LYB</option>
            <option value='dumar'>DUMAR</option>
        </select> <br><br>
        <input type='submit' value ='Registrar'>";
    }
    else
    {
        echo "<lable for ='placa'>Placa</lable>
        <input type='text' name='placa' value='".$array['placa']."' style='text-transform:uppercase' required> <br><br>
        <lable for ='nome'>Nome</lable>
        <input type='text' name='nome'  value='".$array['nome']."' style='text-transform:uppercase' required> <br><br>
        <lable for ='doc'>Documento</lable>
        <input type='text' name='doc'  value=".$array['doc']." style='text-transform:uppercase' required> <br><br>
        <lable for ='Empresa'>Empresa do motorista</lable>
        <input type='text' name='emp'  value='".$array['emp']."' style='text-transform:uppercase' required> <br><br>
        <lable for ='dest'>Empresa Condominio</lable>
        <select name='dest'>
            <option value='ibl'>IBL</option>
            <option value='lyb'>LYB</option>
            <option value='dumar'>DUMAR</option>
        </select> <br><br>
        <input type='submit' value ='Registrar'>";
    }
}
?>

