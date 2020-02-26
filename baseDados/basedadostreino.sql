CREATE TABLE `disciplinas` (
  `numIdentidade` int(11) NOT NULL COMMENT,
  `nomeDisciplina` varchar(70) NOT NULL COMMENT,
  `professor` varchar(70) NOT NULL COMMENT,
  `dataInicio` datetime DEFAULT NULL,
  `dataTermino` datetime NOT NULL,
  PRIMARY KEY (`numIdentidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `perguntas` (
  `identPergunta` int(11) NOT NULL,
  `perguntas` longtext NOT NULL,
  `respostaUm` mediumtext DEFAULT NULL,
  `respostaDois` mediumtext DEFAULT NULL,
  `respostaTres` mediumtext DEFAULT NULL,
  `respostaQuadro` mediumtext DEFAULT NULL,
  `respostaCinco` mediumtext DEFAULT NULL,
  `respostaCorreta` int(1) NOT NULL,
  `unidadeEstudo` int(1) NOT NULL,
  `disciplina` int(11) NOT NULL,
  PRIMARY KEY (`identPergunta`),
  KEY `disciplina` (`disciplina`),
  CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`disciplina`) REFERENCES `disciplinas` (`numIdentidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;