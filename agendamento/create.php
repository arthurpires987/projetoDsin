<?php
include 'config.php';

$message = ""; // Variável para armazenar a mensagem de sucesso ou erro

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $servico = $_POST['servico'];
    $data_agendamento = $_POST['data_agendamento'];
    $hora_agendamento = $_POST['hora_agendamento'];

    $sql = "INSERT INTO agendamentos (cliente, servico, data_agendamento, hora_agendamento) VALUES ('$cliente', '$servico', '$data_agendamento', '$hora_agendamento')";

    if ($conn->query($sql) === TRUE) {
        // Mensagem de sucesso
        $message = "Agendamento realizado com sucesso!";
    } else {
        // Mensagem de erro
        $message = "Erro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Agendamento</title>
    <link rel="stylesheet" href="style.css"> <!-- Certifique-se de adicionar um arquivo CSS para estilizar -->
</head>
<body>
    <form method="post">
        <!-- Campos do formulário para criar agendamento -->
        <label>Cliente:</label>
        <input type="text" name="cliente" required>

        <label>Serviço:</label>
        <input type="text" name="servico" required>

        <label>Data:</label>
        <input type="date" name="data_agendamento" required>

        <label>Hora:</label>
        <input type="time" name="hora_agendamento" required>

        <button type="submit">Criar Agendamento</button>
    </form>

    <!-- Exibe a mensagem de sucesso ou erro -->
    <?php if (!empty($message)): ?>
        <script>
            alert("<?php echo $message; ?>");
            // Redireciona para a página inicial após o alerta
            window.location.href = "../agendamento/read.php"; 
        </script>
    <?php endif; ?>

</body>
</html>
