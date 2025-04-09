-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS sistema_tarefas;

-- Usar o banco de dados criado
USE sistema_tarefas;

-- Criar a tabela de tarefas
CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    concluida BOOLEAN DEFAULT FALSE,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);