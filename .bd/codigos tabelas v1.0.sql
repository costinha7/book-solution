create database athena 
default character set utf8mb4 
default collate utf8mb4_unicode_ci;

use athena;

create table biblioteca(
nome_biblioteca varchar(50) not null,
telefone char(14) not null,
email varchar(30) not null
);


create table funcionario(
id_funcionario int not null primary key auto_increment,
nome_completo_funcionario varchar(50) not null,
cpf_funcionario char(11) not null, 
sexo enum ('m', 'f') not null,
cargo varchar(30),
data_admissao date not null
);



create table contato_funcionario(
id_contato_funcionario int not null primary key auto_increment,
telefone char(12),
celular char(14) not null,
email varchar(50) not null
);


create table contato_cliente(
id_contato_cliente int not null primary key auto_increment,
telefone char(12),
celular char(14) not null,
email varchar(50) not null
); 



create table cliente( 
id_cliente int not null primary key auto_increment,
sexo enum ('m', 'f') not null,
nome_completo_cliente varchar(50) not null,
cpf_cliente char(11) not null,
data_cadastro date not null
);



create table usuarios(
id_usuario int not null primary key auto_increment,
usuario varchar (220),
email_usuario varchar(30) not null,
senha_usuario char(10) not null, 
situacao_usuario enum('b','d') not null
);



create table livro(
id_livro int not null primary key auto_increment,
codigo char (4) unique,
titulo varchar(50) not null,  
data_publicacao date not null,
idioma varchar(30) not null,
volume int, 
edicao int,
data_registro date not null,
paginas int, 
descricao text,
status enum('d','i') not null
);



create table autor(
id_autor int not null primary key auto_increment, 
nome_autor varchar(50) not null,
nacionalidade varchar(40)
);



create table autor_livro(
autor_livro_id int not null primary key auto_increment
);



create table editora(
id_editora int not null primary key auto_increment,
nome_editora varchar(30) not null
);



create table editora_livro( 
editora_id_livro int not null primary key auto_increment
);



create table genero( 
id_genero int not null primary key auto_increment, 
tipo_genero varchar(30) not null  
);



create table genero_livro( 
genero_id_livro int not null primary key auto_increment
);



create table reserva(
id_reserva int not null primary key auto_increment,
data_reserva date not null,
prazo_reserva date not null  
);



create table reserva_livro( 
livro_id_reserva int not null primary key auto_increment
);




create table lista( 
id_lista int not null primary key auto_increment
);

