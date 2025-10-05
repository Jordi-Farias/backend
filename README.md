# backend


user:  
contraseña:

DROP TABLE proyecto;

TABLA proyecto

    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    integrantes VARCHAR(255) NOT NULL,
    url VARCHAR(100) NOT NULL,
    activo BOOLEAN NOT NULL

FUNCIONES proyecto

    insert into proyecto (nombre, descripcion, integrantes, url, activo) 
    values ('proyecto ejemplo', 'descripcion del proyecto ejemplo', 'integrante 1, integrante 2', 'link', '1');

    insert into proyecto (nombre, descripcion, integrantes, url, activo) values
    ('Proyecto 1', 'Descripción del proyecto 1', 'Integrante 1, Integrante 2', 'http://link1.com', true),
    ('Proyecto 2', 'Descripción del proyecto 2', 'Integrante A, Integrante B', 'http://link2.com', true),
    ('Proyecto 3', 'Descripción del proyecto 3', 'Integrante X, Integrante Y', 'http://link3.com', false);
# backend
