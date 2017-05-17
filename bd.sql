CREATE DATABASE banco;
USE banco;
CREATE TABLE cliente(ncliente INT NOT NULL PRIMARY KEY, apaterno VARCHAR(30), amaterno VARCHAR(30), nombre VARCHAR(30), fnacimiento DATE, sexo VARCHAR(1), email VARCHAR(50), pass BLOB, estado INT);

CREATE TABLE cuenta(ncliente INT, saldo FLOAT(10,2), pendiente FLOAT(10,2), FOREING KEY(ncliente) REFERENCES cliente(ncliente) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE admin(usuario INT NOT NULL PRIMARY KEY, nombre VARCHAR(80), email VARCHAR(50), pass BLOB, estado INT);

