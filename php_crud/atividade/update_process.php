<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $titulo = $conn->real_escape_string($_POST["titulo"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $status = $conn->real_escape_string($_POST["status"]);
    $dataCriacao = $conn->real_escape_string($_POST["dataCriacao"]);
    $dataConclusao = $conn->real_escape_string($_POST["dataConclusao"]);
    $responsavel = $conn->real_escape_string($_POST["responsavel"]);
    $cargo = $conn->real_escape_string($_POST["cargo"]);
    $email = $conn->real_escape_string($_POST["email"]);


    // Atualizando na tabela campos
    $sql = "UPDATE campos SET titulo='$titulo', descricao='$descricao', status='$status', dataCriacao='$dataCriacao', dataConclusao='$dataConclusao', responsavel='$responsavel', cargo='$cargo', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona para a página principal se a atualização for bem-sucedida
        exit();
    } else {
        echo "Erro ao atualizar tarefa: " . $conn->error; // Exibe um erro se a atualização falhar
    }
}

$conn->close(); // Fecha a conexão com o banco de dados
?>
