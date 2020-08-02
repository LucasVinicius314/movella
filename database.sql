drop database if exists movella;
create database movella;
use movella;

##### TABLES

create table tbl_usuario (
  id int unsigned not null auto_increment primary key,
  celular varchar(11),
  email varchar(200) not null,
  endereco varchar(200),
  senha char(40) not null,
  usuario varchar(20) not null,
  acesso int not null default 1
);

create table tbl_categoria (
  id int unsigned not null auto_increment primary key,
  nome varchar(20) not null
);

create table tbl_movel (
  id int unsigned not null auto_increment primary key,
  categoriaId int unsigned not null, foreign key(categoriaId) references tbl_categoria(id),
  usuarioId int unsigned not null, foreign key(usuarioId) references tbl_usuario(id),
  descricao text,
  imagem varchar(100) not null default 'default.png',
  nome varchar(40) not null,
  valorMes double(9, 2) not null,
  disponivel bool not null
);

create table tbl_aluguel (
  id int unsigned not null auto_increment primary key,
  movelId int unsigned not null, foreign key(movelId) references tbl_movel(id),
  usuarioId int unsigned not null, foreign key(usuarioId) references tbl_usuario(id),
  dataInicio datetime not null default now(),
  dataFim datetime not null,
  valorFrete double(9, 2) not null,
  -- movel
  descricao text,
  imagem varchar(100) default 'default.png',
  nome varchar(40),
  valorMes double(9, 2)
);

##### TRIGGERS

delimiter //

create trigger after_aluguel_insert
before insert
on tbl_aluguel for each row
begin
  select
    descricao,
    imagem,
    nome,
    valorMes
  into
    @descricao,
    @imagem,
    @nome,
    @valorMes
  from tbl_movel m
  where m.id = new.movelId;

	set new.descricao = @descricao;
	set new.imagem = @imagem;
	set new.nome = @nome;
	set new.valorMes = @valorMes;
end //

delimiter ;

##### VIEWS

create view view_movel as
select
  u.usuario,
  c.nome as categoria,
  m.nome,
  m.descricao,
  m.imagem,
  m.valorMes,
  m.disponivel
from tbl_movel m
join tbl_categoria c on m.categoriaId = c.id
join tbl_usuario u on m.usuarioId = u.id;

create view view_aluguel as
select
  a.id,
  u2.usuario as locador,
  u.usuario as locatario,
  a.nome,
  c.nome as categoria,
  a.valorMes,
  a.valorFrete,
  a.dataInicio,
  a.dataFim,
  a.descricao,
  a.imagem,
  u.email,
  u.celular
from tbl_aluguel a
join tbl_movel m on a.movelId = m.id
join tbl_categoria c on m.categoriaId = c.id
join tbl_usuario u on a.usuarioId = u.id
join tbl_usuario u2 on m.usuarioId = u2.id;

##### INSERTS

insert into tbl_usuario (celular, email, endereco, senha, usuario, acesso) values
('00000000000', 'admin@gmail.com', 'Endereço', sha1('1234'), 'admin', 3),
('31912345678', 'pedro@gmail.com', 'Rua 1', sha1('1234'), 'Pedro', 1),
('31912345678', 'caio@gmail.com', 'Rua 2', sha1('1234'), 'Caio', 1),
('31912345678', 'caique@gmail.com', 'Rua 3', sha1('1234'), 'Caique', 2);

insert into tbl_categoria (nome) values
('Cadeiras'),
('Armários'),
('Mesas');

insert into tbl_movel (categoriaId, usuarioId, descricao, imagem, nome, valorMes, disponivel) values
(1, 4, 'Cadeira plástica azul', 'cadeiraazul.png', 'Cadeira Azul', 14.00, 1),
(1, 4, 'Cadeira plástica verde', 'cadeiraverde.png', 'Cadeira Verde', 10.00, 1),
(2, 4, 'Armário rústico de madeira', 'armario.png', 'Armário Rústico', 30.00, 1),
(3, 4, 'Mesa metálica', 'mesa.png', 'Mesa Metálica', 25.00, 1);

insert into tbl_aluguel (movelId, usuarioId, dataFim, valorFrete) values
(1, 2, '2020-08-17', 14.00),
(2, 3, '2020-08-19', 16.00),
(3, 3, '2020-08-15', 10.00);

##### SELECTS

select * from tbl_movel;
select * from view_movel;
select * from tbl_aluguel;
select * from view_aluguel;