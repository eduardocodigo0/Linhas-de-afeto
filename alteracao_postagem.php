<?php
      include("conexao-db.php");
      include("tabela_textos.php");
      include('sessao.php');
      if(!isset($_SESSION["usuario"])){
        header("location: entrar.php");
        die();
      }

      if(isset($_SESSION['alertaDel'])){
        if($_SESSION['alertaDel'] == 0){
          $alerta = "Erro durante a exclusão do texto!";
        }else{
            $alerta = "Texto excluido com sucesso!";
        }
        unset($_SESSION['alertaDel']);
      }else{
        $alerta = "";
      }

      if(isset($_SESSION['alertaAtualiza'])){
        if($_SESSION['alertaAtualiza'] == 0){
          $alerta = "Erro durante a atualização do texto!";
        }else{
            $alerta = "Texto atualizado com sucesso!";
        }
        unset($_SESSION['alertaAtualiza']);
      }else{
        $alerta = "";
      }


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
          <p class="alerta"><?=$alerta ?></p>
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
                    <td> <a href="form_nova_postagem.php?texto=<?=$texto['id']?>" class="bt_editar">Editar</a> </td>
                    <td> <a href="excluir_postagem.php?texto=<?=$texto['id'] ?>" class="bt_deletar">Deletar</a> </td>

                  </tr>


              <?php
                }
              ?>
            </table>

          </div>
        </section>
  </body>
</html>
