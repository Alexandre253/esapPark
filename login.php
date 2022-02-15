<?php
session_start();
include_once 'funcoesBD.php';
include_once 'funcoes.php';
$login = $_POST['login'];
$senha = $_POST['senha'];

$conn = conexaoBanco();
if($login == null || $senha == null)
{
  header('Location: index.php');
  exit();   
}
$query = "SELECT id_login, login FROM usuario where login = '$login' and senha = md5('$senha')";

$result = pg_query($conn, $query);

$row = pg_num_rows($result);

if($row == 1){
    $_SESSION['login'] = $login;
    header('Location: painel.php');
    pg_close($conn);
    exit();
}else{
    header('Location: index.php');
    pg_close($conn);
    exit();
}

?>