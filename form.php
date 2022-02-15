<?php
include 'verificalogin.php'
?>
<html>
	<head>
		<title> Formulário de entrada </title>
		<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	</head>
	
	<body>
		<form onsubmit="return confirm('Deseja mesmo fazer isso?')" method="post" action ="insereform.php">
				<h2>Registro de entrada</h2>
				<section>
				<fieldset>
				<p>
					<label for="doc">
						<span>Documento: </span>
						</label>
					<input type="text" name ="doc" id="doc" style='text-transform:uppercase' required>
				</p>
				<p>
					<label for="nome">
						<span>Nome: </span>
						</label>
					<input type="text" id="nome" name="nome" style='text-transform:uppercase' required>
				</p>
				<p>
					<label for="emp">
						<span>Empresa: </span>
						</label>
					<input type="text" id="emp" name="emp" style='text-transform:uppercase' required>
				</p>
				<p>
					<label for="placa">
						<span>Placa: </span>
						</label>
					<input type="text" id="placa" name ="placa" style='text-transform:uppercase' maxlength=8 required> 
				</p>
				<p>
					<label for="cliente">
						<span>Cliente: </span>
						</label>
					<input type="text" id="cliente" name ="cliente" style='text-transform:uppercase' required>
				</p>
				<p>
					<label for="nf">
						<span>Coleta/NF:</span>
						</label>
					<input type="text" id="nf" name ="nf" style='text-transform:uppercase' required>
				</p>
				<p>
				<lable for ='dest'>
					<span>Empresa Condominio</span>
				</lable>
				<select name='dest'>
					<option value='ibl'>IBL</option>
					<option value='lyb'>LYB</option>
					<option value='dumar'>DUMAR</option>
				</select>
				<p><input type="submit" value="Enviar"></p>
				<section>
				</fieldset>
		</form>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
		<script>	
		$(document).ready(function () { 
				var $seuCampoCpf = $("#placa");
				$seuCampoCpf.mask('AAA-9A99');
			});
		</script>
	</body>
</html>