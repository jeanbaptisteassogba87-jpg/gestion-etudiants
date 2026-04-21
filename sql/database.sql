CREATE DATABASE gestion_etudiants;
USE gestion_etudiants;


CREATE TABLE IF NOT EXISTS filieres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    filiere_id INT,
    FOREIGN KEY (filiere_id) REFERENCES filieres(id) ON DELETE SET NULL
);

INSERT INTO filieres (nom) VALUES 
('Informatique de Gestion'),
('Génie Logiciel'),
('Réseaux et Télécommunications'),
('Sécurité Informatique');
