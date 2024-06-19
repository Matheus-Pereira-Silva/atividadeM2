<?php
include 'config.php';  // Inclui a configuração do banco de dados

if (isset($_GET['id'])) {  // Verifica se o ID foi passado como parâmetro
    $id = $_GET['id'];

    // Deleta o registro da tabela pessoas
    $sql = "DELETE FROM campos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");  // Redireciona para a página principal se a exclusão for bem-sucedida
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;  // Exibe um erro se a exclusão falhar
    }
}

$conn->close();  // Fecha a conexão com o banco de dados
?>