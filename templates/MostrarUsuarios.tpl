{include file="header.tpl"}   
    
    <div class="container">
    <h1>{$titulo}</h1>
        <ul class="list-group">
            {* imprimo con un foreach a cada cosa del objeto productos lo subdivido e imprimo *}
            {foreach $usuarios as $usuario}
                <li class="list-group-item">Nombre: {$usuario->nombre_usuario} ID: {$usuario->id_usuario}
                {if $admin} 
                <a href="borrarusuario/{$usuario->id_usuario}" class="badge badge-danger text-wrap" style="width: 6rem;"> Borrar </a> <a class="badge badge-warning text-wrap" style="width: 6rem;" href="edicionusuario/{$usuario->id_usuario}"> Modificar </a>
                {/if}
                </li>      
            {/foreach}
        </ul>
    </div>
    {if $admin} 
     {* tendria que agregar un variable para definir si es administrador o cambiar esta  *}
    <div class="container">
        <div class="form-group">
            <br>
            <h2> Formulario de mantenimiento </h2>
            <form action="crearusuario"  method="POST" enctype="multipart/form-data"> 
                   
                    <label>Nombre de usuario </label>
                    <input class="form-control" type="text" name="username" placeholder=""> 
                
                    <label> Password </label>
                    <input class="form-control" type="text" name="password" placeholder=""> 
                <br>
                <button type="submit" class="btn btn-primary"> Crear Usuario </button>
            </form>
        </div>
    </div>
    {/if}
{include file="footer.tpl"} 
