CREATE DATABASE IF NOT EXISTS pagina_web;
USE pagina_web;

CREATE TABLE tipo_publicacion (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
descripcion VARCHAR(200));

CREATE TABLE resultados (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(200) NOT NULL,
año_publicacion INT UNSIGNED NOT NULL,
id_tipo_publicacion INT, FOREIGN KEY (id_tipo_publicacion) REFERENCES tipo_publicacion(id),
revista VARCHAR(200) NOT NULL,
autores VARCHAR(2000) NOT NULL,
web VARCHAR(200) NOT NULL );

CREATE TABLE tipo_usuario (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
descripcion VARCHAR(200));

CREATE TABLE estado_usuario (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
descripcion VARCHAR(200));

CREATE TABLE grupos (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
logo_grupo VARCHAR(100) NOT NULL,
titulo VARCHAR(200) NOT NULL,
descripcion VARCHAR(2000),
web VARCHAR(200) NOT NULL );

CREATE TABLE proyecto (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
titulo_proyecto VARCHAR(100) NOT NULL,
logo_proyecto VARCHAR(100),
titulo VARCHAR(300),
numero_expediente VARCHAR(50),
fecha_inicio VARCHAR(20) ,
cif VARCHAR(20) ,
duracion VARCHAR(20) ,
resumen VARCHAR(2000) ,
logo_menu VARCHAR(100) );

CREATE TABLE equipo (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
apellidos VARCHAR(100) NOT NULL,
titulacion VARCHAR(100) NOT NULL,
web VARCHAR(100) NOT NULL,
id_tipo_usuario INT NOT NULL, FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id),
mail VARCHAR(50) NOT NULL,
contraseña VARCHAR(2000) NOT NULL,
id_estado_usuario INT NOT NULL, FOREIGN KEY (id_estado_usuario) REFERENCES estado_usuario(id),
intentos INT);

CREATE TABLE objetivos(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
descripcion VARCHAR(5000),
id_proyecto INT, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id), UNIQUE (id_proyecto) );

CREATE TABLE financiacion(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
descripcion VARCHAR(2000),
presupuesto_total VARCHAR(50) NOT NULL,
id_proyecto INT, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id), UNIQUE (id_proyecto) );


CREATE TABLE periodos(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
año INT UNSIGNED NOT NULL,
presupuesto VARCHAR(50) NOT NULL,
id_proyecto INT, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id));

CREATE TABLE logo (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100),
imagen VARCHAR(100) NOT NULL );

CREATE TABLE rel_resultados_proyecto (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_resultado INT NOT NULL, FOREIGN KEY (id_resultado) REFERENCES resultados(id), 
    id_proyecto INT NOT NULL, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id),
    UNIQUE (id_resultado, id_proyecto));
    
CREATE TABLE rel_equipo_proyecto (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_equipo INT NOT NULL, FOREIGN KEY (id_equipo) REFERENCES equipo(id), 
    id_proyecto INT NOT NULL, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id),
    UNIQUE (id_equipo, id_proyecto));
    
CREATE TABLE rel_ip_proyecto (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_ip INT NOT NULL, FOREIGN KEY (id_ip) REFERENCES equipo(id), 
    id_proyecto INT NOT NULL, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id),
    UNIQUE (id_ip, id_proyecto));


CREATE TABLE rel_grupos_proyecto(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_grupo INT NOT NULL, FOREIGN KEY (id_grupo) REFERENCES grupos(id), 
    id_proyecto INT NOT NULL, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id),
    UNIQUE (id_grupo, id_proyecto));

CREATE TABLE rel_logo_proyecto(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_proyecto INT NOT NULL, FOREIGN KEY (id_proyecto) REFERENCES proyecto(id), 
    id_logo INT NOT NULL, FOREIGN KEY (id_logo) REFERENCES logo (id),
    UNIQUE (id_proyecto, id_logo));
    
INSERT INTO tipo_usuario(nombre)
VALUE('Admin');
INSERT INTO tipo_usuario(nombre)
VALUE('Investigador principal');
INSERT INTO tipo_usuario(nombre)
VALUE('Investigador');

INSERT INTO estado_usuario(nombre)
VALUE('No activo');
INSERT INTO estado_usuario(nombre)
VALUE('Activo');

INSERT INTO tipo_publicacion(nombre)
VALUE('Artículo');

INSERT INTO tipo_publicacion(nombre)
VALUE('Letter');

INSERT INTO tipo_publicacion(nombre)
VALUE('Patente');

INSERT INTO tipo_publicacion(nombre)
VALUE('Congreso');










