{literal}
<section class="container" id="usuarios-api">
    {/literal}
        <h3> Usuarios </h3>
    {literal}
    <div class="card col-md-12">
    <div  class="col-md-12">
    
    </div>          
            <div v-if="cargando" class="card-body">
                Cargando...
            </div>
            
            <ul v-else class="list-group">
                <div  v-if= "!usuarios[0]">
                    <p> No existen usuarios creados todavia </p>
                </div>
                <a v-for="usuario in usuarios" class="list-group-item list-group-item-action"> 
                        <div class="card-footer">
                            <li> Usuario: {{ usuario.nombre_usuario }}</li>
                        </div>
                    <button class="btn btn-info ver-roles" @click="(event)=>{rolesDelUsuario(event, usuario.id_usuario)}"> Ver Roles </button>
                {/literal}
                {if $admin}
                    {literal}
                    <button class="btn btn-danger borrar" @click="(event)=>{borrarUsuario(event, usuario.id_usuario)}"> Borrar </button>
                    <button class="btn btn-warning editar" @click="(event)=>{editarUsuario(event, usuario.id_usuario)}"> Editar </button>
                    {/literal}
                {/if}
                    {literal}
                </a>
            </ul>
    </div>
    {/literal}
    {if $admin}
    
    <div class="col-12">
        <h4 class="mb-0 card-header">Agrega un Usuario </h4>
        <br>
        <h2> Crear nuevo usuario </h2>
        <label>Nombre de usuario </label>
        <input class="form-control" type="text" name="nombre_usuario"  id="nuevo-username">
        <label> Contraseña </label>
        <input class="form-control" type="text" name="password"  id="nueva-password">
        <br>
        <button class="btn btn-success btn-block" @click="agregarUsuario">Agregar</button>
        <br>
        <br>
    </div>
    {/if}
    {literal}
       
        
</section>
{/literal}