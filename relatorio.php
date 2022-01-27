<html>
	<head>
		<title>Relatório</title>
	</head>
	<body>
		<?php
		include_once 'funcoes.php';
		include_once 'funcoesBD.php';
		include_once 'conectaBD.php';
	$data = '2022-01-26';
		gerarTabelaRelatorio($data);
		?>
		<form method="post" action="buscarelatorio.php">
		<label>
			<p><span>Data</span>
		</label>
			<input type="text" name="date" placeholder="__/__/____" size="6">
			<button type="submit">Procurar</button>
			</p>
		</form>
	</body>
</html>