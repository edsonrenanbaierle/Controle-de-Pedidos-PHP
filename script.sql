CREATE TABLE usuario(
	idUsuario INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(150) NOT NULL UNIQUE, 
	senha VARCHAR(100) NOT NULL,
	endereco VARCHAR(200) NOT NULL,
	cep VARCHAR(30) NOT NULL
);

CREATE TABLE tipoPagamento(
	idPagamento INT PRIMARY KEY AUTO_INCREMENT,
	nomePagamento VARCHAR(30) NOT NULL
);

CREATE TABLE status(
	idStatus INT PRIMARY KEY AUTO_INCREMENT,
	nomeStatus VARCHAR(20) NOT NULL
);

CREATE TABLE pedido(
	idPedido INT PRIMARY KEY AUTO_INCREMENT,
	dataPedido DATETIME NOT NULL,
	dataEntregaPedido DATETIME NOT NULL,
	idTipoPagamento INT NOT NULL,
	idStatus INT NOT NULL,
	idUsuario INT NOT NULL,
	FOREIGN KEY (idTipoPagamento) REFERENCES tipoPagamento(idPagamento),
    FOREIGN KEY (idStatus) REFERENCES status(idStatus),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

CREATE TABLE produto(
	idProduto INT PRIMARY KEY AUTO_INCREMENT,
	estoque INT NOT NULL,
	nome VARCHAR(50) NOT NULL,
	preco INT NOT NULL,
	descricao VARCHAR(100) NOT NULL
);

CREATE  TABLE item(
	idItem INT PRIMARY KEY AUTO_INCREMENT,
	quantidade INT NOT NULL,
	idProduto INT NOT NULL,
	idPedido INT NOT NULL,
	FOREIGN KEY (idProduto) REFERENCES produto(idProduto),
    FOREIGN KEY (idPedido) REFERENCES pedido(idPedido)
);

INSERT INTO status (nomeStatus) values ("enviado");
INSERT INTO status (nomeStatus) values ("cancelado");
INSERT INTO status (nomeStatus) values ("entregue");

INSERT INTO tipoPagamento (nomePagamento) values ("cartao de credito"); 
INSERT INTO tipoPagamento (nomePagamento) values ("dinheiro"); 
INSERT INTO tipoPagamento (nomePagamento) values ("cartao de debito"); 

INSERT  INTO produto (estoque, nome, preco, descricao) values (20, "Capinha de Celular", 1500, "Capinha Celular Iphone 8");
INSERT  INTO produto (estoque, nome, preco, descricao) values (5, "Camiseta", 10000, "Camiseta Feminina G");
INSERT  INTO produto (estoque, nome, preco, descricao) values (14, "Bermuda", 5000, "Bermuda Masculina");
INSERT  INTO produto (estoque, nome, preco, descricao) values (2, "Chuteira", 35000, "Chuteira Masculina De Campo, numero 42");
