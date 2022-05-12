
{literal}
<section class="container" id="roles-api">
    {/literal}
        <h3> Roles </h3>
    {literal}
    <div class="card col-md-12">
    <div  class="col-md-12">
    
    </div>          
            <div v-if="cargando" class="card-body">
                Cargando...
            </div>
            
            <ul v-else class="list-group">
                <div  v-if= "!roles[0]">
                    <p> No existen roles creados todavia </p>
                </div>
                <a v-for="rol in roles" class="list-group-item list-group-item-action"> 
                        <div class="card-footer">
                            <li> Rol: {{ rol.nombre }}</li>
                        </div>
                {/literal}
                {if $admin}
                    {literal}
                    <button class="btn btn-danger borrar" @click="(event)=>{borrarRol(event, rol.id_rol)}"> Borrar </button>
                    <button class="btn btn-warning editar" @click="(event)=>{editarRol(event, rol.id_rol)}"> Editar </button>
                    {/literal}
                {/if}
                    {literal}
                </a>
            </ul>
    </div>
    {/literal}
    {if $admin}
    
    <div class="col-12">
        <h4 class="mb-0 card-header">Agrega un rol </h4>
        <br>
        <h2> Crear nuevo rol </h2>
        <label>Nombre</label>
        <input class="form-control" type="text" name="nombre"  id="nuevo-rol">
        <br>
        <button class="btn btn-success btn-block" @click="agregarRol">Agregar</button>
        <br>
        <br>
    </div>
    {/if}
    {literal}
       
        
</section>
{/literal}