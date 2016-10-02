# CREATE DATABASE SERVIDOR;
# USE SERVIDOR;

CREATE TABLE Item_Pedido (

  id_Pedido  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_Compra  INT,
  id_Modulo  INT,
  id_Estoque INT,
  Quantidade INT
);

CREATE TABLE Estoque_Produto (

  id_Estoque         INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Codigo_Produto     INT,
  Nome_Produto       VARCHAR(255),
  Descricao_Produto  VARCHAR(255),
  Quantidade_Estoque INT,
  Preco              DECIMAL(10, 2)
);

CREATE TABLE Compra (

  id_Compra        INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_Modulo_Compra INT,
  Data_Compra      DATE,
  Valor_Compra     DECIMAL(10, 2),
  Status           VARCHAR(1)
);

CREATE TABLE Modulo (

  id_Modulo     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Ip_Modulo     VARCHAR(15),
  Status_Modulo VARCHAR(7)
);


ALTER TABLE Item_Pedido ADD CONSTRAINT fk_id_Compra FOREIGN KEY (id_Compra) REFERENCES Compra (id_Compra);


ALTER TABLE Item_Pedido ADD CONSTRAINT fk_id_Estoque FOREIGN KEY (id_Estoque) REFERENCES Estoque_Produto (id_Estoque);

ALTER TABLE Item_Pedido ADD CONSTRAINT fk_id_Modulo FOREIGN KEY (id_Modulo) REFERENCES Modulo (id_Modulo);
ALTER TABLE Compra ADD CONSTRAINT fk_id_Modulo_Compra FOREIGN KEY (id_Modulo_Compra) REFERENCES Modulo (id_Modulo);

ALTER TABLE wendy.Modulo MODIFY Ip_Modulo VARCHAR(15);
ALTER TABLE wendy.Modulo MODIFY Status_Modulo VARCHAR(12);
ALTER TABLE wendy.Item_Pedido DROP FOREIGN KEY fk_id_Modulo;
ALTER TABLE wendy.Compra DROP FOREIGN KEY fk_id_Modulo_Compra;
ALTER TABLE wendy.Modulo MODIFY id_Modulo INT(11) NOT NULL AUTO_INCREMENT;
CREATE UNIQUE INDEX Modulo_id_Modulo_uindex ON wendy.Modulo (id_Modulo);
ALTER TABLE Item_Pedido ADD CONSTRAINT fk_id_Modulo FOREIGN KEY (id_Modulo) REFERENCES Modulo (id_Modulo);
ALTER TABLE Compra ADD CONSTRAINT fk_id_Modulo_Compra FOREIGN KEY (id_Modulo_Compra) REFERENCES Modulo (id_Modulo);