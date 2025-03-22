<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="read.css"> <!-- Link para o CSS -->
    <link rel="stylesheet" href="../main.css">
</head>
<body>

<a href="../inicio/inicio.html">
    <img src="../imagens/logoCL.jpg" alt="logoCL" id="logoCL">
    <div class="name">Cabeleleila Leila</div>
    <div class="name2">Salão de Beleza</div> 
    <br>
    <h1>Lista de Agendamentos</h1>
</a>

<?php
$sql = "SELECT * FROM agendamentos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Ações</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['cliente']}</td>
                <td>{$row['servico']}</td>
                <td>{$row['data_agendamento']}</td>
                <td>{$row['hora_agendamento']}</td>
                <td class='actions'>
                    <a href='update.php?id={$row['id']}'>✏️ Editar</a> | 
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>🗑️ Excluir</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nenhum agendamento encontrado.</p>";
}

$conn->close();
?>

<!-- Botão para voltar para a aba de agendamento -->
<div class="button-container">
    <a href="../agendamento/agendamento.php" class="back-button">Voltar para Agendamento</a>
</div>

<!-- Remover o código JS que escondia as ações -->
<script>
    // Removido o código que escondia os botões de ação para clientes
</script>

</body>
</html>
