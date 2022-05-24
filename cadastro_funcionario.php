<?php 
include "Layout.php";
$layout = new Layout();
$layout->conteudo = "front-end/formulario_funcionario";
$layout->index();


include "conexao.php";

$dadosfuncionario = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dadosfuncionario['cadastro'])) {

    $nomefuncionario = $dadosfuncionario['nome_funcionario'];
    $cpffuncionario = $dadosfuncionario['cpf_funcionario'];
    $cargo = $dadosfuncionario['cargo'];
    $dataadmissao = $dadosfuncionario['data_admissao'];
    $usuariofuncionario = $dadosfuncionario['usuario_funcionario'];
    $senhafuncionario = $dadosfuncionario['senha_funcionario'];
    $emailfuncionario = $dadosfuncionario['email_funcionario'];
    $celularfuncionario = $dadosfuncionario['celular_funcionario'];

    if($funcionario = cadastroFuncionario($conn, $nomefuncionario, $cpffuncionario,$cargo, $dataadmissao, $usuariofuncionario, $senhafuncionario, $emailfuncionario, $celularfuncionario)){ 

            $_POST['msg'] = "<p style='color: red';>NAO CADASTRADO</p>";
            
    }else{

        $_POST['msg'] = "<p style='color: green';>CADASTRADO</p>";
    }

}

if(isset($_POST['msg'])){
    echo $_POST['msg'];
    unset($_POST['msg']);
}

function cadastroFuncionario($conn,$nomefuncionario,$cpffuncionario,$cargo,$dataadmissao,$usuariofuncionario,$senhafuncionario,$emailfuncionario,$celularfuncionario)
{
    try {
        $sql  = "INSERT INTO funcionario (nome_funcionario,cpf_funcionario,cargo,data_admissao,usuario_funcionario,senha_funcionario,email_funcionario,celular_funcionario) VALUES (:nome_funcionario,:cpf_funcionario,:cargo,:data_admissao,:usuario_funcionario,:senha_funcionario,:email_funcionario,:celular_funcionario)"; 
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome_funcionario', $nomefuncionario); //PARAM_INT < NUMERO // PARAM_XYZ Especificar tipo.
        $stmt->bindParam(':cpf_funcionario', $cpffuncionario);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':data_admissao', $dataadmissao);
        $stmt->bindParam(':usuario_funcionario', $usuariofuncionario);
        $stmt->bindValue(':senha_funcionario', password_hash($senhafuncionario, PASSWORD_DEFAULT));
        $stmt->bindParam(':email_funcionario', $emailfuncionario);
        $stmt->bindParam(':celular_funcionario', $celularfuncionario);
        $stmt->execute();
        return json_decode(json_encode($stmt->fetch()), true);
    }
    catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
        
    }
}
