CREATE DATABASE uzzebd;


USE uzzebd;

/* LógicoUzze: */

CREATE TABLE consumidor (
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(11),
    email VARCHAR(100),
    nome VARCHAR(100),
    id INT PRIMARY KEY NOT NULL,
    cpf CHAR(11),
    imagem VARBINARY(MAX)
);

CREATE TABLE loja (
    id INT PRIMARY KEY NOT NULL,
    nome VARCHAR(100),
    cnpj CHAR(14),
    email VARCHAR(100),
    telefone VARCHAR(11),
    senha VARCHAR(100) NOT NULL,
    imagem VARBINARY(MAX)
);

CREATE TABLE produto (
    id INT PRIMARY KEY NOT NULL,
    nome VARCHAR(100),
    tamanho CHAR(1),
    valor_uni DECIMAL,
    cor VARCHAR(100),
    descricao VARCHAR(300),
    quantidade INT,
    imagem VARBINARY(MAX),
	fk_lojaID int,
	FOREIGN KEY (fk_lojaID) references loja(id)
    
);

CREATE TABLE venda (
    id INT PRIMARY KEY NOT NULL,
    quantidade_vendida INT,
    data_hora DATETIME,
    valor_uni DECIMAL,
	fk_produtoID INT,
	fk_consumidorID INT,
    FOREIGN KEY (fk_produtoID) references produto(id),
	FOREIGN KEY (fk_consumidorID) references consumidor(id)
);




