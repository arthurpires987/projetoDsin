<?php
$servername = "localhost";
$username = "root"; // Usuário padrão do MySQL
$password = ""; // Senha do MySQL (deixe vazio se não houver senha)
$database = "salao";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
