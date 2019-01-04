create database MatiasGonzalez;
use MatiasGonzalez;
create table usuarios(
    id_usuarios int not null AUTO_INCREMENT,
    usuario varchar(30) not null,
    clave varchar(255) not null,
    nombre varchar(20) not null,
    apellido varchar(20) not null,
    direccion varchar(30) not null,
    telefono int not null,
    email varchar(30) not null,
    PRIMARY KEY (id_usuarios)
);
create TABLE productos(
    id_producto int not null AUTO_INCREMENT,
    nombre varchar(200) not null,
    precio DECIMAL(5,2) not null,
    foto varchar(60) not null,
    id_nombre varchar(50) not null,
    PRIMARY KEY (id_producto)
);
create table compra(
    id_ticket int not null AUTO_INCREMENT,
    id_usuarios int not null,
    total DECIMAL(7,2),
    listado_productos varchar(255),
    PRIMARY KEY (id_ticket),
    FOREIGN KEY (id_usuarios) REFERENCES usuarios (id_usuarios)
);
INSERT INTO productos values (NULL,"Celular Samsung S9",800,"samsungs9.png","SamS9");
INSERT INTO productos values (NULL,"Celular Motorola G6",500,"MotoG6.jpg","Motorola");
INSERT INTO productos values (NULL,"Celular Samsung Note3",600,"SamsungNote.jpeg","Samsung_note");
INSERT INTO productos values (NULL,"Celular LG Q7",299.99,"LG_Q7.jpg","Lg_Q7");
INSERT INTO productos values (NULL,"Celular Iphone7",249.99,"Iphone7.png","Iphone_7");
INSERT INTO productos values (NULL,"Celular Huawei P20",915,"Huawei_P20.jpg","Huawei_p20");
INSERT INTO productos values (NULL,"Celular LG V10",139.95,"LG_V10.jpg","LG_V10");
INSERT INTO productos values (NULL,"Celular Samsung Galaxy S7",199.99,"Samsung_Galaxy_S7.jpg","Galaxy7");
INSERT INTO productos values (NULL,"Tablet Admiral ONE BLACK",50,"Tablet_Admiral.jpg","Admiral");
INSERT INTO productos values (NULL,"Tablet Phillips 10",120,"Tablet_Phillips_10.jpg","phillips10");

INSERT INTO productos values (NULL,"Monitor BENQ 32 pulgadas",499.99,"BenQ32.jpg","Benq32");
INSERT INTO productos values (NULL,"Monitor Acer 19.5 pulgadas",59.99,"Monitor_Acer_195.jpg","Acer195");
INSERT INTO productos values (NULL,"Monitor Samsung 32 pulgadas",289.99,"Samsung_32.jpg","Samsung32");
INSERT INTO productos values (NULL,"Monitor Samsung 27 pulgadas",179.99,"Samsung_27.jpg","Samsung27");
INSERT INTO productos values (NULL,"Monitor LG 34 pulgadas",549.99,"lg_34.jpg","LG34");
INSERT INTO productos values (NULL,"Televisor Toshiba ",149.99,"toshiba.jpg","ToshibaTV");
INSERT INTO productos values (NULL,"Televisor LG 4K SMARTTV",599.00,"LG_4k.jpg","LG4K");
INSERT INTO productos values (NULL,"Televisor Phillips 55 pulgadas",499.99,"phillips_55.jpg","Phillips55");
INSERT INTO productos values (NULL,"Televisor LG 4K UltraHD ",1096.99,"lg_4k_hd.png","LG4KHD");
INSERT INTO productos values (NULL,"Televisor Phillips 4K",639.99,"phillips_4k.jpg","Phillips4K");

INSERT INTO productos values (NULL,"Gaming Teclado Corsair K55",49.99,"Corsair_k55.jpg","CorsairK55");
INSERT INTO productos values (NULL,"Gaming Teclado Razer Hunstman",199.99,"razer_huntsman.jpg","Razer_Huntsman");
INSERT INTO productos values (NULL,"Gaming Mouse Razer Diamond",300.00,"diamond.png","Razer_diamond");
INSERT INTO productos values (NULL,"Gaming Auricular Razer Kraken",59.99,"razer_kraken.jpg","Razer_kraken");
INSERT INTO productos values (NULL,"Gaming Notebook HP Elite",348.99,"hp_elite.jpg","HP_elite");
