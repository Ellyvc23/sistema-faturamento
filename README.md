# FinTech_Lab - Sistema de Gestão de Faturamento

Este é um projeto prático e educacional desenvolvido para consolidar conceitos fundamentais de arquitetura de software, focado no gerenciamento de faturas, cobranças e fluxo de recebimentos corporativos.

O design da interface foi inspirado em padrões modernos de portais financeiros, estruturado de forma limpa com foco em usabilidade, contadores geométricos bem definidos e tabelas de dados dinâmicas.

---

## 🚀 Tecnologias Utilizadas

* **PHP 8.x** (Back-end estruturado sob o paradigma de Orientação a Objetos)
* **MySQL / MariaDB** (Banco de dados relacional)
* **PDO (PHP Data Objects)** (Interface segura de comunicação com o banco de dados)
* **HTML5 & CSS3** (Estruturação visual baseada em Grid e Flexbox com ícones via FontAwesome)

---

## 🏗️ Arquitetura do Projeto (Padrão MVC)

O sistema foi modularizado seguindo rigorosamente o padrão **MVC (Model-View-Controller)** para garantir a separação de responsabilidades:

```text
sistema-financeiro/
├── config/
│   └── Database.php              # Conexão PDO com o Banco de Dados (POO)
├── controllers/
│   └── FinanceiroController.php  # Maestro do sistema: processa regras e chama a View
├── models/
│   └── Fatura.php                # Manipulação e consultas de dados (Persistência)
├── views/
│   └── dashboard.php             # Interface visual (HTML/CSS dinâmico)
├── public/
│   ├── css/
│   │   └── style.css             # Estilização visual completa do painel
│   └── index.php                 # Ponto de Entrada / Front Controller unificado
```

---

## ⚠️ IMPORTANTE: Como Acessar a Aplicação

Por se tratar de uma arquitetura MVC com roteamento centralizado em um **Front Controller**, a aplicação **NÃO deve ser acessada abrindo diretamente** o arquivo:

```text
views/dashboard.php
```

Para que todo o fluxo do MVC funcione corretamente — incluindo consultas ao banco de dados, processamento das regras de negócio e injeção dinâmica de variáveis no HTML — o sistema deve ser acessado obrigatoriamente através do ponto de entrada principal:

```text
public/index.php
```

### Exemplo de URL no ambiente local (XAMPP/Apache)

```text
http://localhost/sistema-financeiro/public/index.php
```

---

## 🔒 Segurança e Boas Práticas Implementadas

### ✅ Prepared Statements

Total proteção contra ataques de **SQL Injection**, utilizando consultas parametrizadas com marcações nominais como:

```php
:status
```

---

### ✅ Injeção de Dependência

O Model `Fatura` recebe a conexão ativa do PDO via construtor, promovendo:

- Desacoplamento de código
- Maior reutilização
- Facilidade para testes unitários
- Melhor manutenção da aplicação

---

### ✅ Tratamento de Exceções

Configuração do:

```php
PDO::ERRMODE_EXCEPTION
```

com tratamento utilizando blocos `try-catch`, evitando exposição de informações sensíveis do servidor ao usuário final.

---

### ✅ Namespaces (PSR-4)

Estrutura organizada seguindo padrões modernos de desenvolvimento PHP, evitando colisões de classes e preparando o projeto para utilização futura de:

- Autoloaders
- Composer
- Escalabilidade modular

---

## 💾 Configuração do Banco de Dados

Para rodar o projeto localmente, execute o seguinte script no console do MySQL ou phpMyAdmin:

```sql
CREATE DATABASE financeiro;

USE financeiro;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome VARCHAR(50),
    cnpj_cpf VARCHAR(30),
    email VARCHAR(100)
);

CREATE TABLE faturas (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cliente_id INT,
    data_emissao DATE,
    data_vencimento DATE,
    valor DECIMAL(10,2),
    status VARCHAR(20),
    FOREIGN KEY (cliente_id) REFERENCES clientes (id)
);

-- Dados fictícios para teste inicial
INSERT INTO clientes (nome, cnpj_cpf, email)
VALUES ('Ellyson', '132.691.089-23', 'ellysonvaz@gmail.com');

INSERT INTO faturas (
    cliente_id,
    data_emissao,
    data_vencimento,
    valor,
    status
) VALUES (
    1,
    '2026-05-21',
    '2026-06-01',
    250.50,
    'Pendente'
);
```

---

## ▶️ Como Executar o Projeto

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/FinTech_Lab.git
```

2. Coloque a pasta do projeto dentro do diretório do XAMPP:

```text
htdocs/
```

3. Inicie:

- Apache
- MySQL

no painel do XAMPP.

4. Configure as credenciais do banco no arquivo:

```text
config/Database.php
```

5. Acesse no navegador:

```text
http://localhost/sistema-financeiro/public/index.php
```

---

## 🎯 Objetivo do Projeto

Este projeto foi desenvolvido com fins educacionais para praticar:

- Arquitetura MVC
- Programação Orientada a Objetos em PHP
- Integração com Banco de Dados
- Boas práticas de segurança
- Estruturação profissional de aplicações web

---

## 👨‍💻 Autor

Desenvolvido por **Ellyson Vaz** com foco em aprendizado contínuo e aprimoramento em engenharia de software back-end. 🚀