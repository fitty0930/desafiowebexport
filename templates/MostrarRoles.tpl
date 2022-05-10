{include 'templates/header.tpl'}  
    <div class="container">
    <h3> Categorias </h3>
        <ul class="list-group">
            {foreach $roles as $rol} 
                <li class="list-group-item">
                <a>{$rol->nombre}</a>
                {if $admin}
                    --------
                    <a href="edicionrol/{$rol->id_rol}">Editar</a>|  
                    <a href="borrarrol/{$rol->id_rol}">Eliminar</a> 
                </li>
                {/if}
            {/foreach}
        </ul>

        {if $admin}
        <h2> Crear nuevo rol </h2>
        <div class="form-group">
            <form action="nuevorol" method="POST">
                <label>Nombre</label>
                <input class="form-control" type="text" name="nombre">
                <br>
                <button type="submit" class="btn btn-primary"> Agregar </button>
            </form>
        </div>
        {/if}
    </div>
{include 'templates/footer.tpl'} 