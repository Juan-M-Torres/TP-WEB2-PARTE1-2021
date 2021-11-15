{include file='templates/header.tpl'}
<ul>
    {foreach from=$users item=user}
        <li>
            {$user->email}
            {if $user->email != $nombre}
                <a href="borrarUsuario/{$user->id_usuario}">Borrar</a>
            {/if} 
            {if $user->id_rol == 2}
                | <a href="adminUsuario/{$user->id_usuario}">Admin</a>
            {else if $user->email != $nombre && $user->id_rol != 2}
                | <a href="colaboradorUsuario/{$user->id_usuario}">User</a>
            {/if}
            
        </li>
    {/foreach}
</ul>
<a href="home">Volver atras</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>