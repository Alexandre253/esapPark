<a href="relatorio.php">Voltar</a>
<?php
		include_once 'funcoes.php';
		include_once 'funcoesBD.php';
		include_once 'conectaBD.php';

$data = substr($_POST['date'],0, 10);
//$data = '2022-01-26';
gerarTabelaRelatorio($data);
?>