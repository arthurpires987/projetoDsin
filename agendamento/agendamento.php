<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="agendamento.css">
</head>
<body>
<header>
    <a href="../inicio/inicio.html">
        <img src="../imagens/logoCL.jpg" alt="logoCL" id="logoCL">
        <div class="name">Cabeleleila Leila</div>
        <div class="name2">Salão de Beleza</div>
    </a>
    <div class="header-buttons">
        <a href="read.php" class="btn-header">Ver Agendamentos</a>
    </div>
    <button id="logoutButton" class="btn-header">Sair</button>
</header>

    <nav>
    <a href="../inicio/inicio.html">Início</a>
        <a href="../sobre/sobre.html">Sobre</a>
        <a href="../servicos/servicos.html">Serviços</a>
        <a href="../agendamento/agendamento.php">Agendamento</a>
        <a href="../contato/contato.html">Contato</a>    </nav>
    </nav>

    <section id="agendamento">
        <h2>Agendamentos</h2>

        <form action="create.php" method="post">
            Cliente: <input type="text" name="cliente" required><br><br>
            Serviço: <input type="text" name="servico" required><br><br>
            Data: <input type="date" name="data_agendamento" required><br><br>
            Hora: <input type="time" name="hora_agendamento" required><br>
            <button type="submit">Agendar</button>
        </form>        
        </div>
    </section>

    <footer>
        &copy; 2025 Cabeleleila Leila. Todos os direitos reservados.
    </footer>

    <script src="script.js"></script>
</body>
</html>
