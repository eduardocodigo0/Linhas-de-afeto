<?php


  function adm_login($con, $email, $senha){
    $senhaCript = md5($senha);
    $query = "select nome, email from adms where email = '{$email}' and senha = '{$senhaCript}';";
    $resultado = mysqli_query($con, $query);
    return mysqli_fetch_assoc($resultado);

  }
