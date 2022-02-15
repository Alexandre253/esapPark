<?php
session_start();
$_SESSION['nome'] = 'joao';
echo '<a href="verificalogin.php">Verificar</a>';
?>