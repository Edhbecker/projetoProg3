---------------------------------------------------------------------------------------------------------------------------------------------------------------
-- Script de Criação das Tabelas - (MySQL)

-- criação da tabela fornecedor
 CREATE TABLE fornecedor (
              id_fornecedor INT PRIMARY KEY AUTO_INCREMENT,
              nome VARCHAR(255),
              contato VARCHAR(255),
              documento VARCHAR(255));

-- criação da tabela tipo_vinho
 CREATE TABLE tipo_vinho (
              id_tipo_vinho INT PRIMARY KEY AUTO_INCREMENT,
              descricao VARCHAR(255));

-- criação da tabela bodega
 CREATE TABLE bodega (
              id_bodega INT PRIMARY KEY AUTO_INCREMENT,
              nome VARCHAR(255),
              origem VARCHAR(255));

-- criação da tabela vinho
 CREATE TABLE vinho (
			  id_vinho INT PRIMARY KEY AUTO_INCREMENT,
			  nome VARCHAR(255),
			  safra INT,
     		  preco FLOAT,
			  teor FLOAT,
  			  qtd_estoque INT,
			  id_tipo_vinho INT,
			  id_bodega INT,
 FOREIGN KEY (id_tipo_vinho) REFERENCES tipo_vinho (id_tipo_vinho),
 FOREIGN KEY (id_bodega) REFERENCES bodega (id_bodega));
 
-- criação da tabela fornecedor_vinho
 CREATE TABLE fornecedor_vinho (
              id_fornecedor_vinho INT PRIMARY KEY AUTO_INCREMENT,
              id_fornecedor INT,
              id_vinho INT,
              FOREIGN KEY (id_fornecedor) REFERENCES fornecedor (id_fornecedor),
              FOREIGN KEY (id_vinho) REFERENCES vinho (id_vinho));

-- criação da tabela usuario
 CREATE TABLE usuario (
              id_usuario INT PRIMARY KEY AUTO_INCREMENT,
              nome VARCHAR(255),
              admin INT NOT NULL, -- 0 = usuario comum, 1 = administrador
              senha VARCHAR(255) NOT NULL);
			  
-- criação da tabela movimento_produto
 CREATE TABLE movimento_produto (
	          id_movimento_produto INT PRIMARY KEY AUTO_INCREMENT,
	          id_vinho INT,
	          data_movimento DATE NOT NULL,
	          qtd_movimento INT NOT NULL,
	          fl_movimento INT NOT NULL, -- 0 = entrada, 1 = saida
	          FOREIGN KEY (id_vinho) REFERENCES vinho (id_vinho));
			  
---------------------------------------------------------------------------------------------------------------------------------------------------------------			  