<!doctype html>
        <html lang="en">
          <head>
            <!-- Required meta tags -->
            <base href="{$basehref}">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="css/img.css">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            {* vue *}
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
            {* TITULO DE LA PAGINA *}
            <title>{$titulo}</title>
            
          </head>
          
          <body>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="home"> Administración de usuarios </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="usuarios">Usuarios</a> {* te lleva a productos  *}
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="roles">Roles</a> {* te lleva a productos  *}
                  </li>
                  {if $admin}                 
                    {* el admin *}
                    <li class="nav-item active ">
                      <a class="nav-link" href="ctrlcuentas"> Control de cuentas </a>
                    </li>  
                  {/if}
                </ul>

                {if $nombreUsuario} {* tiene problemas *}
                
                    <div class="navbar-nav ml-auto">
                        {if $admin}
                        <a class="navbar-brand" >
                          <img src="https://img2.freepng.es/20180402/rqq/kisspng-computer-icons-logo-symbol-clip-art-administrator-5ac2ab29825f65.316448641522707241534.jpg" width="30" height="30" alt="">
                        </a>
                        {else}
                        <a class="navbar-brand" >
                          <img src="https://definicion.de/wp-content/uploads/2019/06/perfildeusuario.jpg" width="30" height="30" alt="">
                        </a>
                        {/if}
                        <span id="{$idUsuario}" class="navbar-text nombreusuario-id">{$nombreUsuario}</span>
                        
                        <a class="nav-item nav-link" href="logout"> Salir </a>
                    </div> 
                    {else}
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="login"> Ingresar </a>
                    </div> 
                    <div class="navbar-nav ">
                        <a class="nav-item nav-link" href="registry"> ¿No tenes cuenta? registrate ahora</a>
                    </div>
                  {/if}
              </div>
            </nav>