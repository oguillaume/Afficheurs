drop database if exists voyageurs;
create database voyageurs;
use voyageurs;
grant all on voyageurs to 'root'@'localhost' ;

create table acces(
id_acces integer not null primary key auto_increment,
identifiant varchar(30),
mot_de_passe varchar(50))engine=innodb;

create table zones(
id_zone integer not null primary key auto_increment,
libelle_zone varchar(30),
type_afficheur varchar(4))engine=innodb;

create table consignes(
id_cons integer not null primary key auto_increment,
libelle_cons text)engine=innodb;

create table securite(
id_secu integer not null primary key auto_increment,
libelle_secu text)engine=innodb;

create table dedicaces(
id_dedi integer not null primary key auto_increment,
heure_dedi varchar(20),
lieu varchar(50),
auteur varchar(30))engine=innodb;

create table spectacles(
id_spect integer not null primary key auto_increment,
libelle_spect varchar(30),
heure varchar(20))engine=innodb;