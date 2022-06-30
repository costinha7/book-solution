
# relacionamentos

#relacao funcionario usuario do sistema

alter table funcionario add id_usuario_funcionario int not null;
alter table funcionario add foreign key(id_usuario_funcionario) references usuarios(id_usuario)
on delete cascade on update cascade;

#relacao contato funcionario

alter table contato_funcionario add nome_funcionario int not null;
alter table contato_funcionario add foreign key (nome_funcionario) references funcionario(id_funcionario)
on delete cascade on update cascade;

#relacao contato cliente

alter table contato_cliente add nome_cliente int not null;
alter table contato_cliente add foreign key (nome_cliente) references cliente(id_cliente)
on delete cascade on update cascade;

#relacao reserva cliente

alter table cliente add id_reserva_cliente int not null;
alter table cliente add foreign key(id_reserva_cliente) references reserva(id_reserva)
on delete cascade on update cascade;

#relacionamentos autor livro

alter table autor_livro add codigo_autor_livro int not null;
alter table autor_livro add foreign key(codigo_autor_livro) references autor(id_autor)
on delete cascade on update cascade;

alter table autor_livro add codigo_livro_autor int not null;
alter table autor_livro add foreign key(codigo_livro_autor) references livro(id_livro)
on delete cascade on update cascade;

#relacionamento genero livro

alter table genero_livro add codigo_genero_livro int not null;
alter table genero_livro add foreign key(codigo_genero_livro) references genero(id_genero)
on delete cascade on update cascade;

alter table genero_livro add codigo_livro_genero int not null;
alter table genero_livro add foreign key(codigo_livro_genero) references livro(id_livro)
on delete cascade on update cascade;

#relacionamento editora livro

alter table editora_livro add id_editora int not null;
alter table editora_livro add foreign key(id_editora) references editora(id_editora)
on delete cascade on update cascade;

alter table editora_livro add id_livro int not null;
alter table editora_livro add foreign key(id_livro) references livro(id_livro)
on delete cascade on update cascade;

#relacionamento lista

alter table lista add codigo_livro_lista int not null;
alter table lista add foreign key(codigo_livro_lista) references livro(id_livro)
on delete cascade on update cascade;

alter table lista add id_cliente_lista int not null;
alter table lista add foreign key(id_cliente_lista) references cliente(id_cliente)
on delete cascade on update cascade;