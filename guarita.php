<?php
include_once 'funcoes.php';
include_once 'funcoesBD.php';
include_once 'conectaBD.php';
include 'verificalogin.php';
$connString = "host=$host port=5432 dbname=$banco user=$usuario password=$senha";
$conn = pg_connect($connString);
?>
<html>
	<head>
		<title>Guarita</title>
		<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	</head>
	<body>
	<p>
		<button onClick = "window.location.reload();">Atualizar</button>
	</p>
	<?php
	gerarTabelaGuarita();
	/*<form name = "form1" method="POST" action="atualizaguarita.php">
		gerarTabelaGuarita();
	</form>*/
	?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
		<script>
			$(document).ready(function () { 
				var $seuCampoCpf = $("#placa");
				$seuCampoCpf.mask('AAA-9A99');
			});
		</script>
	</body>
</html>