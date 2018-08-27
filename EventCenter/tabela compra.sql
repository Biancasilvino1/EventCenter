create schema eventos;
use eventos;

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

create table `servicos`(
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`servico` varchar (220) NOT NULL,
`descricao` varchar(220) NOT NULL,
quantidade_pessoas int,
valor decimal(10,2)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table `comprar2`(
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`quantidade_servicos` int NOT NULL,
  cliente_id int NOT NULL,
  FOREIGN KEY (cliente_id) REFERENCES clientes(id),
  servico_id int NOT NULL,
  FOREIGN KEY (servico_id) REFERENCES servicos(id)
  );
  
  
  /* tabela comprar vai armazenar id do cliente, e do servico */




