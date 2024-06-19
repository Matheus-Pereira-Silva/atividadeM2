<?php
include 'config.php';

$sql = "SELECT * FROM campos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {  // Verifica se há registros retornados
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Título</th>';
    echo '<th>Descrição</th>';
    echo '<th>Status</th>';
    echo '<th>Data de Criação</th>';
    echo '<th>Data de Conclusão</th>';
    echo '<th>Responsável</th>';
    echo '<th>Cargo</th>';
    echo '<th>Email</th>';
    echo '<th>Ações</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {  // Loop através de cada registro retornado
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["titulo"] . '</td>';
        echo '<td>' . $row["descricao"] . '</td>';
        echo '<td>' . $row["status"] . '</td>';
        echo '<td>' . $row["dataCriacao"] . '</td>';
        echo '<td>' . $row["dataConclusao"] . '</td>';
        echo '<td>' . $row["responsavel"] . '</td>';
        echo '<td>' . $row["cargo"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>';
        echo '<a href="update.php?id=' . $row["id"] . '" class="btn btn-success">Editar</a> ';  // Link para editar
        echo '<a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger">Excluir</a>';    // Link para deletar
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p class='alert alert-info'>Nenhuma tarefa encontrada.</p>";  // Exibe mensagem se não houver registros
}

$conn->close();  // Fecha a conexão com o banco de dados
?>
