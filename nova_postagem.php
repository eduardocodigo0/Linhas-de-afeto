
<?php
include('conexao-db.php');
include('tabela_textos.php');
include('sessao.php');
if(!isset($_SESSION["usuario"])){
  header("location: entrar.php");
  die();
}

$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$texto = $_POST['texto'];

if(!isset($_POST['id'])){
  if(insereTexto($con, $titulo, $tipo, $texto)){
      $_SESSION['alertaCri'] = 1;
    }else{
      $_SESSION['alertaCri'] = 0;
    }
    header("location:form_nova_postagem.php");
}else{
  $id = $_POST['id'];
  if(atualizaPostagem($con, $id, $titulo, $tipo, $texto)){
    $_SESSION['alertaAtualiza'] = 1;
  }else{
    $_SESSION['alertaAtualiza'] = 0;
  }
  header("location:alteracao_postagem.php");
}


die();

?>
