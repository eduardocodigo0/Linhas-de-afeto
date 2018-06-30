<?php
  include('sessao.php');
  if(!isset($_SESSION["usuario"])){
    header("location: entrar.php");
    die();
  }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Linhas de Afeto</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,700|Philosopher:400,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css"/>
    <link rel="stylesheet" href="css/estilo2.css"/>
  </head>
  <body>
    <header class="flex-container">
    <h1 class="titulo-central">Central Administrativa</h1>
  </header>

    <section id="central-menu">
        <h3>Menu</h3>
      <div class="flex-container">
        <a href="form_nova_postagem.php" class="botao">Adicionar novo texto</a> <br>
        <a href="alteracao_postagem.php" class="botao">Alterar ou remover texto</a> <br>
        <a href="sair.php" class="botao" >Sair</a>
      </div>
    </section>

  </body>
</html>
