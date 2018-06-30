<?php

  function insereTexto($con , $titulo, $tipo, $texto){
    $data = date('y/m/d');
    $query = "insert into textos (titulo, tipo, texto, data) values ('{$titulo}','{$tipo}','{$texto}','{$data}');";
    $resultado= mysqli_query($con, $query);
    return $resultado;
  }

  function retornaTextos($con, $tipo){
    $query = "select * from textos where tipo = '{$tipo}';";
    $res = mysqli_query($con, $query);
    $resultados = array();
    while($linha = mysqli_fetch_assoc($res)){
      array_push($resultados, $linha);
  }
    return $resultados;
  }
  function retornaTudo($con){
    $query = "select * from textos;";
    $res = mysqli_query($con, $query);
    $resultados = array();
    while($linha = mysqli_fetch_assoc($res)){
      array_push($resultados, $linha);
  }
    return $resultados;
  }

  function retornaTextoPorID($con, $id){
      $query = "select * from textos where id = {$id};";
      $res = mysqli_query($con, $query);
      return  mysqli_fetch_assoc($res);
  }

  function deletaPorID($con, $id){
    $query = "DELETE FROM textos WHERE id = {$id}";
    $res = mysqli_query($con, $query);
    return($res);
  }

  function atualizaPostagem($con, $id, $titulo, $tipo, $texto){
    $query =    "UPDATE textos
                    SET titulo = '{$titulo}', tipo = '{$tipo}', texto = '{$texto}'
                    WHERE id = {$id};
                ";
    $res = mysqli_query($con, $query);
    return($res);


  }
