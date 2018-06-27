<?php
      include("conexao-db.php");
      include("tabela_textos.php");

      $textos = retornaTudo($con);

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


          <h3>Alteração</h3>
          <div id="alteracao_tabela_div">
            <table id="alteracao_tabela">
              <tr>
                <td> <strong>ID</strong> </td>
                <td> <strong>TIPO</strong> </td>
                <td> <strong>TITULO</strong> </td>
                <td> <strong>TEXTO</strong> </td>
                <td> <strong>DATA</strong> </td>

              </tr>
              <?php
                foreach($textos as $texto){
                  $trecho = substr($texto['texto'],0,20);
                  ?>
                  <tr>
                    <td> <?=$texto['id'] ?></td>
                    <td> <?=$texto['tipo'] ?></td>
                    <td> <?=$texto['titulo'] ?></td>
                    <td> <?=$trecho ?></td>
                    <td> <?=$texto['data'] ?></td>
                    <td> <a href="atualizar_postagem.php" class="bt_editar">Editar</a> </td>
                    <td> <a href="excluir_postagem.php" class="bt_deletar">Deletar</a> </td>

                  </tr>


              <?php
                }
              ?>
            </table>

          </div>
        </section>
  </body>
</html>
