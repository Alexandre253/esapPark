<?php
include 'funcoes.php';
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
		gerarTabelaGuarita(getArray());
	?>
	
	</body>
</html>