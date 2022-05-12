"use strict"
document.addEventListener("DOMContentLoaded", function () {
    let app = new Vue({
        el: "#userroles-api",
        data: {
            titulo: "Roles del usuario",
            cargando: false,
            roles: []
        },

        methods: {
            borrarRol: function (event, id_userxrol) {
                let urlencoded = encodeURI("api/usuariosxrol/" + id_userxrol)
                fetch(urlencoded, {
                    "method": "DELETE"
                })
                    .then(response => {
                        if (!response.ok) { console.log("error"); } else { return response.json() }
                    })
                    .then(() => {
                        getRoles();
                        console.log("Borrado exitoso", id_userxrol);
                    })
                    .catch(error => console.log(error));
            },

            agregarRol: function () {
                let id_rol = document.querySelector("#rol-usuario").value;
                let id_usuario = document.querySelector(".id_usuario").value;

                let data = {
                    "id_rol": id_rol,
                    "id_usuario": id_usuario
                };

                let urlencoded = encodeURI("api/usuariosxrol")

                fetch(urlencoded, {
                    "method": "POST",
                    "mode": 'cors',
                    "headers": { 'Content-Type': 'application/json' },
                    "body": JSON.stringify(data)
                }).then(response => {
                    if (!response.ok) { console.log("error"); } else { return response.json() }
                })
                    .then(() => {
                        getRoles();
                        console.log("publicado con exito")
                    })
                    .catch(error => console.log(error));
            }

        },
    }
    );

    document.addEventListener("load", getRoles());

    function getRoles() {
        let id_usuario = document.querySelector(".container").dataset.id_usuario;
        app.cargando = true;
        let urlencoded = encodeURI("api/usuarioxrol/" + id_usuario + "/roles")
        fetch(urlencoded)
            .then(response => {
                if (!response.ok) { console.log("error"); } else {
                    return response.json()
                }
            })
            .then(roles => {
                app.roles = roles;
                app.cargando = false;
            })
            .catch(error => console.log(error));
    };

});