{include file="header.tpl"} {* template dentro de un template *}
    <div class="container">
      <h3> Editar Usuario </h3>

        <form action="editarusuario/{$usuario->id_usuario}"  method="POST" enctype="multipart/form-data">

                
                <label>Nombre de usuario </label>
                <input class="form-control" type="text" name="username" placeholder="" value={$usuario->nombre_usuario}> 
            
                <label> Password </label>
                <input class="form-control" type="text" name="password" placeholder="" value={$usuario->password}>

                {* <select class="custom-select" name="role" id="role"> 
                <option selected value="{$producto->id_categoria}" > {$selector->id_categoria} </option>
                
                {foreach $categorias as $categoria}
                {if $producto->id_categoria!=$categoria->id_categoria}
                
                <option value="{$categoria->id_categoria}">{$categoria->nombre}</option>
                {/if}
                {/foreach}
                </select> *}
                
            <br>
            <button type="submit" class="btn btn-primary" name="editar" value="{$producto->id_producto}"> Editar </button>
            
        </form>
    </div>
 

{include file="footer.tpl"}  {* template dentro de un template *}