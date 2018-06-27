<?php include("cabecalho.php");
      include('conexao-db.php');
      include('tabela_textos.php');

      if(isset($_GET["texto"])){
        $id = $_GET["texto"];
        if(!filter_var($id , FILTER_VALIDATE_INT)){
          $id = "0";
      }
    }else{ $id = 0;}

    $texto = retornaTextoPorID($con, $id);
?>

    <header id="leitor-header" class="flex-container">
      <h1>Texto</h1>
      <p>Por que ler faz bem</p>
    </header>

    <section id="leitor">

      <div >

        <h2><?= $texto["titulo"]?></h2>
        <p> <strong>Serie:</strong><?= $texto["tipo"]?></p>
        <p> <strong>Data de criação:</strong> <?= $texto["data"]?></p>

        <p id="texto-integra"><?= $texto["texto"]?></p>

      </div>

    </section>

<?php include("rodape.php");?>
