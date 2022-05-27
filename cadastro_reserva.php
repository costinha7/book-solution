<?php 
include "Layout.php";
$layout = new Layout();
$layout->conteudo = "front-end/formulario_reserva";
$layout->index();

// \/ daqui para baixo é só o cadastro, mysql etc. 

include "conexao.php";

$dadosreserva = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dadosreserva['cadastro'])) {

    //reserva
    $clientereserva = $dadosreserva['cliente_reserva'];
    $clivroreserva = $dadosreserva['clivro_reserva'];
    $dataentrega = $dadosreserva['data_entrega'];
    $datareserva = $dadosreserva['data_reserva'];
    //$statusreserva = $dadosreserva['status_reserva'];
    //livro
    //$statuslivro = $dadosreserva['status_livro'];

    if($reserva = cadastroReserva($conn,$clientereserva,$clivroreserva,$dataentrega,$datareserva)){

            $_POST['msg'] = "<p style='color: red'>NAO CADASTRADO</p>";
            
    }else{

        $_POST['msg'] = "<p style='color: green'>CADASTRADO</p>";
    }

}

if(isset($_POST['msg'])){
    echo $_POST['msg'];
    unset($_POST['msg']);
}

function cadastroReserva($conn,$clientereserva,$clivroreserva,$dataentrega,$datareserva)
{
    try {
        $sql  = "SET AUTOCOMMIT=0;
        START TRANSACTION;
        INSERT INTO reserva (cliente_reserva, clivro_reserva, data_entrega, data_reserva) VALUES 
        (:cliente_reserva, :clivro_reserva, :data_entrega, :data_reserva);
        COMMIT;
        SET AUTOCOMMIT=1";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cliente_reserva', $clientereserva);
        $stmt->bindValue(':clivro_reserva', $clivroreserva); //PARAM_INT < NUMERO // PARAM_XYZ Especificar tipo.
        $stmt->bindParam(':data_entrega', $dataentrega);
        $stmt->bindParam(':data_reserva', $datareserva);
        //$stmt->bindValue(':status_reserva', $statusreserva);
        //$stmt->bindParam(':status_livro', $statuslivro);
        $stmt->execute();
        return json_decode(json_encode($stmt->fetch()), true);
    }
    catch (PDOException $e) {
        echo "Error:" . $e->getMessage();        
    }
}

/*try {
    $sql  = "SET AUTOCOMMIT=0;
    START TRANSACTION;
    INSERT INTO reserva (cliente_reserva, clivro_reserva, data_entrega, data_reserva, status_reserva) VALUES 
    (:cliente_reserva, :clivro_reserva, :data_entrega, :data_reserva, :status_reserva);
    INSERT INTO livro(status_livro) VALUES (:status_livro);
    COMMIT;
    SET AUTOCOMMIT=1";*/