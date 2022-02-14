<?php
include_once 'funcoes.php';
include_once 'funcoesBD.php';
include_once 'conectaBD.php';
$conn = ConexaoBanco(); 
$cod_visita = $_POST['cod_visita'];
$horario = $_POST['horario'];
atualizaGuarita($conn,$cod_visita,$horario);
echo "Dados inseridos com Sucesso!";
header("refresh:0; url=guarita.php");
?>