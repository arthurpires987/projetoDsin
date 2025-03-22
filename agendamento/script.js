document.addEventListener("DOMContentLoaded", function () {
    // Lista de horários com disponibilidade
    const horarios = [
        { hora: "08:00", disponivel: true },
        { hora: "09:00", disponivel: true },
        { hora: "10:00", disponivel: false },
        { hora: "11:00", disponivel: true },
        { hora: "12:00", disponivel: true },
        { hora: "13:00", disponivel: false },
        { hora: "14:00", disponivel: true },
        { hora: "15:00", disponivel: true },
        { hora: "16:00", disponivel: false },
        { hora: "17:00", disponivel: true },
        { hora: "18:00", disponivel: true },
    ];

    // Preencher a tabela com horários disponíveis e indisponíveis
    function gerarTabelaHorarios() {
        const tabela = document.getElementById("horariosTable");
        tabela.innerHTML = "<tr><th>Horário</th></tr>"; // Cabeçalho da tabela

        horarios.forEach(item => {
            const row = document.createElement("tr");
            const cell = document.createElement("td");

            cell.textContent = item.hora;
            cell.classList.add(item.disponivel ? "available" : "unavailable"); // Adiciona classe para estilização

            row.appendChild(cell);
            tabela.appendChild(row);
        });
    }

    // Preencher o select de horários disponíveis
    function preencherSelectHorarios() {
        const select = document.getElementById("hora");
        select.innerHTML = ""; // Limpar antes de preencher

        horarios.forEach(item => {
            if (item.disponivel) {
                const option = document.createElement("option");
                option.value = item.hora;
                option.textContent = item.hora;
                select.appendChild(option);
            }
        });
    }

    // Executa as funções ao carregar a página
    gerarTabelaHorarios();
    preencherSelectHorarios();

    // Submissão do formulário de agendamento
    document.getElementById("agendamentoForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Evita recarregar a página

        const servico = document.getElementById("servico").value;
        const horarioEscolhido = document.getElementById("hora").value;

        alert(`Serviço: ${servico}\nHorário agendado: ${horarioEscolhido}`); // Exibe alerta com informações do agendamento
    });
});

// Função para o botão de logout
document.getElementById("logoutButton").addEventListener("click", function() {
    // Exibe um alerta informando o logout
    alert("Você foi deslogado. :/");
    
    // Redireciona o usuário para a página de login
    window.location.replace("../index.html");
});
