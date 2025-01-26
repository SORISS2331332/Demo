
DROP DATABASE IF EXISTS FinalProjetDB;
CREATE DATABASE FinalProjetDB;
USE FinalProjetDB;

CREATE TABLE Utilisateurs 
(
    idUtilisateur           SMALLINT         NOT NULL       PRIMARY KEY     AUTO_INCREMENT,
    nom                VARCHAR(50)      NOT NULL       ,
    prenom                VARCHAR(50)      NOT NULL       ,
    email                VARCHAR(50)      NOT NULL       UNIQUE,
    adresse                VARCHAR(50)      NOT NULL       ,
    motDePasse              VARCHAR(255)     NOT NULL,
    role                   VARCHAR(50)      DEFAULT "Utilisateur"
);



CREATE TABLE Temperatures
(
    id              INT              NOT NULL         PRIMARY KEY  AUTO_INCREMENT,
    ville           VARCHAR(50)     NOT NULL,                
    temperature     DECIMAL         NOT NULL,
    date            DATETIME        NOT NULL    
);


INSERT INTO Temperatures (ville, temperature) VALUES 
('Paris', 15.5),
('Lyon', 12.3),
('Marseille', 18.2),
('Toulouse', 16.0),
('Nice', 20.0),
('Nantes', 14.5),
('Strasbourg', 11.1),
('Bordeaux', 17.3),
('Montpellier', 19.5),
('Lille', 10.0);


