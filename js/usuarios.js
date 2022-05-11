"use strict"
document.addEventListener("DOMContentLoaded", function () {
    let app = new Vue({
        el: "#usuarios-api",
        data: {
            titulo: "Usuarios",
            cargando: false,
            usuarios: [],
        },

        methods: {
            borrarUsuario: function (event, id_usuario) {
                let urlencoded = encodeURI("api/usersapi/" + id_usuario)
                fetch(urlencoded, {
                    "method": "DELETE"
                })
                    .then(response => {
                        if (!response.ok) { console.log("error"); } else { return response.json() }
                    })
                    .then(() => {
                        getUsuarios();
                        console.log("Borrado exitoso", id_usuario);
                    })
                    .catch(error => console.log(error));
            },
            editarUsuario: function (event, id_usuario) {
                location.replace("edicionusuario/"+id_usuario);
            },
            rolesDelUsuario: function (event, id_usuario) {
                location.replace("usuarios/"+id_usuario);
            },
            agregarUsuario: function () {
                let nombre_usuario = document.querySelector("#nuevo-username").value;
                let password = document.querySelector('#nueva-password').value;
                let data = {
                    "nombre_usuario": nombre_usuario,
                    "password": password
                };

                let urlencoded = encodeURI("api/usersapi")

                fetch(urlencoded, {
                    "method": "POST",
                    "mode": 'cors',
                    "headers": { 'Content-Type': 'application/json' },
                    "body": JSON.stringify(data)
                }).then(response => {
                    if (!response.ok) { console.log("error"); } else { return response.json() }
                })
                    .then(() => {
                        getUsuarios();
                        document.querySelector('#nuevo-username').value="";
                        document.querySelector('#nueva-password').value="";
                        console.log("publicado con exito")
                    })
                    .catch(error => console.log(error));
            }

        },
    }
    );

    document.addEventListener("load", getUsuarios());

    function getUsuarios() {
        app.cargando = true;
        let urlencoded = encodeURI("api/usersapi")
        fetch(urlencoded)
            .then(response => {
                if (!response.ok) { console.log("error"); } else {
                    return response.json()
                }
            })
            .then(usuarios => {
                app.usuarios = usuarios;
                app.cargando = false;
            })
            .catch(error => console.log(error));
    };
});