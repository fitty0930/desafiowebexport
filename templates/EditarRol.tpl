{include 'templates/header.tpl'}  
    <div class="container">
        <h3> Editar Rol </h3>
        <div class="alert alert-warning" role="alert">
        ¡Cuidado! editar un rol generará que todos los usuarios con este rol cambien el rol que poseen
        </div>
        <div>
            <form action="editarrol/{$rol->id_rol}" method="POST">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{$rol->nombre}">
                <button type="submit">Editar Rol</button>
            </form>
        </div>
    </div>
{include 'templates/footer.tpl'} 