<?php
include_once 'conectaBD.php';
include_once 'funcoes.php';
include_once 'funcoesBD.php';
$conn = conexaoBanco();
$placa = $_POST['placa'];
$nome = $_POST['nome'];
$doc = $_POST['doc'];
$emp = $_POST['emp'];
$dest = filter_input(INPUT_POST, 'dest', FILTER_SANITIZE_STRING);
echo $dest;
inserirGuarita($conn,$placa, $nome, $doc, $emp, $dest);
echo "Dados inseridos com sucesso";
header("Refresh:2;url='guarita.php'")

?>