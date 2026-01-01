create table usuarios
(
    id               int auto_increment
        primary key,
    nombre           varchar(30)  not null,
    apellido         varchar(30)  not null,
    email            varchar(50)  not null,
    fecha_nacimiento datetime     not null,
    user_level       varchar(10)  not null,
    pass             varchar(255) not null
)
    engine = InnoDB;

