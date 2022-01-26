<html>
	<head>
		<title>Relatório</title>
	</head>
	<body>
		<?php
		include_once 'funcoes.php';
		include_once 'funcoesBD.php';
		include_once 'conectaBD.php';
		/*<table border="1">
			<tr>
				<th>Data</th>
				<th>Documento</th>
				<th>Nome</th>
				<th>Empresa</th>
				<th>Placa</th>
				<th>Horário de Chegada</th>
				<th>Horário de Entrada</th>
				<th>Horário de Saída</th>
				<th>Cliente</th>
				<th>Nota Fiscal/Coleta</th>				
			</tr>
			<tr>
				<th>09/12/2021</th>
				<th>12345678</th>
				<th>Michael de Santa</th>
				<th>RockFord Hills</th>
				<th>CVP-8897</th>
				<th>12:14</th>
				<th>12:32</th>
				<th>17:50</th>
				<th>Philips Enterprises</th>
				<th>Coleta</th>
		</table>*/
		$data = date("Y-m-d H:i:s");
		//echo $data;
		gerarTabelaRelatorio($data);
		?>
		<form method="post">
		<label>
			<p><span>Data</span>
		</label>
			<input type="text" id="date" placeholder="__/__/____" size="6">
			<button type="submit">Procurar</button>
			</p>
		</form>
	</body>
</html>