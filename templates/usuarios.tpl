{include file='templates/header.tpl'}
<div class="container">
    <h2>Lista de usuarios</h2>
    <ul class="list-group">
        {foreach from=$users item=user}
            <li class="list-group-item">
                {$user->email}
                {if $user->email != $nombre}
                    <a class="btn btn-danger" href="borrarUsuario/{$user->id_usuario}">Borrar</a>
                {/if} 
                {if $user->id_rol == 2}
                    | <a class="btn btn-success" href="adminUsuario/{$user->id_usuario}">Admin</a>
                {else if $user->email != $nombre && $user->id_rol != 2}
                    | <a class="btn btn-success" href="colaboradorUsuario/{$user->id_usuario}">User</a>
                {/if}
                
            </li>
        {/foreach}
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>