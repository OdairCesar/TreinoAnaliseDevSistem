CREATE DATABASE `dados_sistema_perguntas`
DEFAULT CHARACTER SET utf8 
DEFAULT COLLATE utf8_general_ci;
USE `dados_sistema_perguntas`;

CREATE TABLE `disciplinas` (
    `idDisciplina` int NOT NULL AUTO_INCREMENT,
    `nomeDisciplina` varchar(30) NOT NULL,
    `professor` varchar(100),
    `dataInicio` datetime,
    `dataTermino` datetime NOT NULL,
    PRIMARY KEY(`idDisciplina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `perguntas` (
    `idPergunta` int NOT NULL AUTO_INCREMENT,
    `uniEstudo` Enum('1','2','3','4'), 
    `fonte` Enum('av','aap','adg','livro'),
    `perguntas` text NOT NULL,
    `respostaA` MediumText NOT NULL,
    `respostaB` MediumText NOT NULL,
    `respostaC` MediumText NOT NULL,
    `respostaD` MediumText NOT NULL,
    `respostaE` MediumText NOT NULL,
    `respostaCorreta` Enum('A','B','C','D','E') NOT NULL,
    `idDisciplina` int NOT NULL,
    PRIMARY KEY(`idPergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `alunos`(
    `idAluno` int NOT NULL AUTO_INCREMENT,
    `nomeAluno` varchar(100),
    `contAcertadas` int(3),
    `contErradas` int(3),
    PRIMARY KEY(`idAluno`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;