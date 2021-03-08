CREATE DATABASE bdsurprise;
USE bdsurprise;

CREATE TABLE usuario(
	id_usuario int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(40) NOT NULL,
    apellido varchar(40) NOT NULL,
    correo varchar(50) NOT NULL UNIQUE,
    telefono varchar(11) NOT NULL,
    contrasena TEXT NOT NULL,
    estado VARCHAR(10),
    organizacion VARCHAR(15),
    fecha_edicion TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion DATETIME,
    llave TEXT,
    iv_token TEXT,
    token TEXT
);

CREATE TABLE panel(
    id_panel int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(40),
    ubicacion text NOT NULL,
    tipo varchar(20),
    descripcion text,
    stock_videos int NOT NULL,
    fecha_edicion TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion DATETIME
);

CREATE TABLE video(
    id_video INT AUTO_INCREMENT PRIMARY KEY,
    ubicacion VARCHAR(60) NOT NULL,
    fecha DATE NOT NULL,
    mensaje TEXT,
    nro_video INT,
    estado VARCHAR(10) DEFAULT "activo",
    publicacion VARCHAR(15) DEFAULT "en espera",
    id_usuario int NOT NULL,
    id_panel int NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_panel) REFERENCES panel(id_panel)
    ON DELETE RESTRICT ON UPDATE CASCADE,
    fecha_edicion TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion DATETIME
);

CREATE TABLE invitacion(
    id_invitacion INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    apellido varchar(40) NOT NULL,
    telefono varchar(11) NOT NULL,
    mensaje TEXT NOT NULL,
    url TEXT NOT NULL,
    id_usuario int NOT NULL,
    id_video int NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_video) REFERENCES video(id_video)
    ON DELETE CASCADE ON UPDATE CASCADE,
    fecha_edicion TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion DATETIME
);
CREATE TABLE transaccion{

};
CREATE TABLE producto(){
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio FLOAT NOT NULL,
};







INSERT INTO panel(nombre,ubicacion,tipo,descripcion,fecha_creacion)
VALUES
('Panel Parque Eterno','Av.Chan Chan (Altura Camposanto Parque Eterno) - HUANCHACO','Pórtico','1024px X 384px',now()),
('Panel La Esperanza','Av.José G. Condorcanqui Cdra 10 - LA ESPERANZA','Pórtico','1024px X 384px',now()),
('Panel La Esperanza','Av.José G. Condorcanqui Cdra 12 - LA ESPERANZA','Pórtico','1024px X 384px',now()),
('Panel Mall Aventura','Av.América oeste Cuadra 7 - MALL AVENTURA','Pórtico','1024px X 384px',now()),
('Panel Av. Fátima','Av.Larco con A.Fátima - VICTOR LARCO','Paradero','540px de ancho x 1080px de alto',now()),
('Panel El Golf','Prol.Vallejo con Av.El golf - VICTOR LARCO','Paradero','540px de ancho x 1080px de alto',now()),
('Panel Real Plaza','Prol.Cesar Vallejo cuadra 13 - REAL PLAZA','Pórtico','1024px X 384px',now()),
('Panel El Porvenir','Av.Pumacahua Cdra 13 - EL PORVENIR','Pórtico','1024px X 384px',now());



CREATE TABLE usermc(
	id_usuario int AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(40),
    nombre varchar(40) NOT NULL,
    apellido varchar(40) NOT NULL,
    contrasena TEXT NOT NULL,
    rol VARCHAR(20),
    fecha_edicion TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
    ON UPDATE CURRENT_TIMESTAMP,
    fecha_creacion DATETIME
);
CREATE TABLE modificacion(
    id_modificacion INT PRIMARY KEY AUTO_INCREMENT,
    fecha_creacion DATE NOT NULL,
    id_usuario INT,
    FOREIGN KEY (usuario) REFERENCES usuariomc (id_usuario)
    ON DELETE NO ACTION ON UPDATE NO ACTION
);