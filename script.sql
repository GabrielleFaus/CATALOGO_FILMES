create database filmedb;

use filmedb;
create table filme(
	id int primary key auto_increment,
    nome varchar(255),
    ano int,
    descricao text
    );
    