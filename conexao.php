<?php

$host = "localhost";
$user = "root";
$pass = "@LARbook$1458$"; // @LARbook$1458$ // root
$dbname = "book_solution";

try{

    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
