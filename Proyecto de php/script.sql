create table usuarios
(
    id               int auto_increment
        primary key,
    nombre           varchar(30)  null,
    apellido         varchar(30)  null,
    email            varchar(50)  null,
    fecha_nacimiento datetime     null,
    user_level       varchar(10)  null,
    pass             varchar(255) null
);


