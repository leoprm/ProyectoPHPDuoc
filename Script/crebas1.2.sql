/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16-06-2015 13:16:53                          */
/*==============================================================*/

/*==============================================================*/
/* Base de datos: `miraentuinterior`                            */
/*==============================================================*/


CREATE DATABASE IF NOT EXISTS `miraentuinterior` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `miraentuinterior`;


drop table if exists PRODUCTO;

drop table if exists CATEGORIA;

drop table if exists COLOR;

drop table if exists CONTACTO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: CATEGORIA                                             */
/*==============================================================*/
create table CATEGORIA
(
   IDCATEGORI           bigint unsigned not null auto_increment,
   NOMCATEGOR           varchar(50) not null,
   DESCRIPCATEGO        varchar(100) not null,
   IMAGENCAT            varchar(30) not null,
   primary key (IDCATEGORI)
);

/*==============================================================*/
/* Table: COLOR                                                 */
/*==============================================================*/
create table COLOR
(
   IDCOLOR              bigint unsigned not null auto_increment,
   IDPRODUCTO           bigint unsigned not null,
   NOMBRECOLOR          varchar(50) not null,
   COD_HEX              varchar(20) not null,
   primary key (IDCOLOR)
);

/*==============================================================*/
/* Table: CONTACTO                                              */
/*==============================================================*/
create table CONTACTO
(
   IDCONTACTO           bigint unsigned not null auto_increment,
   NOMBRECONTACTO       varchar(50) not null,
   EMAILCONTAC          varchar(60) not null,
   MENSAJE              varchar(200) not null,
   ASUNTO               varchar(100) not null,
   FECHAENVIO           datetime not null,
   primary key (IDCONTACTO)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   CODPROD              bigint unsigned not null auto_increment,
   IDCATEGORI           bigint unsigned not null,
   IDUSUARIO            bigint unsigned not null,
   NOMBREPROD           varchar(50) not null,
   DESCRIPPROD          varchar(150) not null,
   PRECIO               numeric(6,0) not null,
   DIMANCHO             float(5) not null,
   DIMALTO              float(5) not null,
   COLOR                varchar(20) not null,
   IMAGENPROD           varchar(30) not null,
   CANTIDAD             numeric(10,0) not null,
   primary key (CODPROD)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   IDUSUARIO            bigint unsigned not null auto_increment,
   EMAILUSER            varchar(150) not null,
   USERNAME             varchar(25) not null,
   PASSWORD             varchar(50) not null,
   NOMBREUSER           varchar(100) not null,
   FECHAINGRESO         datetime not null,
   EDITA                bool not null,
   primary key (IDUSUARIO)
);

alter table PRODUCTO add constraint FK_CREADO foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO) on delete cascade on update cascade;

alter table PRODUCTO add constraint FK_PERTENECE foreign key (IDCATEGORI)
      references CATEGORIA (IDCATEGORI) on delete cascade  on update cascade;

alter table COLOR add constraint FK_TIENE foreign key (IDPRODCUTO)
      references PRODUCTO (CODPROD) on delete cascade on update cascade;

/*Agregamos un usuario de prueba*/
INSERT INTO `miraentuinterior`.`USUARIO` (`IDUSUARIO`, `EMAILUSER`, `USERNAME`, `PASSWORD`, `NOMBREUSER`, `FECHAINGRESO`, `EDITA`) VALUES (NULL, 'grumpy@cat.cl', 'grumpycat', MD5('123'), 'Grumpy Cat', '2015-06-23 16:43:23', '1');

/*Agregamos un producto de prueba*/
INSERT INTO `miraentuinterior`.`CATEGORIA` (`IDCATEGORI`,`NOMCATEGOR`, `DESCRIPCATEGO`, `IMAGENCAT`) VALUES (NULL, 'Abstracto', 'Diseños abstractos que...', 'algo.jpg');/*Agregamos un producto de prueba*/

