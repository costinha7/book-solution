<?php

session_start();
ob_start();


//unset($_SESSION['id'], $_SESSION['usuario']);

session_unset();

$_SESSION['msg'] = "<br><p style='color: green'>Deslogado com sucesso!</p>"; 


header("Location: index");