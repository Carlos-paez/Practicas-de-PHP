DROP TABLE usuarios;

DELETE FROM Usuarios WHERE id = 3;

CREATE TABLE Usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) not null,
    apellido VARCHAR(30) not null,
    email varchar(50) not null,
    fecha_nacimiento datetime not null,
    user_level varchar(10) not null,
    pass varchar(255) not null
);

select * from pruebas.Usuarios;

select * from pruebas.usuarios where nombre = 'Carlos' and pass = '123';

insert into pruebas.Usuarios(nombre, apellido, email,usuarios.fecha_nacimiento, user_level, pass)
values ('Carlos', 'Páez','carlospaezguerra@gmail.com', '2006-06-30', 'admin', '123');