![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)
![Apache](https://img.shields.io/badge/Apache-2.4-red?logo=apache)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-15-blue?logo=postgresql)
![Docker](https://img.shields.io/badge/Docker-Enabled-2496ED?logo=docker)
![Status](https://img.shields.io/badge/Status-Em%20Desenvolvimento-yellow)
![License](https://img.shields.io/badge/License-MIT-green)

# 📌 Task Manager Pro

Este projeto é um sistema web de gerenciamento de tarefas (To-Do List) desenvolvido como parte da disciplina de Programação Web II do curso de Sistemas de Informação.

A aplicação utiliza PHP com Apache e PostgreSQL, sendo totalmente containerizada com Docker.

---

## 🎓 Identificação do Projeto

- **Título:** TaskManager Pro Max  
- **Aluno:** Leonardo Girardi Leal  
- **Curso:** Sistemas de Informação  
- **Disciplina:** Programação Web II (Optativa)  
- **Professora:** Amanda Spader  

---

## 🚀 Tema do Projeto

Sistema web de gerenciamento de tarefas (To-Do List).

---

## ❗ Problema a Ser Resolvido

O sistema visa resolver o problema de organização e gerenciamento de tarefas no cotidiano de um indivíduo, permitindo melhor controle das atividades diárias.

---

## 🎯 Objetivo Geral

Oferecer uma forma simples e eficiente de cadastrar, visualizar e acompanhar tarefas, promovendo organização pessoal e produtividade.

---

## 🎯 Objetivos Específicos

- Realizar cadastro de usuários  
- Permitir autenticação (login e logout)  
- Implementar CRUD completo de tarefas  
- Permitir marcar tarefas como concluídas ou pendentes  
- Adicionar prioridade às tarefas (baixa, média, alta)  
- Criar interface amigável  

---

## ⚙️ Funcionalidades do Sistema

O sistema permite que o usuário:

- Crie uma conta e realize login de forma segura  
- Cadastre tarefas com título, descrição e prioridade  
- Visualize todas as suas tarefas  
- Edite tarefas existentes  
- Exclua tarefas  
- Marque tarefas como concluídas ou pendentes  

---

## 🧠 Tecnologias Utilizadas

- PHP 8.x  
- Apache  
- PostgreSQL 15 
- Docker  
- Docker Compose  

---


## 📦 Estrutura do Projeto

- /app → Código da aplicação PHP  
- Dockerfile → Configuração do ambiente PHP + Apache  
- docker-compose.yml → Orquestração dos serviços  
- .env → Variáveis de ambiente  

---

## ⚙️ Como executar o projeto

### 1. Clonar o repositório

```bash
git clone https://github.com/SEU_USUARIO/task_manager.git
cd task_manager
````
### 2. Criar arquivo .env

```bash
POSTGRES_DB=task_manager_db
POSTGRES_USER=task_user
POSTGRES_PASSWORD=admin
````

### 3. Subir Containers

```bash
docker compose up -d --build
````

### 4. Acessar Aplicação

```bash
http://localhost:8080
````

---
