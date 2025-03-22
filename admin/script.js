// Função para o botão de logout
document.getElementById("logoutButton").addEventListener("click", function() {
    // Exibe um alerta informando o logout
    alert("Você foi deslogado. :/");
    
    // Redireciona o usuário para a página de login
    window.location.href = "../index.html";
});