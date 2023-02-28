CREATE DATABASE `postosaudeDB` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE postosaudeDB;

-- postosaudeDB.pacientes definition

CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(255) NOT NULL,
  `nomeMae` varchar(255) NOT NULL,
  `dataNascimento` date NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `codigo_sus` varchar(255) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `nivel_acesso` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idPaciente`),
  UNIQUE KEY `pacientes_UN` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- postosaudeDB.medicos definition

CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(255) NOT NULL,
  `dataNascimento` date NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `crm` varchar(255) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMedico`),
  UNIQUE KEY `medicos_UN` (`crm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- postosaudeDB.medicamentos definition

CREATE TABLE `medicamentos` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `fabricante` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `composicao` varchar(255) NOT NULL,
  `indicacao` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `unidade` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- postosaudeDB.atendimentos definition

CREATE TABLE `atendimentos` (
  `idAtendimento` int(11) NOT NULL AUTO_INCREMENT,
  `nomePaciente` varchar(255) DEFAULT NULL,
  `data_atend` date NOT NULL,
  `hora_atend` time NOT NULL,
  `motivo` text,
  `medico_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAtendimento`),
  KEY `atendimentos_FK` (`medico_id`),
  KEY `atendimentos_FK_1` (`paciente_id`),
  CONSTRAINT `atendimentos_FK` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`idMedico`),
  CONSTRAINT `atendimentos_FK_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`idPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;