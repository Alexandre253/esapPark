CREATE DATABASE ESAP
USE ESAP
CREATE TABLE ESAP(
    placa varchar(10) primary key,
    nome varchar(32) primary key,
    horarioEntrada datetime null,
    horarioSaida datetime null
);
insert into planilha("varData", "documento", "nome", "transportadora", "placa",
					"horarioChegada", "horarioEntrada", "horarioSaida", 
					 "cliente", "entregaColeta") 
					 values (current_timestamp,'123456','Michael de Santa','Philips Enterprise',
							 'EVK-2022',NULL, NULL, NULL, 'Gemla', 'Coleta'); 