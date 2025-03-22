const express = require("express");
const fs = require("fs");
const path = require("path");
const cors = require("cors");

const app = express();
const PORT = 3000;
const USERS_FILE = path.join(__dirname, "usuarios.txt");

// Middleware para processar JSON e permitir requisições do frontend
app.use(express.json());
app.use(cors());

// Rota para cadastrar um novo usuário
app.post("/register", (req, res) => {
    const { name, email, password } = req.body;

    // Verifica se o usuário já existe
    if (fs.existsSync(USERS_FILE)) {
        const users = fs.readFileSync(USERS_FILE, "utf-8").split("\n").filter(Boolean);
        if (users.some(user => user.split(":")[0] === email)) {
            return res.status(400).json({ message: "E-mail já cadastrado!" });
        }
    }

    // Adiciona o novo usuário ao arquivo
    const userData = `${email}:${password}:cliente\n`;
    fs.appendFileSync(USERS_FILE, userData);

    res.json({ message: "Cadastro realizado com sucesso!" });
});

// Rota para verificar login
app.post("/login", (req, res) => {
    const { email, password } = req.body;
    let users = [];

    // Adiciona um administrador fixo
    const adminEmail = "admin@gmail.com";
    const adminPassword = "admin123";

    // Verifica se o login é do administrador
    if (email === adminEmail && password === adminPassword) {
        return res.json({ message: "Login como Administrador :)", role: "admin", redirect: "agendamento/read.php" });
    }

    // Verifica se o arquivo de usuários existe
    if (fs.existsSync(USERS_FILE)) {
        users = fs.readFileSync(USERS_FILE, "utf-8").split("\n").filter(Boolean);
    }

    // Verifica se o usuário está na lista
    const userFound = users.find(user => {
        const [storedEmail, storedPassword] = user.split(":");
        return storedEmail === email && storedPassword === password;
    });

    if (userFound) {
        return res.json({ message: "Login bem-sucedido!", role: "cliente", redirect: "inicio/inicio.html" });
    } else {
        res.status(401).json({ message: "E-mail ou senha incorretos!" });
    }
});

app.listen(PORT, () => {
    console.log(`Servidor rodando em http://localhost:${PORT}`);
});
