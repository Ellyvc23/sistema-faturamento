create database financeiro;
use financeiro;

create table clientes(
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome varchar(50),
    cnpj_cpf varchar(30),
    email varchar(100)
);
create table faturas (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    cliente_id INT,
    data_emissao DATE,
    data_vencimento DATE,
    valor decimal(10,2),
    status varchar(20),
    FOREIGN KEY (cliente_id) REFERENCES clientes (id)
);

INSERT INTO clientes (nome, cnpj_cpf, email) VALUES ('Ellyvc23', '111.11.111-11', 'teste@gmail.com');
INSERT INTO faturas (cliente_id, data_emissao, data_vencimento, valor, status) VALUES (1, '2026-05-21', '2026-06-01', 250.50, 'Pendente');