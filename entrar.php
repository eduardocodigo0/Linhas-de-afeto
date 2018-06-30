<?php
include('sessao.php');

if(isset($_SESSION["usuario"])){
  header("location: adm-central.php");
  die();
}

if(isset($_SESSION['alertaLog'])){
  $alerta = "Login ou senha incorretos!";
  unset($_SESSION['alertaLog']);
}else{
  $alerta="";
}


if(!isset($_SESSION["tentativas"])){
  $_SESSION['tentativas'] = 0;
}
if($_SESSION['tentativas'] < 4){
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <title>Linhas de Afeto</title>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link href="https://fonts.googleapis.com/css?family=Assistant:300,400,700|Philosopher:400,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css"/>
    <link rel="stylesheet" href="css/estilo2.css"/>

  </head>
  <body>
  <header class="flex-container">
    <h1 class="titulo-central">Linhas de Afeto</h1>
  </header>

    <section class="login-section">
      <h3>Administração</h3>
      <p class="alerta" ><?=$alerta?> </p>
      <form name="loginForm" method="post" action="adm_login.php">

        <table>
          <tr>
            <td> <strong>E-mail:</strong> </td>
            <td> <input  type="email" name="email" value="" placeholder="Digite seu e-mail"> </td>
          </tr>
          <tr>
            <td> <strong>Senha:</strong> </td>
            <td> <input  type="password" name="senha" value="" placeholder="Digite sua senha"> </td>
          </tr>
          <tr>

            <td> <input class="bt_form" type="submit" name="" value="Entrar" > </td>

          </tr>
        </table>
      </form>

    </section>
    <script type="text/javascript">


    </script>

  </body>
</html>


<?php

}else{
  echo "Limite de tentativas de login!</br>";
  echo "<strong>Seu ip: <strong>".$_SERVER['REMOTE_ADDR']."</br>";
  //echo $_SESSION['tentativas'];
  //finalizaSessao();

}

?>
