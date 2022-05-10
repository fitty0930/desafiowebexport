"use strict"
document.addEventListener("DOMContentLoaded", function(){
    let app = new Vue({
        el: "#userroles-api",
        data: {
            titulo: "Roles del usuario",
            cargando: false,
            comentarios: [],
            promedio: 0
        },
         
        methods: {
            // borrarComentario: function (event, id_comentario){
            // let urlencoded = encodeURI("api/comentarios/"+id_comentario)
            // fetch(urlencoded,{
            //     "method" : "DELETE"
            // })
            // .then(response => {
            //     if (!response.ok) { console.log("error"); } else { return response.json()}})
            // .then( () => {
            //     getRoles();
            //     console.log("Borrado exitoso");
            // })
            // .catch(error => console.log(error));
            // },

            // agregarComentario: function (){
            //     let texto= document.querySelector("#texto-comentario").value;
            //     let puntaje= document.querySelector("#puntaje-comentario").value;
            //     let id_producto = document.querySelector(".id_producto").value;
            //     let id_usuario = document.querySelector(".nombreusuario-id").id;

            //     let data = {
            //         "texto": texto,
            //         "puntaje": puntaje,
            //         "id_producto" : id_producto,
            //         "id_usuario" : id_usuario
            //     };

            //     let urlencoded = encodeURI("api/comentarios")

            //     fetch(urlencoded,{
            //         "method" : "POST",
            //         "mode": 'cors',
            //         "headers": {'Content-Type': 'application/json'},       
            //         "body": JSON.stringify(data)
            //     }).then(response => {
            //         if (!response.ok) { console.log("error"); } else { return response.json()}
            //     })
            //     .then(() =>{
            //         getRoles();
            //         document.querySelector("#texto-comentario").value = "";
            //         document.querySelector("#puntaje-comentario").value = 5;
            //         console.log("publicado con exito")
            //     })
            //     .catch(error => console.log(error));
            // }
            
        },
    }
    );
        
        document.addEventListener("load", getRoles());
        function getRoles(){
            let id_usuario = document.querySelector(".container").dataset.id_usuario;
            // console.log(id_producto);
            app.cargando = true;
            let urlencoded = encodeURI("api/usuarios/"+id_usuario+"/roles")
            fetch(urlencoded)
            .then(response => {
                if (!response.ok) { console.log("error"); } else {
                    console.log(response)
                    return response.json()}})
            .then(roles => {
                
                app.roles = roles;
                app.cargando = false;
            })
            .catch(error => console.log(error));
        };

        setInterval(function(){ getRoles();} , 60000);
});