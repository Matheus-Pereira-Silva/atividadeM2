<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $status = $_POST["status"];
    $dataCriacao = $_POST["dataCriacao"];
    $dataConclusao = $_POST["dataConclusao"];
    $responsavel = $_POST["responsavel"];
    $cargo = $_POST['cargo'];
    $email = $_POST['email']

    $sql = "INSERT INTO campos (titulo, descricao, status, dataCriacao, dataConclusao, responsavel, cargo, email) VALUES (?, ?, ?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssss", $titulo, $descricao, $status, $dataCriacao, $dataConclusao, $responsavel, $cargo, $email);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redireciona para o index se der tudo certo
        exit();
    } else {
        echo "Erro ao cadastrar tarefa: " . $stmt->error; // Retorna erro, se houver
    }

    // Fecha a conexão e o statement
    $stmt->close();
    $conn->close();
}
?>
