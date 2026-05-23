# FinTech_Lab - Sistema de Gestão de Faturamento

Este é um projeto prático e educacional desenvolvido para consolidar conceitos fundamentais de arquitetura de software, focado no gerenciamento de faturas, cobranças e fluxo de recebimentos corporativos.

A aplicação evoluiu de um painel de leitura simples para um **CRUD completo e dinâmico**, aplicando conceitos avançados de integridade referencial, controle de estados financeiros e otimização de consultas ao banco de dados.

O design da interface foi inspirado em padrões modernos de portais financeiros, estruturado de forma limpa com foco em usabilidade, contadores geométricos reativos e tabelas de dados dinâmicas.

---

## 🚀 Novas Funcionalidades & Engenharia Implementada

* **CRUD Completo de Clientes e Faturas:** Fluxo ponta a ponta para cadastro, listagem, atualização e remoção de registros.
* **Integridade Referencial Injetada:** Associação nativa de faturas com a tabela de clientes através de chaves estrangeiras utilizando elementos relacionais dinâmicos (`<select>`).
* **Gerenciamento de Estados Reativo:** Botões de ação rápida para alteração de status da fatura (*Pagar* e *Marcar como Vencida*) com recálculo automático instantâneo dos indicadores financeiros do painel.
* **Otimização de Performance (Paginação):** Implementação de paginação de dados nativa no back-end utilizando cláusulas `LIMIT` e `OFFSET` para proteger a memória do servidor.
* **Motor de Busca Dinâmico:** Barra de pesquisa integrada via Prepared Statements capaz de filtrar registros simultaneamente por nome do cliente ou ID da fatura.
* **Módulo de Relatório Nativo:** Geração de relatórios de caixa otimizados integrados à API de impressão do navegador (`window.print()`).

---

## 🏗️ Arquitetura do Projeto (Padrão MVC)

O sistema foi modularizado seguindo rigorosamente o padrão **MVC (Model-View-Controller)** com rotas centralizadas em um Front Controller:

```text
sistema-financeiro/
├── config/
│   └── Database.php
│
├── controllers/
│   └── FinanceiroController.php
│
├── models/
│   ├── Fatura.php
│   └── Cliente.php
│
├── views/
│   ├── dashboard.php
│   ├── nova_fatura.php
│   ├── novo_cliente.php
│   └── relatorio_impressao.php
│
├── public/
│   ├── css/
│   │   ├── style.css
│   │   ├── form.css
│   │   └── cliente.css
│   │
│   └── index.php
```

### Estrutura das Camadas

| Camada         | Responsabilidade                                               |
| -------------- | -------------------------------------------------------------- |
| **Model**      | Persistência de dados, consultas SQL e regras de negócio       |
| **View**       | Interface visual e renderização dos dados                      |
| **Controller** | Processamento das requisições e comunicação entre Model e View |

---

## ⚠️ IMPORTANTE: Como Acessar a Aplicação

Por se tratar de uma arquitetura MVC com roteamento centralizado, a aplicação **NÃO deve ser acessada abrindo diretamente os arquivos da pasta `views/`**.

Para que todo o ciclo do MVC funcione corretamente — incluindo tratamento de parâmetros da URL, consultas ao banco e injeção dinâmica de variáveis — o acesso ao sistema deve ser feito obrigatoriamente através do arquivo de entrada:

```text
public/index.php
```

### Exemplo de URL local (XAMPP/Apache)

```text
http://localhost/sistema-financeiro/public/index.php
```

---

## 🔒 Segurança e Boas Práticas Implementadas

### 1. Prepared Statements & BindValue Estrito

Proteção contra ataques de **SQL Injection** utilizando parâmetros nomeados e tipagem explícita (`PDO::PARAM_INT`) em consultas sensíveis.

### 2. Injeção de Dependência

Os Models recebem a conexão PDO via construtor, promovendo desacoplamento e facilitando manutenção e testes.

### 3. Tratamento de Exceções

Uso de `PDO::ERRMODE_EXCEPTION` com blocos `try-catch` para evitar exposição de erros internos do servidor.

### 4. Clean Code & Organização

Estrutura baseada em princípios de organização profissional, nomenclatura padronizada e separação clara de responsabilidades.

---

## 💾 Configuração do Banco de Dados

Execute o script abaixo no **MySQL** ou **phpMyAdmin**:

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
    FOREIGN KEY (cliente_id) REFERENCES clientes (id) ON DELETE CASCADE
);

-- Dados fictícios iniciais
INSERT INTO clientes (nome, cnpj_cpf, email)
VALUES ('Ellyvc23', '111.111.111-11', 'teste@gmail.com');

INSERT INTO faturas (
    cliente_id,
    data_emissao,
    data_vencimento,
    valor,
    status
)
VALUES (
    1,
    '2026-05-21',
    '2026-06-01',
    250.50,
    'Pendente'
);
```

---

## ▶️ Como Executar o Projeto

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/FinTech_Lab.git
```

### 2. Mova o projeto

Coloque a pasta do projeto dentro do diretório do seu servidor local:

Exemplo no XAMPP:

```text
htdocs/
```

### 3. Inicie os serviços

Ative:

* Apache
* MySQL

### 4. Configure o banco

Caso necessário, altere as credenciais em:

```text
config/Database.php
```

### 5. Execute no navegador

```text
http://localhost/sistema-financeiro/public/index.php
```

---

## 🛠️ Tecnologias Utilizadas

* PHP 8+
* MySQL
* PDO
* HTML5
* CSS3
* Arquitetura MVC
* Apache / XAMPP

---

## 📌 Objetivos do Projeto

* Consolidar conceitos de arquitetura MVC
* Trabalhar com persistência de dados utilizando PDO
* Aplicar boas práticas de organização e segurança
* Desenvolver um CRUD completo com relacionamentos
* Simular cenários reais de sistemas financeiros corporativos

---

## 👨‍💻 Autor

Desenvolvido por **Ellyson Vaz** com foco em engenharia de software back-end, arquiteturas escaláveis e boas práticas de desenvolvimento web. 🚀
