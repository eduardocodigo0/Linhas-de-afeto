<?php
  include("conexao-db.php");
  include("sessao.php");
  include("tabela_textos.php");

  if(!isset($_SESSION["usuario"])){
    header("location: entrar.php");
    die();
  }

  if(isset($_GET['texto'])){
    $id = $_GET['texto'];

    if(!filter_var($id , FILTER_VALIDATE_INT)){
      $id = 0;
    }
  }else{
    $id = 0;
  }

if(deletaPorID($con, $id)){
  $_SESSION['alertaDel'] = 1;
}else{
  $_SESSION['alertaDel'] = 0;
}

header("location: alteracao_postagem.php");
die();
