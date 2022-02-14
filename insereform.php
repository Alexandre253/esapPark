<?php
include_once 'funcoes.php';
include_once 'funcoesBD.php';
include_once 'conectaBD.php';
$nome = $_POST['nome'];
$doc = $_POST['doc'];
$emp = $_POST['emp'];
$placa = $_POST['placa'];
$cliente = $_POST['cliente'];
$nf = $_POST['nf'];
$dest = filter_input(INPUT_POST, 'dest', FILTER_SANITIZE_STRING);
$conn = ConexaoBanco();
inserirTabela($conn,$nome,$doc,$emp,$placa,$cliente,$nf,$dest);
echo "Dados inseridos com Sucesso!";
header("refresh:1; url=form.php");
?>