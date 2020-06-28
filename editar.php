<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE produto SET nome=:nome, marca=:marca, 
    validade=:validade WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':validade', $validade);

    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $marca           = $_POST['marca'];
    $validade        = $_POST['validade'];

    $stmt->execute();


    echo "Produto atualizado com sucesso!<br>";
    echo $id;
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_prod.php');
?> 