<?php

//die(password_hash("ALR#1245#", PASSWORD_DEFAULT)); // hash para senha, colocar no DB

session_start();
ob_start();

include_once 'conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (!empty($dados['login'])) {
    $usuario_funcionario = loginFuncionario($conn,$dados['usuario_funcionario'],$dados['senha_funcionario']);
    if($usuario_funcionario){
            $_SESSION['id_funcionario'] = $usuario_funcionario['id_funcionario'];
            $_SESSION['usuario_funcionario'] = $usuario_funcionario['usuario_funcionario'];
            header("Location: home");
            
    }else{
        $_SESSION['msg'] = "Erro: Usuário ou senha inválida!";
        header("Location: index"); 
    }

} 

    function loginFuncionario($conn,$email_funcionario, $senha_funcionario)
    {   
        try {  
               
            $sql  = "SELECT * FROM funcionario WHERE usuario_funcionario = :email_funcionario"; 
            $stmt = $conn->prepare($sql); 
            $stmt->bindParam(':email_funcionario', $email_funcionario);
            $stmt->execute();
            if($usuario_funcionario = $stmt->fetch()){
                if(password_verify($senha_funcionario,$usuario_funcionario['senha_funcionario'])){

                    return json_decode(json_encode($usuario_funcionario), true); 

                }
                
            }
            
        }
        
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

        return null;
    }