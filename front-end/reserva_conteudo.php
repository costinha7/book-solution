<br>
<div class="container">
<div class="text">Consulta Reservas</div>
<br>

<?php

include_once "./conexao.php";

$query_reserva = "SELECT cliente_reserva, clivro_reserva, data_entrega, data_reserva, status_reserva FROM reserva";


$result_reserva = $conn->prepare($query_reserva);
$result_reserva->execute();

if(($result_reserva) AND ($result_reserva->rowCount() != 0)){

    while($row_reserva = $result_reserva->fetch(PDO::FETCH_ASSOC)){
       //var_dump($row_livro);
       extract ($row_reserva);
       echo "<div class='d-flex flex-row mb-1 bg-info bg-opacity-10'>";
       echo "<div class='p-2'>Data da Reserva: $data_reserva</div>";
       echo "<div class='p-2'>Data da Entrega: $data_entrega </div>";
       echo "<div class='p-2'>Código do Livro: $clivro_reserva</div>";
       echo "<div class='p-2'>Cliente: $cliente_reserva</div>";
       //echo "<div class='p-2'><input type='submit' value='Deletar' name='delete'></div>";
       echo "</div>";
    }

}else{
    echo "<p>Sem reservas.</p>";
}

/*SET AUTOCOMMIT=0;
    START TRANSACTION;
    INSERT INTO reserva (cliente_reserva, clivro_reserva, data_entrega, data_reserva, status_reserva) VALUES 
    (:cliente_reserva, :clivro_reserva, :data_entrega, :data_reserva, :status_reserva);
    INSERT INTO livro(status_livro) VALUES (:status_livro);
    COMMIT;
    SET AUTOCOMMIT=1";*/

?>

