{include 'templates/header.tpl'}  
<div class="container" data-id_usuario = "{$usuario->id_usuario}">
     <h3>  {$usuario->nombre_usuario}  </h3>
</div>

{* tenes que hacer una consulta que te traiga tambien todos los roles disponibles  *}
<input hidden disabled value="{$usuario->id_usuario}" type="text" class="id_usuario"> 
<div class="container">
     <div class="col-md-12">
          {include 'vue/sectorRoles.tpl'}
     </div>
</div>
{* mi js *}
<script src="js/rolexuser.js"></script>
{include 'templates/footer.tpl'}