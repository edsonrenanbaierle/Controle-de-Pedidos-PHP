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
	dataPedido DATE NOT NULL,
	dataEntregaPedido DATE NOT NULL,
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