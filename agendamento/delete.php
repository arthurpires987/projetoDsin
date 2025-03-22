<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM agendamentos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Exibe a mensagem de sucesso em um prompt
        $message = "Agendamento excluído com sucesso!";
    } else {
        // Exibe a mensagem de erro em um prompt
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
    <title>Excluir Agendamento</title>
</head>
<body>
    <a href="read.php" class="back-button">Voltar para a lista</a>

    <?php if (isset($message)): ?>
        <script>
            alert("<?php echo $message; ?>");
            window.location.href = "read.php";  // Após o alert, redireciona para a lista de agendamentos
        </script>
    <?php endif; ?>
</body>
</html>
