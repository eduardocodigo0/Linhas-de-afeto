<?php
  include('conexao-db.php');
  include('sessao.php');
  include('tabela_textos.php');

  if(!isset($_SESSION["usuario"])){
    header("location: entrar.php");
    die();
  }

  if(!isset($_SESSION['alertaCri'])){
    $alerta = "";
  }else if($_SESSION['alertaCri'] == 0){
          $alerta = "Erro no durante procedimento!";
          unset($_SESSION['alertaCri']);
  }else{
    $alerta = "Sucesso!";
    unset($_SESSION['alertaCri']);
  }

  $selAmor = "";
  $selConto = "";
  $selRotina = "";

  if(isset($_GET['texto'])){
    $id = $_GET['texto'];
    if(filter_var($id , FILTER_VALIDATE_INT)){
      $texto = retornaTextoPorID($con, $id);
      switch ($texto['tipo']) {
        case 'Contos Eróticos':
          $selConto = "selected";
          break;
        case 'Rotina':
            $selRotina = "selected";
            break;
        case 'Textos Com Amor':
            $selAmor = "selected";
            break;
        default:

          break;
      }

    }else{
      $id = "";
    }
  }else{
    $id = "";
    $texto['titulo'] = "";
    $texto['texto'] = "";
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

          <p class="alerta"><?=$alerta ?></p>
          <h3>Novo Texto</h3>
            <form method="post" action="nova_postagem.php">
            <?php
              if(filter_var($id , FILTER_VALIDATE_INT)){
              ?>

                <input type="hidden" name="id" value="<?=$id  ?>">
            <?php } ?>

            <table>
              <tr>
                <td> <strong>Titulo:</strong> </td>
                <td> <input type="text" name="titulo" value="<?=$texto['titulo']  ?>" placeholder="Titulo do texto"> </td>
              </tr>
              <tr>
                <td> <strong>Tipo:</strong> </td>
                <td>
                  <select name="tipo" >
                    <option value="Contos Eróticos" <?=$selConto ?> >Contos Eróticos</option>
                    <option value="Rotina" <?=$selRotina  ?> >Rotina</option>
                    <option value="Textos Com Amor" <?=$selAmor  ?>  >Textos Com Amor</option>

                  </select>
                 </td>
              </tr>

              <tr>
                <td> <strong>Texto:</strong></td>
                <td> <textarea name="texto" rows="8" cols="50" >
                  <?=$texto['texto']  ?>
                </textarea> </td>
              </tr>

              <tr>
                <?php
                  if(filter_var($id , FILTER_VALIDATE_INT)){
                  ?>
                <td> <input class="bt_form" type="submit" name="" value="Atualizar"> </td>
                <?php } else{?>

                <td> <input class="bt_form" type="submit" name="" value="Postar"> </td>
                <?php }?>
              </tr>
            </table>
          </form>

        </section>
  </body>
</html>
