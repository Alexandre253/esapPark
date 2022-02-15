<?php
include_once 'funcoes.php';
include_once 'funcoesBD.php';
include_once 'conectaBD.php';
include 'verificalogin.php';
$placa = $_POST['placa'];


?>
<html>
    <head><title>Cadastro de Placa</title></head>
    <body>
        <form onsubmit="return confirm('Deseja mesmo fazer isso?')" action="insereguaritacadastro.php" method="POST">
        <?php gerarCadastroGuarita(verifExistsPlaca($placa), $placa);?>
        </form>
        <a href='guarita.php'> Voltar </a>

    </body>
</html>
