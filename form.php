<html>
	<head>
		<title> Formulário de entrada </title>
	</head>
	
	<body>
		<form method="post" action ="insereform.php">
				<h2>Registro de entrada</h2>
				<section>
				<fieldset>
				<p>
					<label for="doc">
						<span>Documento: </span>
						</label>
					<input type="text" name ="doc" id="doc">
				</p>
				<p>
					<label for="nome">
						<span>Nome: </span>
						</label>
					<input type="text" id="nome" name="nome">
				</p>
				<p>
					<label for="emp">
						<span>Empresa: </span>
						</label>
					<input type="text" id="emp" name="emp">
				</p>
				<p>
					<label for="placa">
						<span>Placa: </span>
						</label>
					<input type="text" id="placa" name ="placa">
				</p>
				<p>
					<label for="cliente">
						<span>Cliente: </span>
						</label>
					<input type="text" id="cliente" name ="cliente">
				</p>
				<p>
					<label for="nf">
						<span>Coleta/NF:</span>
						</label>
					<input type="text" id="nf" name ="nf">
				</p>
				<p><input type="submit" value="Enviar"></p>
				<section>
				</fieldset>
		</form>
	</body>