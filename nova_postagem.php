
<?php
include('conexao-db.php');
include('tabela_textos.php');

$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];
$texto = $_POST['texto'];

if(insereTexto($con, $titulo, $tipo, $texto)){
    header("location:form_nova_postagem.php?sucesso=2");
}else{
  header("location:form_nova_postagem.php?sucesso=1");
}


die();

?>
