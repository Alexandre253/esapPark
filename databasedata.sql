CREATE DATABASE ESAP
USE ESAP
CREATE TABLE ESAP(
    placa varchar(10) primary key,
    nome varchar(32) primary key,
    horarioEntrada datetime null,
    horarioSaida datetime null
);
