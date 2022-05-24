



<h1 class="h1titulo">Livros Cadastrados</h1>

<form action="livros.php" method="GET">

 <div class="card-group">

  
 </div>
</form>
<li><a id="a01" href="cadastro_livro">Cadastro de Livro</a></li>

<?php

include_once "./conexao.php";

$query_livro = "SELECT codigo, titulo, data_publicacao, idioma, volume, edicao, data_registro, paginas, status_livro FROM livro";
$result_livro = $conn->prepare($query_livro);
$result_livro->execute();

if(($result_livro) AND ($result_livro->rowCount() != 0)){

    while($row_livro = $result_livro->fetch(PDO::FETCH_ASSOC)){
       //var_dump($row_livro);
       extract ($row_livro);
       echo "<div class='d-flex flex-row mb-1 bg-info bg-opacity-10'>";
       echo "<div class='p-2'>Título: $titulo</div>";
       echo "<div class='p-2'>Código: $codigo </div>";
       echo "<div class='p-2'>Publicação: $data_publicacao</div>";
       echo "<div class='p-2'>Idioma: $idioma</div>";
       echo "<div class='p-2'>Volume: $volume</div>";
       echo "<div class='p-2'>Edição: $edicao</div>";
       echo "<div class='p-2'>Data de Registro: $data_registro</div>";
       echo "<div class='p-2'>status_livro: $status_livro</div>";
       echo "<div class='p-2'><input type='submit' value='Deletar'></div>";
       echo "<div class='p-2'><input type='submit' value='Atualizar'></div>";
       echo "</div>";
    }

}else{
    echo "<p>Sem cadastros.</p>";
}


?>

</div>
</form>