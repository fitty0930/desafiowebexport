# Desafio WebExport

##### Un desafio consistente en crear usuarios y roles para poder asignar los roles a los usuarios

Para el funcionamiento de este proyecto se requiere tener una base de datos mySQL llamada db_desafio a donde importaremos el archivo .sql que se encuentra
en la carpeta BDD

A continuación dejo los usuarios que vienen por defecto al importar la base de datos:

* Username: martin0930      Password: 12345     Permisos: Administrador
* Username: joseluisperales Password: 12345     Permisos: Usuario
* Username: hola            Password: hola      Permisos: Usuario
* Username: ricardoarjona   Password: 12345     Permisos: Usuario
* Username: webexport       Password: webexport Permisos: Administrador

Los administradores pueden crear, modificar y eliminar usuarios y roles pudiendo además asignar o quitar roles a un determinado usuario.
Los usuarios solo pueden asignar roles.
Los visitantes solo pueden visualizar.

Si se quiere usar con Docker en lugar de Xampp:
Luego de clonar el proyecto cambiar de rama con el comando "git checkout dockerbranch"

Usar el comando "docker compose up" para levantar el proyecto

Se debe importar la base de datos desde el archivo db_desafio.sql que se encuentra dentro de la carpeta BDD en el contenedor de phpmyadmin

Luego simplemente se va al puerto del proyecto y estará en funcionamiento

Puertos: 
* Proyecto --- localhost:8080
* PhpMyAdmin --- localhost:8081 
* Adminer --- localhost:8083
