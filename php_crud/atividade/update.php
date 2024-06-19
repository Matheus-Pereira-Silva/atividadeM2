<?php
include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM campos WHERE id=$id";  // Corrigido para selecionar da tabela 'campos'
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc(); // Obtém os dados do registro
    } else {
        echo "Nenhum registro encontrado para o ID fornecido.";
        exit();
    }
} else {
    echo "ID não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Tarefa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Atualizar Tarefa</h2>
    <!-- Formulário para atualizar a tarefa -->
    <form action="update_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">  <!-- Campo oculto com o ID -->
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="<?php echo $row['titulo']; ?>" required>  <!-- Campo para o título -->
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" id="descricao" rows="3"><?php echo $row['descricao']; ?></textarea>  <!-- Campo para a descrição -->
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" id="status" required>
                <option value="Pendente" <?php if ($row['status'] == 'Pendente') echo 'selected'; ?>>Pendente</option>
                <option value="Em Progresso" <?php if ($row['status'] == 'Em Progresso') echo 'selected'; ?>>Em Progresso</option>
                <option value="Concluído" <?php if ($row['status'] == 'Concluído') echo 'selected'; ?>>Concluído</option>
            </select>  <!-- Campo para o status -->
        </div>
        <div class="form-group">
            <label for="dataCriacao">Data de Criação</label>
            <input type="date" name="dataCriacao" class="form-control" id="dataCriacao" value="<?php echo $row['dataCriacao']; ?>" required>  <!-- Campo para a data de criação -->
        </div>
        <div class="form-group">
            <label for="dataConclusao">Data de Conclusão</label>
            <input type="date" name="dataConclusao" class="form-control" id="dataConclusao" value="<?php echo $row['dataConclusao']; ?>">  <!-- Campo para a data de conclusão -->
        </div>
        <div class="form-group">
            <label for="responsavel">Responsável</label>
            <input type="text" name="responsavel" class="form-control" id="responsavel" value="<?php echo $row['responsavel']; ?>">  <!-- Campo para o responsável -->
        </div>
        <div class="form-group">
            <label for="responsavel">Cargo</label>
            <input type="text" name="cargo" class="form-control" id="cargo" value="<?php echo $row['cargo']; ?>">  <!-- Campo para o responsável -->
        </div>
        <div class="form-group">
            <label for="responsavel">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="<?php echo $row['email']; ?>">  <!-- Campo para o responsável -->
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>  <!-- Botão para enviar o formulário -->
    </form>
</div>
</body>
</html>
