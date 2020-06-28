<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO produto (nome, marca, validade)
    VALUES (:nome, :marca, :validade)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':validade', $validade);

    $nome           = $_POST['nome'];
    $marca           = $_POST['marca'];
    $validade        = $_POST['validade'];

    $stmt->execute();


    echo "Produto cadastrado com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_prod.php');
?> 