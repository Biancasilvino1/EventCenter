CREATE SCHEMA triggers2;
USE triggers2;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(220) NOT NULL,
  `cpf` varchar(220) NOT NULL,
  `telefone` varchar(220) NOT NULL,
  `endereco` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT into clientes VALUES (NULL, 'bianca','00000000000','88888888','rua belo horizonte','biancasilvino6@gmail.com','bianca','jesuscristo');

CREATE TABLE clientes_audit ( 
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	cliente_id int NOT NULL, 
	old_nome varchar(220) NOT NULL, 
	new_nome varchar(220) NOT NULL, 
    old_cpf varchar (220) NOT NULL, 
    new_cpf varchar(220) NOT NULL,
    old_telefone varchar (220) NOT NULL, 
    new_telefone varchar(220) NOT NULL,
    old_endereco varchar (220) NOT NULL,
    new_endereco varchar(220) NOT NULL,
    old_email varchar (220) NOT NULL,
    new_email varchar(220) NOT NULL,
    old_usuario varchar (220) NOT NULL,
	new_usuario varchar (220) NOT NULL,
	old_senha varchar (220) NOT NULL,
    new_senha varchar (220) NOT NULL,
	changedon datetime DEFAULT NULL, 
	action varchar(50) DEFAULT NULL 
);

DELIMITER $$
CREATE TRIGGER before_cliente_update 
    BEFORE UPDATE ON clientes
    FOR EACH ROW BEGIN
 
    INSERT INTO clientes_audit
    SET action = 'update',
        cliente_id = OLD.id,
        old_nome = OLD.nome,
		new_nome = NEW.nome,
        old_cpf=OLD.cpf, 
		new_cpf=NEW.cpf,
     old_telefone=OLD.telefone, 
     new_telefone=NEW.telefone,
    old_endereco=OLD.endereco,
     new_endereco=NEW.endereco,
    old_email=OLD.email,
    new_email=NEW.email,
    old_usuario=OLD.usuario,
	new_usuario=NEW.usuario,
	old_senha=OLD.senha,
    new_senha=NEW.senha,
	changedon = NOW(); 
END$$
DELIMITER ;

UPDATE clientes SET nome = 'lays' WHERE id = 1; /*fiz a atualização do nome só pra dar o exemplo mas tá configurado na tabela acima 
pra mudar qualquer parametro*/


SELECT * FROM clientes_audit; /*esse select mostra o que foi alterado,por quem, junto com a data e hora*/
