
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
                    <p> Este usuario no tiene roles asignados </p>
                </div>
                <a v-for="rol in roles" class="list-group-item list-group-item-action"> 
                        <div class="card-footer">
                            <li> Rol: {{ rol.nombre }}</li>
                        </div>
                {/literal}
                {if $admin}
                    {literal}
                    <button class="btn btn-danger borrar" @click="(event)=>{borrarRol(event, rol.id_userxrol)}"> Borrar </button>
                    
                    {/literal}
                {/if}
                    {literal}
                </a>
            </ul>
    </div>
    {/literal}
    {if $nombreUsuario}
    
    <div class="col-12">
        <br>
        <h4 class="mb-0 card-header">Agrega un rol </h4>
        <br>
        <label for="">Roles disponibles</label>
        <select name="" class="custom-select" id="rol-usuario">
            <option> Añadir rol </option>
            {foreach $roles as $rol} 
            <option value={$rol->id_rol}>{$rol->nombre}</option>
            {/foreach}
        </select>
        <br>
        <br>
        <button class="btn btn-success btn-block" @click="agregarRol">Agregar</button>
    </div>
    {/if}
    {literal}
       
        
</section>
{/literal}