<?php
include 'config.php';

$atualizado = false; // Variável para verificar se houve atualização
$row = null; // Variável para armazenar os dados do agendamento para edição

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $cliente = $_POST['cliente'];
    $servico = $_POST['servico'];
    $data_agendamento = $_POST['data_agendamento'];
    $hora_agendamento = $_POST['hora_agendamento'];

    $sql = "UPDATE agendamentos SET cliente='$cliente', servico='$servico', data_agendamento='$data_agendamento', hora_agendamento='$hora_agendamento' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $atualizado = true; // Define como true para exibir a mensagem de sucesso
        $message = "Agendamento atualizado com sucesso!";
    } else {
        $message = "Erro: " . $conn->error;
    }
}

// Carregar os dados do agendamento para edição, caso o ID esteja presente na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM agendamentos WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Caso o agendamento não seja encontrado, você pode adicionar um tratamento de erro aqui
        die("Agendamento não encontrado.");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Agendamento</title>
    <link rel="stylesheet" href="update.css"> <!-- Link para o arquivo CSS -->
</head>
<body>
    <div class="form-container">
        <?php if ($atualizado): ?>
            <script>
                alert("<?php echo $message; ?>");
                window.location.href = "read.php"; // Após o alert, redireciona para a lista de agendamentos
            </script>
        <?php else: ?>
            <h2>Atualizar Agendamento</h2>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label>Cliente:</label>
                <input type="text" name="cliente" value="<?php echo $row['cliente']; ?>" required>

                <label>Serviço:</label>
                <input type="text" name="servico" value="<?php echo $row['servico']; ?>" required>

                <label>Data:</label>
                <input type="date" name="data_agendamento" value="<?php echo $row['data_agendamento']; ?>" required>

                <label>Hora:</label>
                <input type="time" name="hora_agendamento" value="<?php echo $row['hora_agendamento']; ?>" required>

                <button type="submit">Atualizar</button>
            </form>
        <?php endif; ?>
    </div>

    <?php $conn->close(); // Fechar a conexão após todas as operações com o banco ?>
</body>
</html>
