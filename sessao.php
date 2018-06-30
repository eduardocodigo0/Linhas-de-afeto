<?php
session_start();

function finalizaSessao(){
  session_unset();
  session_destroy();
}
