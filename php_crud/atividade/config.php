<?php
// Definir as variaveis de conexão com o banco

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "atividade";

// criando uma nova conexão 
$conn = new mysqli($servername, $username, $password, $db_name);

// verificar se a conexão falhou
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>