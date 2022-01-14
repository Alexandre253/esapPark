<?php
//funções
echo "HELlO WORLD";
echo "Hello world 2";
//Função pra gerar a tabela com nome, placa, horário de entrada, horário de saída
function gerarTabela()
{
    echo 
    "<table border='2'>"
        ."<tr>"
            ."<td>Nome</td>"
            ."<td>Placa</td>"
            ."<td>Horário de Entrada</td>"
            ."<td>Horário de Saída</td>"
        ."</tr>"
    ."</table>";
}
//Função para preencher o horário de entrada
function  preencheEntrada($entrada)
{
    if($entrada == null){
        return "<button id='btnEntrada'>Registrar</button>";
    }
        return $entrada;
}
//Função pra vericicar se o horário de Saída é nulo
function verificaSaida($saida)
{
    if($saida == null)
    {
        return true;
    }
        return false;
}
//Função pra preencher o horário de Saída
function preencheSaida(){
    return "<button id='btnSaida'>Registrar</button>";
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