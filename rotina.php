<?php include("cabecalho.php");
      include('conexao-db.php');
      include('tabela_textos.php');

if(isset($_GET["pagina"]) and filter_var($_GET["pagina"], FILTER_VALIDATE_INT)){
  $numero = $_GET["pagina"];
}else{
  $numero = 1;
}

 ?>

<header id="rotina-header" class="flex-container">
   <h1>Minha Rotina</h1>
   <p>As aventuras do dia a dia</p>
</header>

<section class="sessao-conteudo">
  <?php
    $textos = retornaTextos($con, "Rotina");
    $i = 1;
    foreach($textos as $texto){
      if($i >= (5 * $numero)){
        ?>
        <a href="rotina.php?pagina=<?=$numero+1?>" class="ver-mais">Ver Mais...</a>
        <?php
        break;
      }
    if($i >= (5 * ($numero - 1))){
        $trecho = substr($texto['texto'],0,59);
        ?>
        <div class="flex-container">
          <a href="leitor.php?texto= <?= $texto['id'] ?>"  >
          <h3><?= $texto['titulo'] ?></h3></a>
          <p><?= $trecho ?>...</p>
          <a href="leitor.php?texto= <?= $texto['id'] ?>" class="textolink">Ler mais</a>

        </div>

<?php
}
    $i += 1;}
  ?>

</section>

<?php include("rodape.php"); ?>
