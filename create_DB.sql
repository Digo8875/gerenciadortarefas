/* APAGAR TABELAS PARA REIMPORTAÇÕES DO BANCO */
DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Status;
DROP TABLE IF EXISTS Tarefa;
################################################

/* CRIAÇÃO DE TABELAS */
CREATE TABLE Usuario(
	Id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL
);
CREATE TABLE Tarefa(
	Id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Assunto VARCHAR(50) NOT NULL,
	Descricao VARCHAR(200) NOT NULL,
	Data_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
	Solicitante_id INT NOT NULL,
	Solicitado_id INT NOT NULL,
	Status_id INT NOT NULL
);
CREATE TABLE Status(
	Id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	Nome VARCHAR(100) NOT NULL
);

################################################

/* POPULAR O DB */
INSERT INTO Usuario(Nome) VALUES("Pedro");
INSERT INTO Usuario(Nome) VALUES("Carlos");
INSERT INTO Usuario(Nome) VALUES("Ana");
INSERT INTO Usuario(Nome) VALUES("Maria");
INSERT INTO Usuario(Nome) VALUES("Lucas");
INSERT INTO Usuario(Nome) VALUES("Wanda");
INSERT INTO Usuario(Nome) VALUES("Gustavo");
INSERT INTO Usuario(Nome) VALUES("Mauro");

INSERT INTO Status(Nome) VALUES("Nova");
INSERT INTO Status(Nome) VALUES("Em progresso");
INSERT INTO Status(Nome) VALUES("Paralisada");
INSERT INTO Status(Nome) VALUES("Cancelada");
INSERT INTO Status(Nome) VALUES("Pronta");
INSERT INTO Status(Nome) VALUES("Em testes");
INSERT INTO Status(Nome) VALUES("Concluida");

################################################