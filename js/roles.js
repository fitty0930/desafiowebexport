"use strict"
document.addEventListener("DOMContentLoaded", function () {
    let app = new Vue({
        el: "#roles-api",
        data: {
            titulo: "Roles",
            cargando: false,
            roles: [],
        },

        methods: {
            borrarRol: function (event, id_rol) {
                let urlencoded = encodeURI("api/rolesapi/" + id_rol)
                fetch(urlencoded, {
                    "method": "DELETE"
                })
                    .then(response => {
                        if (!response.ok) { console.log("error"); } else { return response.json() }
                    })
                    .then(() => {
                        getRoles();
                        console.log("Borrado exitoso", id_rol);
                    })
                    .catch(error => console.log(error));
            },
            editarRol: function (event, id_rol) {
                location.replace("edicionrol/"+id_rol);
            },

            agregarRol: function () {
                let nombre = document.querySelector("#nuevo-rol").value;

                let data = {
                    "nombre": nombre
                };

                let urlencoded = encodeURI("api/rolesapi")

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
                        document.querySelector("#nuevo-rol").value="";
                        console.log("publicado con exito")
                    })
                    .catch(error => console.log(error));
            }

        },
    }
    );

    document.addEventListener("load", getRoles());

    function getRoles() {
        app.cargando = true;
        let urlencoded = encodeURI("api/rolesapi")
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