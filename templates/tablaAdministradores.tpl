{include file="header.tpl"}

<div class="container">
    <div class="outer">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Administrador</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Quitar Administrador</th>
                    <th scope="col">Hacer Administrador</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$usuarios item=dato}
                    <tr>
                        <td>{$dato->email}</td>
                        {if $dato->admin == TRUE }
                            <td>Si</td>
                        {else}
                            <td>No</td>
                        {/if}
                        <td><a href="eliminarUsuario/{$dato->id_usuario}"><input class="btn btn-danger" type="button" value="Eliminar usuario"></a></td>
                        <td><a href="eliminarAdmin/{$dato->id_usuario}"><input class="btn btn-success" type="button" value="Quitar Adm"></a></td>
                        <td><a href="hacerAdmin/{$dato->id_usuario}"><input class="btn btn-success" type="button" value="Hacer Adm"></a></td>
                    </tr>   
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

{include file="footer.tpl"}