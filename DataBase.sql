drop database if exists socialtruck;
create database socialtruck;

use socialtruck;

create table empresa(
	razon_social varchar(100) not null,
    nombre_comercial varchar(50) not null,
    rfc varchar(13) not null,
    dirección_fiscal varchar(100) not null,
    url_pagina_Web varchar(50) null,
    url_red_social varchar(50) null,
    dir_oficinas_principales varchar(100) null,
    especialización varchar(100) null,
    certificaciones varchar(100) null,
    primary key(razon_social)
);

INSERT INTO empresa(razon_social, nombre_comercial, rfc, dirección_fiscal, url_pagina_Web, url_red_social, dir_oficinas_principales, especialización, certificaciones) VALUES ('Bicis de Montaña SA DE CV','SOCIAL TRUCK','1234567891234','FASFADSFA','FADSFADF','https://social.msdn.microsoft.com/Forums/es-ES/25a15f64-dcf4-47bf-b864-758f51755c51/devolver-un-solo-registro-de-una-consulta?forum=sqlserveres','https://social.msdn.microsoft.com/Forums/es-ES/25a15f64-dcf4-47bf-b864-758f51755c51/devolver-un-solo-registro-de-una-consulta?forum=sqlserveres','ASDFA','FASFADF');

create table sede(
	id_sede int not null auto_increment,
    nombre varchar(50) not null,
    direccion varchar (100) not null,
    empresa_rs varchar(100) not null,
    primary key(id_sede),
    foreign key(empresa_rs) references empresa(razon_social) ON UPDATE CASCADE ON DELETE CASCADE
);
INSERT INTO sede(nombre, direccion, empresa_rs) VALUES ('La sede de Martin Carrera','Gustavo Amadero num.48 calle fresnos','Bicis de Montaña SA DE CV');

create table tipo_semirremolque(
	id_tipo int not null auto_increment,
    tipo varchar(50),
    primary key(id_tipo)
);
insert into tipo_semirremolque(tipo) value("Caja Seca");
insert into tipo_semirremolque(tipo) value("Full Caja Seca");
insert into tipo_semirremolque(tipo) value("Plataforma");
insert into tipo_semirremolque(tipo) value("Full Plataforma");
insert into tipo_semirremolque(tipo) value("Portacontenedor");
insert into tipo_semirremolque(tipo) value("Full Portacontenedor");
insert into tipo_semirremolque(tipo) value("Sencillo Encortinado");
insert into tipo_semirremolque(tipo) value("Full Encortinado");
insert into tipo_semirremolque(tipo) value("Frigorifico");
insert into tipo_semirremolque(tipo) value("Tauliner");
insert into tipo_semirremolque(tipo) value("Hazmat");
insert into tipo_semirremolque(tipo) value("Sobredimensionado");
insert into tipo_semirremolque(tipo) value("Furgon");
insert into tipo_semirremolque(tipo) value("Basculante");
insert into tipo_semirremolque(tipo) value("Cisterna");
insert into tipo_semirremolque(tipo) value("Full Cisterna");
insert into tipo_semirremolque(tipo) value("Dolly");
insert into tipo_semirremolque(tipo) value("Porta Troncos");
insert into tipo_semirremolque(tipo) value("Porta Coches");
insert into tipo_semirremolque(tipo) value("Porta Camiones");
insert into tipo_semirremolque(tipo) value("Ganadero");
insert into tipo_semirremolque(tipo) value("Tolva");
insert into tipo_semirremolque(tipo) value("Jaula Granelera");
insert into tipo_semirremolque(tipo) value("Refresquera");
insert into tipo_semirremolque(tipo) value("Otro");

create table estatus_c_s (
	id_estatus int not null auto_increment,
    estatus varchar(20),
    primary key(id_estatus)
);
insert into estatus_c_s(estatus) value("En Sede");
insert into estatus_c_s(estatus) value("En viaje");
insert into estatus_c_s(estatus) value("En taller");
insert into estatus_c_s(estatus) value("Fuera de servicio");

create table semirremolque(
	no_serie int not null,
    capacidad int null,
    dimensiones varchar(12) null,
    extras varchar(50) null,
    sede_id int not null,
    tipo_id int not null,
    estatus_id int not null,
    primary key(no_serie),
    foreign key(sede_id) references sede(id_sede) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(tipo_id) references tipo_semirremolque(id_tipo) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(estatus_id) references estatus_c_s(id_estatus) ON UPDATE CASCADE ON DELETE CASCADE
);
insert into semirremolque(no_serie, capacidad, dimensiones, extras, sede_id, tipo_id, estatus_id) value("123456", "5", "8x1.9x1.9", "pura carga", "1", "3", "2");

