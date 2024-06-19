<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD com PHP e MySQL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Cadastrar Tarefa</h2>
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" id="descricao" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="Pendente">Pendente</option>
                <option value="Em Progresso">Em Progresso</option>
                <option value="Concluído">Concluído</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dataCriacao">Data de Criação</label>
            <input type="date" name="dataCriacao" class="form-control" id="dataCriacao" required>
        </div>
        <div class="form-group">
            <label for="dataConclusao">Data de Conclusão</label>
            <input type="date" name="dataConclusao" class="form-control" id="dataConclusao">
        </div>
        <div class="form-group">
            <label for="responsavel">Responsável</label>
            <input type="text" name="responsavel" class="form-control" id="responsavel">
        </div>
        <div class="form-group">
            <label for="responsavel">Cargo</label>
            <input type="text" name="cargo" class="form-control" id="cargo">
        </div>
        <div class="form-group">
            <label for="responsavel">Email</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>

    <h2 class="mt-5">Tarefas Cadastradas</h2>
    <table class="table table-bordered">
        <thead>
          
        </thead>
        <tbody>
            <?php include 'read.php'; ?>
        </tbody>
    </table>
</div>

<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conn->real_escape_string($_POST["titulo"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $status = $conn->real_escape_string($_POST["status"]);
    $dataCriacao = $conn->real_escape_string($_POST["dataCriacao"]);
    $dataConclusao = $conn->real_escape_string($_POST["dataConclusao"]);
    $responsavel = $conn->real_escape_string($_POST["responsavel"]);
    $cargo = $conn->real_escape_string($_POST["cargo"]);
    $email = $conn->real_escape_string($_POST["email"]);

    // Inserindo na tabela campos
    $sql = "INSERT INTO campos (titulo, descricao, status, dataCriacao, dataConclusao, responsavel, cargo, email) VALUES ('$titulo', '$descricao', '$status', '$dataCriacao', '$dataConclusao', '$responsavel', '$cargo', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona para o index após a inserção
        exit();
    } else {
        echo "Erro ao cadastrar tarefa: " . $conn->error; // Exibe um erro se a inserção falhar
    }
}

$conn->close(); // Fecha a conexão com o banco de dados
?>

</body>
</html>
