<?php
include_once 'funcoes.php';
include_once 'funcoesBD.php';
include_once 'conectaBD.php';
$cod_visita = $_POST['cod_visita'];
$bool = $_POST['bool'];
$conn = ConexaoBanco();
if($bool == 'cancelado')
{
atualizaViewCancelado($conn, $cod_visita);
}elseif($bool == 'autorizado'){
atualizaViewAutorizado($conn, $cod_visita);
}
header("Refresh:0; url='view.php'");
?>