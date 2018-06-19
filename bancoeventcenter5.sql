Create Schema Eventcenter5;
use Eventcenter5;

create table clientes(
id integer primary key NOT NULL,
nome varchar (45),
cpf varchar(14),
telefone varchar(14),
endereco varchar(100),
agencia varchar (100),
contacorrente varchar (100),
email varchar (200),
senha varchar(255),
usuario varchar (255)

);

create table empresas(
id integer primary key NOT NULL,
nome varchar (45),
cnpj varchar(18),
telefone varchar(14),
endereco varchar(100),
agencia varchar (100),
contacorrente varchar (100),
email varchar (200),
senha varchar(255),
usuario varchar (255)

);

create table servicos(
id integer primary key NOT NULL,
servico varchar(45),
especificacao varchar (200),
quantidade_pessoas INT,
valor decimal(10,2),
empresa_id integer,
foreign key(empresa_id) references empresas(id)
);

create table pagamento(
id integer primary key NOT NULL,
nome varchar(45)
);

create table solicitacao(
id integer primary key NOT NULL,
dataehora datetime,
pagamento_id integer,
foreign key(pagamento_id) references pagamento(id),
cliente_id integer,
foreign key(cliente_id) references clientes(id)

);

create table intermediaria(
id integer primary key NOT NULL,
servicos int,
valor_total decimal(10,2),
solicitacao_id integer,
foreign key(solicitacao_id) references solicitacao(id),
servico_id integer,
foreign key(servico_id) references servicos(id)
);




