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
│   └── Database.php          # Conexão PDO com o Banco de Dados (POO)
├── controllers/
│   └── FinanceiroController.php # Maestro do sistema: processa regras e chama a View
├── models/
│   └── Fatura.php           # Manipulação e consultas de dados (Persistência)
├── views/
│   └── dashboard.php         # Interface visual (HTML/CSS dinâmico)
├── public/
│   ├── css/
│   │   └── style.css         # Estilização visual completa do painel
│   └── index.php             # Ponto de Entrada / Front Controller unificado