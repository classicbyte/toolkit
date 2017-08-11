CREATE DATABASE toolkitrneuronal;
USE toolkitrneuronal;

CREATE TABLE user(
	cod_user INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	categ_us VARCHAR(15) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(400) NOT NULL,
	fecha VARCHAR(50) NOT NULL,
	PRIMARY KEY(cod_user)
)charset=latin1;

CREATE TABLE file_up(
	cod_fileup INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(50) NOT NULL,
	categ_fileup VARCHAR(30) NOT  NULL,
	size VARCHAR(10) NOT NULL,
	extending VARCHAR(10) NOT NULL,
	servidor VARCHAR(30) NOT NULL,
	url VARCHAR(100) NOT NULL,
	descripcion VARCHAR(200) NOT NULL,
	fecha VARCHAR(50) NOT NULL,
	cod_user VARCHAR(50) NOT NULL,
	PRIMARY KEY(cod_fileup)
)charset=latin1;


INSERT INTO user(name, categ_us, email, password,fecha) VALUES
("tester","Admin","kitherramientas_cb01@hotmail.com",md5("1"),"13-04-2017"),
("Charly","Admin","carlos@toolkit.com",md5("2"),"13-04-2017");

INSERT INTO file_up(name, categ_fileup, size, extending, servidor, url, descripcion, fecha,cod_user) VALUES
("Driver Cheker","Driver","5.5 MB","exe","MEGA","https://mega.nz/#!GRABST7B!QHnlATVYYaVmEBULLBXsqGunVDTRtj96gO_6sloilQ8","Buscador e instalador de driver online. serial : CI425-086V6-CCNWP-OFNWC","ALGUN DIA EN ALGUN LUGAR","1"),
("Wifislax","Sistema Operativo","250 MB","torrent","Turbobit","https://mega.nz/#!GRABST7B!QHnlATVYYaVmEBULLBXsqGunVDTRtj96gO_6sloilQ8","bla bla bla bla","HOY","2"),
("Kali Linux","Utilidades","2654 MB","torrent","Tur","https://mega.nz/#!GRABST7B!QHnlATVYYaVmEBULLBXsqGunVDTRtj96gO_6sloilQ8","bla bla bla bla","HOY","2"),
("Algo","Sistema Operativo","456 MB","torrent","bit","https://mega.nz/#!GRABST7B!QHnlATVYYaVmEBULLBXsqGunVDTRtj96gO_6sloilQ8","bla bla bla bla","HOY","2"),
("Wea","Libro","255 KB","torrent","MEGA","https://mega.nz/#!KEhDiKxC!DutYW4ntN5rjSY4OWK3xhfzZ6IYx7kRERbPC66_HwKQ","Auto instalador de drivers Offline.","ALGUN DIA EN ALGUN LUGAR","1");