create table marca(
	id_marca int not null auto_increment,
    marca varchar(25),
    primary key(id_marca)
);
insert into marca(marca) value ("Freightliner");
insert into marca(marca) value ("Kenworth");
insert into marca(marca) value ("International");
insert into marca(marca) value ("Isuzu");
insert into marca(marca) value ("Mercedes-Benz Trucks");
insert into marca(marca) value ("VolksWagen Camiones");
insert into marca(marca) value ("Scania");
insert into marca(marca) value ("Volvo Trucks");
insert into marca(marca) value ("Man Trucks");
insert into marca(marca) value ("Dina");
insert into marca(marca) value ("Mack Trucks");
insert into marca(marca) value ("Western Star");
insert into marca(marca) value ("Otro");

create table motor(
	id_motor int not null auto_increment,
    motor varchar(25),
    primary key(id_motor)
);

insert into motor(motor) value("Caterpillar");
insert into motor(motor) value("Cummins");
insert into motor(motor) value("International Maxforce");
insert into motor(motor) value("Paccar");
insert into motor(motor) value("Detroit Diesel Allison");
insert into motor(motor) value("Mercedes Benz");
insert into motor(motor) value("Volvo");
insert into motor(motor) value("Scania");
insert into motor(motor) value("Dina");
insert into motor(motor) value("Perkins");
insert into motor(motor) value("Ford");
insert into motor(motor) value("Otro");

create table tipo_camion(
	id_tipo int not null auto_increment,
    tipo varchar(20),
    primary key(id_tipo)
);

insert into tipo_camion(tipo) value("Tractocamion");
insert into tipo_camion(tipo) value("Torton");
insert into tipo_camion(tipo) value("Rabon");
insert into tipo_camion(tipo) value("Otro");

create table camion (
	placa varchar(6),
    modelo varchar(25),
    transmision int(1),
    extras varchar(50),
    motor_id int not null,
    marca_id int not null,
    tipo_id int not null,
    estatus_id int not null,
    sede_id int not null,
    primary key(placa),
    foreign key(motor_id) references motor(id_motor) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(marca_id) references marca(id_marca) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(tipo_id) references tipo_camion(id_tipo) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(estatus_id) references estatus_c_s(id_estatus) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(sede_id) references sede(id_sede) ON UPDATE CASCADE ON DELETE CASCADE
);
insert into camion(placa, modelo, transmision, extras, motor_id, marca_id, tipo_id, estatus_id, sede_id) value("Supercoche", "2005", "1", "joya", "6", "6", "2", "3", "1");


create table rol(
	id_rol int not null auto_increment,
    rol varchar(25),
    primary key(id_rol)
);
insert into rol(rol) value ("Representante Transporte");
insert into rol(rol) value ("Representante Cliente");
insert into rol(rol) value("Transportista");
insert into rol(rol) value("Administrador");

create table estatus_u(
	id_estatus int not null auto_increment,
    estatus varchar(30),
    primary key(id_estatus)
);

insert into estatus_u(estatus) value("Validado");
insert into estatus_u(estatus) value("No validado");
insert into estatus_u(estatus) value("Disponible en sede");
insert into estatus_u(estatus) value("Disponible fuera de sede");
insert into estatus_u(estatus) value("En viaje");
insert into estatus_u(estatus) value("No disponible");

create table usuario(
	id_usuario varchar(13) not null,
    nombre varchar(50) not null,
    primer_apellido varchar(50) not null,
    segundo_apellido varchar(50) null,
    correo varchar(40) not null UNIQUE,
    contra varchar(255) not null,
    telefono varchar(10) not null,
    especializacion varchar(50) null,
    years_exp int null,
    ubicacion varchar(100) null,
    rol_id int not null,
    estatus_id int not null,
    empresa_razon varchar(100) null,
    sede_id int null,
    primary key(id_usuario),
    foreign key(rol_id) references rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(estatus_id) references estatus_u(id_estatus) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(empresa_razon) references empresa(razon_social) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(sede_id) references sede(id_sede) ON UPDATE CASCADE ON DELETE CASCADE
);
insert into usuario(id_usuario, nombre, primer_apellido, segundo_apellido, correo, contra, telefono, especializacion, years_exp, ubicacion, rol_id, estatus_id, empresa_razon, sede_id) 
value("1","jordan","Sanchez","Ramirez","correodejordan@gmail.com","contraseña","5523412","empresarioenquiebra","5","Posen su casa","2","1",'Bicis de Montaña SA DE CV',"1");

