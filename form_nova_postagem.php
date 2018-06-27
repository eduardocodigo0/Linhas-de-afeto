<?php
if(! empty($_GET['sucesso'])){
$sucesso = $_GET['sucesso'];
}

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
      <h1 class="titulo-central">Central Administrativa</h1>
    </header>


        <section>

          <?php
          if(!empty($sucesso)){
            if($sucesso == "2"){
              echo "<p style='color: green'> <strong>Postagem realizada com sucesso!</strong> </p>";
            }else if($sucesso == "1"){
              echo "<p style='color: red'> <strong>Erro durante a postegem :(</strong> </p>";
            }
          }
          ?>

          <h3>Novo Texto</h3>
          <form method="post" action="nova_postagem.php">

            <table>
              <tr>
                <td> <strong>Titulo:</strong> </td>
                <td> <input type="text" name="titulo" value="" placeholder="Titulo do texto"> </td>
              </tr>
              <tr>
                <td> <strong>Tipo:</strong> </td>
                <td>
                  <select name="tipo">
                    <option value="Contos Eróticos">Contos Eróticos</option>
                    <option value="Rotina">Rotina</option>
                    <option value="Textos Com Amor">Textos Com Amor</option>

                  </select>
                 </td>
              </tr>

              <tr>
                <td> <strong>Texto:</strong></td>
                <td> <textarea name="texto" rows="8" cols="50" ></textarea> </td>
              </tr>

              <tr>

                <td> <input class="bt_form" type="submit" name="" value="Postar"> </td>

              </tr>
            </table>
          </form>

        </section>
  </body>
</html>
