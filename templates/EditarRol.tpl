{include 'templates/header.tpl'}  
    
    <h3> Editar Rol </h3>
    <div>
        <form action="editarrol/{$rol->id_rol}" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{$rol->nombre}">
            <button type="submit">Editar Rol</button>
        </form>
    </div>
{include 'templates/footer.tpl'} 