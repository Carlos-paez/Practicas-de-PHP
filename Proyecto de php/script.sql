create table admins
(
    id       int auto_increment
        primary key,
    nombre   varchar(30) null,
    apellido varchar(30) null,
    alias    varchar(30) null,
    pass     varchar(5)  null
)
    engine = InnoDB;

create table usuarios
(
    id       int auto_increment
        primary key,
    nombre   varchar(30) null,
    apellido varchar(30) null,
    pass     varchar(5)  null
)
    engine = InnoDB;