insert into usuario(id_usuario, nombre, primer_apellido, segundo_apellido, correo, contra, telefono, especializacion, years_exp, ubicacion, rol_id, estatus_id, empresa_razon, sede_id) 
value("2","Maik","Sanchez","Ramirez","correodemaik@gmail.com","contraseña","5523412","empresarioenquiebra","5","Posen su casa","3","1",'Bicis de Montaña SA DE CV',"1");

insert into usuario(id_usuario, nombre, primer_apellido, segundo_apellido, correo, contra, telefono, especializacion, years_exp, ubicacion, rol_id, estatus_id, empresa_razon, sede_id) 
value("3","Emilio","Guzman","Gutierrez","correodeemilio@gmail.com","contrasena","5523412","empresariocontratador","5","Posen mi casa","3","1",'Bicis de Montaña SA DE CV',"1");

insert into usuario(id_usuario, nombre, primer_apellido, segundo_apellido, correo, contra, telefono, especializacion, years_exp, ubicacion, rol_id, estatus_id, empresa_razon, sede_id) 
value("4","Emilio","Guzman","Gutierrez","correodeemiliotransportista@gmail.com","contrasena","5523412","empresariocontratador","5","Posen mi casa","1","1",'Bicis de Montaña SA DE CV',"1");


create table estatus_v(
	id_estatus int not null auto_increment,
    estatus varchar(30),
    primary key(id_estatus)
);

insert into estatus_v(estatus) value("No asignado");
insert into estatus_v(estatus) value("Comenzado");
insert into estatus_v(estatus) value("Finalizado");
insert into estatus_v(estatus) value("Pagado");

create table viaje(
	id_viaje int not null auto_increment,
    lugar_recogida varchar(50) not null,
    lugar_destino varchar(50) not null,
    descripción varchar(200) not null,
    precio float(6,2) null,
    url_cp_traslado varchar(30) null,
    url_cp_ingreso varchar(30) null,
    fecha_inicio TIME null,
    hora_inicio TIME null,
    fecha_fin TIME null,
    hora_fin TIME null,
    calificacion int null,
    estatus_id int null,
    camion_placa varchar(6) null,
    semi_no_ide int null,
    transportista_id varchar(13) null,
    representante_trans_id varchar(13) null,
    representante_cliente varchar(13) null,
    primary key(id_viaje),
    foreign key(estatus_id) references estatus_v(id_estatus) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(camion_placa) references camion(placa) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(semi_no_ide) references semirremolque(no_serie) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(transportista_id) references usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(representante_trans_id) references usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(representante_cliente) references usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE
);

insert into viaje(lugar_recogida, lugar_destino, descripción, precio, url_cp_traslado, url_cp_ingreso, fecha_inicio,hora_inicio, fecha_fin,hora_fin, calificacion, estatus_id, camion_placa, semi_no_ide, transportista_id, representante_trans_id, representante_cliente) 
value("Pos en mi casa","en mi almacen","calle muy bonita","15000","linkdelmapadetraslado","linkdelmapadeingreso", null, "17:30", null, "19:20","","1","Supercoche","123456",'3',"4","1");

create table sala(
	id_sala int not null auto_increment,
    fecha date,
    primary key(id_sala)
);
insert into sala(fecha) value ("2023-06-07");

create table sala_usuario(
	id_sala_usuario int not null auto_increment,
    id_sala int not null,
    id_usuario varchar(13) not null,
    primary key(id_sala_usuario),
    foreign key(id_sala) references sala(id_sala) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(id_usuario) references usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE
);
insert into sala_usuario(id_sala, id_usuario) value ("1","1");
insert into sala_usuario(id_sala, id_usuario) value ("1","2");

create table mensaje(
	id_mensaje int not null auto_increment,
    mensaje text,
    fecha date,
    id_sala int not null,
    id_usuario varchar(13) not null,
    primary key(id_mensaje),
    foreign key(id_sala)references sala(id_sala) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(id_usuario) references usuario(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE
);
insert into mensaje(mensaje, fecha, id_sala, id_usuario) value ("xd","2023-06-07","1","1");
insert into mensaje(mensaje, fecha, id_sala, id_usuario) value ("XD x2","2023-06-07","1","2");

create table postulacion(
	viaje_id int not null,
    empresa_razon varchar(100),
    postulacion varchar(200),
    primary key(viaje_id),
    foreign key(viaje_id) references viaje(id_viaje) ON UPDATE CASCADE ON DELETE CASCADE,
    foreign key(empresa_razon) references empresa(razon_social) ON UPDATE CASCADE ON DELETE CASCADE
);

insert into postulacion(viaje_id, empresa_razon, postulacion) value ("1", "Bicis de Montaña SA DE CV","creo que es un archivo de la postulacion");

