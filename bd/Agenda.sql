drop schema if exists Agenda;
create database if not exists Agenda;
use Agenda;

CREATE TABLE Usuario(
    login VARCHAR(12) NOT NULL,
    nome VARCHAR(45) NOT NULL,
    tel VARCHAR(16) NOT NULL,
    senha VARCHAR(6) NOT NULL,
    email VARCHAR(45) NOT NULL,
    data_registro DATETIME,
    PRIMARY KEY(login))
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

create table Contatos(
	id_contato INT AUTO_INCREMENT,
    nome VARCHAR(45) NOT NULL,
    tel VARCHAR(16) NOT NULL,
    email VARCHAR(45) NOT NULL,
    login VARCHAR(12) ,
    CONSTRAINT FOREIGN KEY(login) REFERENCES Usuario(login),
    PRIMARY KEY(id_contato))
	ENGINE = InnoDB
    DEFAULT CHARSET = utf8;
    
CREATE TABLE Agenda(
	id_agenda INT AUTO_INCREMENT,
    id_contato INT NOT NULL,
    dataAgenda VARCHAR(45) NOT NULL,
    hora VARCHAR(5) NOT NULL,
    assunto VARCHAR(45) NOT NULL,
    CONSTRAINT FOREIGN KEY(id_contato) REFERENCES Contatos(id_contato),
    PRIMARY KEY(id_agenda))
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

INSERT INTO Usuario(login,senha,email,data_registro,nome,tel) VALUES('CHANGER','admin','admin',curdate(),'admin','admin');


    