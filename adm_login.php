<?php
include('conexao-db.php');
include('tabela_adm.php');
include('sessao.php');

if(!isset($_SESSION["tentativas"])){
  $_SESSION['tentativas'] = 0;
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$emailFiltrado = mysqli_real_escape_string($con,$email);

$login = adm_login($con, $emailFiltrado, $senha);

if(isset($login["nome"])){

  $_SESSION['usuario'] = $login["email"];
  header("location: adm-central.php");

}else{
  $_SESSION['alertaLog'] = '1';
  $_SESSION['tentativas'] += 1;
  header("location: entrar.php");
}

die();
