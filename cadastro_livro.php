<?php 

include "Layout.php";
$layout = new Layout();
$layout->conteudo = "front-end/formulario_livro";
$layout->index();

// \/ daqui para baixo é só o cadastro, mysql etc. 

include "conexao.php";

$dadoslivro = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($dadoslivro['cadastro'])) {

    //livro
    $titulo = $dadoslivro['titulo'];
    $codigo = $dadoslivro['codigo'];
    $datapublicacao = $dadoslivro['data_publicacao'];
    $idioma = $dadoslivro['idioma'];
    $volume = $dadoslivro['volume'];
    $edicao = $dadoslivro['edicao'];
    $dataregistro = $dadoslivro['data_registro'];
    $descricao = $dadoslivro['descricao'];
    //autor livro
    $autor = $dadoslivro['nome_autor'];
    //genero
    $genero = $dadoslivro['tipo_genero'];
    //editora
    $editora = $dadoslivro['nome_editora'];

    if($livro = cadastroLivro($conn,$titulo,$codigo,$datapublicacao,$idioma,$volume,$edicao,$dataregistro,$paginas,$descricao,$autor,$genero,$editora)){

            $_POST['msg'] = "<p style='color: red'>NAO CADASTRADO</p>";
            
    }else{

        $_POST['msg'] = "<p style='color: green'>CADASTRADO</p>";
    }

}

if(isset($_POST['msg'])){
    echo $_POST['msg'];
    unset($_POST['msg']);
}

function cadastroLivro($conn,$titulo,$codigo,$datapublicacao,$idioma,$volume,$edicao,$dataregistro,$paginas,$descricao,$autor,$genero,$editora)
{
    try {
        $sql  = "SET AUTOCOMMIT=0;
        START TRANSACTION;
        INSERT INTO livro (titulo,codigo,data_publicacao,idioma,volume,edicao,data_registro,paginas,descricao) VALUES 
        (:titulo,:codigo,:data_publicacao,:idioma,:volume,:edicao,:data_registro,:paginas,:descricao);
        INSERT INTO autor(nome_autor) VALUES (:nome_autor);
        INSERT INTO genero(tipo_genero) VALUES (:tipo_genero);
        INSERT INTO editora(nome_editora) VALUES (:nome_editora);
        COMMIT;
        SET AUTOCOMMIT=1";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':codigo', $codigo); //PARAM_INT < NUMERO // PARAM_XYZ Especificar tipo.
        $stmt->bindParam(':data_publicacao', $datapublicacao);
        $stmt->bindParam(':idioma', $idioma);
        $stmt->bindValue(':volume', $volume);
        $stmt->bindValue(':edicao', $edicao);
        $stmt->bindParam(':data_registro', $dataregistro);
        $stmt->bindValue(':paginas', $paginas);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':nome_autor', $autor);
        $stmt->bindParam(':tipo_genero', $genero);
        $stmt->bindParam(':nome_editora', $editora);
        $stmt->execute();
        return json_decode(json_encode($stmt->fetch()), true);
    }
    catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
        
    }
}

