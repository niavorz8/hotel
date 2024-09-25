CREATE DATABASE niavo_hotel;

USE niavo_hotel;

CREATE TABLE users (
    id INT PRIMARY KEY auto_increment,
    username VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(50)
);

CREATE TABLE genre (
    id INT PRIMARY KEY auto_increment,
    libelle VARCHAR(30)
);

INSERT INTO genre(libelle)
    VALUES
        ('Homme'),
        ('Femme');

CREATE TABLE pays (
    id INT PRIMARY KEY auto_increment,
    libelle VARCHAR(30)
);

INSERT INTO pays(libelle)
    VALUES
        ('Madagascar'),
        ('Japon'),
        ('Allemand'),
        ('Angleterre'),
        ('France');

CREATE TABLE typechambre (
    id INT PRIMARY KEY auto_increment,
    libelle VARCHAR(30)
);

INSERT INTO typechambre(libelle)
    VALUES
        ('Simple'),
        ('Double'),
        ('Suite');

CREATE TABLE chambre (
    id INT PRIMARY KEY auto_increment,
    numero VARCHAR(10) UNIQUE,
    type INT REFERENCES typechambre(id),
    nbrlit INT,
    prix DOUBLE
);

INSERT INTO chambre(numero, type, nbrlit, prix)
    VALUES
        ('001', 1, 1, 50000),
        ('005', 2, 2, 70000),
        ('007', 3, 2, 100000);

CREATE OR REPLACE VIEW v_chambre AS
SELECT ch.*, typ.libelle as typechambrelibelle 
FROM chambre ch
JOIN typechambre typ ON ch.type = typ.id;

CREATE TABLE client (
    id INT PRIMARY KEY auto_increment,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    sexe INT REFERENCES genre(id),
    telephone VARCHAR(20),
    pays INT REFERENCES pays(id),
    carte VARCHAR(40),
    dateentre DATE,
    datesortie DATE,
    chambre INT REFERENCES chambre(id)
);

CREATE OR REPLACE VIEW v_client AS
SELECT cli.*, sx.libelle as libellesexe, pays.libelle as libellepays, ch.numero as numerochambre, ch.prix 
FROM client cli
JOIN genre sx ON cli.sexe = sx.id
JOIN pays ON cli.pays = pays.id
JOIN chambre ch ON cli.chambre = ch.id;

CREATE TABLE caisse (
    id INT PRIMARY KEY auto_increment,
    client INT REFERENCES client(id),
    datepayement DATE,
    montant DOUBLE
);

CREATE OR REPLACE VIEW v_client_non_paye AS
SELECT cli.*, sx.libelle as libellesexe, pays.libelle as libellepays, ch.numero as numerochambre, ch.prix 
FROM client cli
JOIN genre sx ON cli.sexe = sx.id
JOIN pays ON cli.pays = pays.id
JOIN chambre ch ON cli.chambre = ch.id
WHERE cli.id NOT IN (SELECT client FROM caisse);

CREATE OR REPLACE VIEW v_client_paye AS
SELECT cli.*, sx.libelle as libellesexe, pays.libelle as libellepays, ch.numero as numerochambre, ch.prix 
FROM client cli
JOIN genre sx ON cli.sexe = sx.id
JOIN pays ON cli.pays = pays.id
JOIN chambre ch ON cli.chambre = ch.id
WHERE cli.id IN (SELECT client FROM caisse);

CREATE TABLE poste (
    id INT PRIMARY KEY auto_increment,
    libelle VARCHAR(50)
);

INSERT INTO poste(libelle)
    VALUES
        ('Caissiere'),
        ('Femme de menage'),
        ('RH'),
        ('Manager'),
        ('Developpeur'),
        ('Designer'),
        ('Marketing');

CREATE TABLE civilite (
    id INT PRIMARY KEY auto_increment,
    libelle VARCHAR(50)  
);

INSERT INTO civilite(libelle)
    VALUES
        ('Celibataire'),
        ('Marié'),
        ('Divorcé');

CREATE TABLE travailleur (
    id INT PRIMARY KEY auto_increment,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    sexe INT REFERENCES genre(id),
    telephone VARCHAR(20),
    civilite INT REFERENCES pays(civilite),
    datenaissance DATE,
    poste INT REFERENCES poste(id),
    adresse VARCHAR(50),
    carte VARCHAR(40),
    salaire DOUBLE
);