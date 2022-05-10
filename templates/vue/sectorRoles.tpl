
{literal}
<section id="userroles-api">
    <div class="card col-md-12">
    <div  class="col-md-12">
    {/literal}
        Roles de {$usuario->nombre_usuario}
    {literal}
    </div>          
            <div v-if="cargando" class="card-body">
                Cargando...
            </div>
            
            <ul v-else class="list-group">
                <div  v-if= "!roles[0]">
                    <p> este usuario no tiene roles asignados </p>
                </div>
                <a v-for="rol in roles" class="list-group-item list-group-item-action"> 
                        <div class="card-footer">
                            <li> Rol: {{ rol.nombre }}</li>
                        </div>
                {/literal}
                {if $admin}
                    {literal}
                    <button class="btn btn-danger" @click="(event)=>{borrarComentario(event, comentario.id_comentario)}" class="borrar"> Borrar </button>
                    
                    {/literal}
                {/if}
                    {literal}
                </a>
            </ul>
    </div>
    {/literal}
    {if $nombreUsuario}
    {literal}
    <div class="col-12">
        <h4 class="mb-0 card-header">Agrega un rol </h4>
        <br>
        <label for="">Roles disponibles</label>
        <select name="" class="custom-select" id="puntaje-comentario">
            <option selected value="5"> Añadir rol </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button class="btn btn-success btn-block" @click="">Agregar</button>
    </div>
    {/literal}
    {/if}
    {literal}
       
        
</section>
{/literal}