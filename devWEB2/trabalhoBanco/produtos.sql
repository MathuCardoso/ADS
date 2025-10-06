-- Active: 1755817562131@@127.0.0.1@3307@dbprodutos
/* Tabela de Produto */
CREATE DATABASE dbprodutos;

CREATE TABLE produtos (
	id INTEGER NOT NULL AUTO_INCREMENT,
	descricao VARCHAR(50) NOT NULL,
	un_medida VARCHAR(50) NOT NULL,
	CONSTRAINT pk_produtos PRIMARY KEY (id)
);


INSERT INTO produtos(descricao, un_medida)
VALUES("Uma descrição legal", "metros");