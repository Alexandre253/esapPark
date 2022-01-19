<?php
include_once 'funcoes.php';
include_once 'funcoesBD.php';
include_once 'conectaBD.php';
$connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
$conn = pg_connect($connString);
?>
<html>
	<head>
		<title>Guarita</title>
	</head>
	<body>
	<p>
		<button onClick = "window.location.reload();">Atualizar</button>
		
	</p>

	<?php
		gerarTabelaGuarita(getDadosBD());
	?>
	
	</body>
</html>