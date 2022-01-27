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

$conn = ConexaoBanco();
inserirTabela($conn,$nome,$doc,$emp,$placa,$cliente,$nf);
echo "Dados inseridos com Sucesso!";
header("refresh:2; url=form.php");
?>