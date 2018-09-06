create schema eventcenter;
use eventcenter;

CREATE TABLE clientes (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(220) NOT NULL,
  cpf varchar(220) NOT NULL,
  telefone varchar(220) NOT NULL,
  endereco varchar(220) NOT NULL,
  email varchar(220) NOT NULL,
  usuario varchar(220) NOT NULL,
  senha varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create index ind_nome_cliente on clientes (nome);

CREATE TABLE arearestrita (
  id int(11) NOT NULL,
  usuario varchar(220) NOT NULL,
  senha varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into arearestrita values (1, 'romulo', '$2y$10$2fX3DO9wko.vHc2r/Dl8z.6Eys5lW.kGPVNwLh.HZy4Oog8pSA9oa');

DELIMITER $$
CREATE TRIGGER before_cliente_update BEFORE UPDATE ON clientes FOR EACH ROW BEGIN
 
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
END
$$
DELIMITER ;

CREATE TABLE clientes_audit (
  id int(11) NOT NULL,
  cliente_id int(11) NOT NULL,
  old_nome varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_nome varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  old_cpf varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_cpf varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  old_telefone varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_telefone varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  old_endereco varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_endereco varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  old_email varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_email varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  old_usuario varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_usuario varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  old_senha varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  new_senha varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  changedon datetime DEFAULT NULL,
  action varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table tipodeevento (
	id int not null auto_increment primary key,
    nome varchar(220)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into tipodeevento (nome) values ('Casamento');
insert into tipodeevento (nome) values ('Formatura');
insert into tipodeevento (nome) values ('Aniversario');

create table servicos(
	id int not null auto_increment primary key,
	nome varchar (220),
    maximodepessoas varchar (220),
    imagem varchar(220),
    valor decimal (5,2),
    evento_id int,
    foreign key(evento_id) references tipodeevento(id) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into servicos values (1, "Barman", "100 Pessoas", "imagens/barman.png", 400.00, 1);
insert into servicos values (2, "Buffet", "100 Pessoas", "imagens/buffet.png", 400.00, 1);
insert into servicos values (3, "Cerimonialista", "100 Pessoas", "imagens/cerimonialista.png", 400.00, 1);
insert into servicos values (4, "Decoração", "100 Pessoas", "imagens/decoracao.jpg", 600.00, 1);
insert into servicos values (5, "DJ", "100 Pessoas", "imagens/dj.png", 600.00, 2);
insert into servicos values (6, "Doces e salgados", "100 Pessoas", "imagens/docesesalgados.jpg", 600.00, 2);
insert into servicos values (7, "Garçom", "100 Pessoas", "imagens/garcom.jpg", 600.00, 2);
insert into servicos values (8, "Iluminação", "100 Pessoas", "imagens/iluminacao.jpg", 600.00, 2);

create table compras(
	id int(11) not null auto_increment primary key,
    cliente_id int,
    foreign key(cliente_id) references clientes(id),
    tipodeevento_id int,
    foreign key(tipodeevento_id) references tipodeevento(id),
    servico_id int,
    foreign key(servico_id) references servicos(id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DELETE FROM compras WHERE id = 1;