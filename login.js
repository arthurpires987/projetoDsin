document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem('role')) {
        // Se já estiver logado, redireciona diretamente para a página de agendamentos ou página inicial
        const role = localStorage.getItem('role');
        if (role === 'admin') {
            window.location.href = "admin.php";  // Redireciona para a página do admin
        } else {
            window.location.href = "inicio/inicio.html"; // Página do cliente
        }
    }

    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        fetch("http://localhost:3000/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ email, password }),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);

            // Salva a role no localStorage
            if (data.role) {
                localStorage.setItem("role", data.role);
            }

            // Redireciona com base na resposta
            if (data.redirect) {
                if (data.role === 'admin') {
                    window.location.href = "admin.php"; // Redireciona para o admin.php
                } else {
                    window.location.href = data.redirect; // Redireciona para o início ou outra página do cliente
                }
            }
        })
        .catch(error => alert("Erro ao fazer login!"));
    });

    document.getElementById("registerForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const name = document.getElementById("name").value;
        const email = document.getElementById("registerEmail").value;
        const password = document.getElementById("registerPassword").value;

        fetch("http://localhost:3000/register", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ name, email, password }),
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => alert("Erro ao cadastrar usuário!"));
    });

    document.getElementById("showRegisterForm").addEventListener("click", function () {
        document.getElementById("loginDiv").style.display = "none";
        document.getElementById("registerDiv").style.display = "block";
    });

    document.getElementById("showLoginForm").addEventListener("click", function () {
        document.getElementById("registerDiv").style.display = "none";
        document.getElementById("loginDiv").style.display = "block";
    });
});
