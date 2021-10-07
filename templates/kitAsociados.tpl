{include file="header.tpl"}
<div class="container">
    {if $cantidad > 0}
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Microprocesador</th>
                <th scope="col">Motherboard</th>
                <th scope="col">Ram</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$dcompAsoc item=dato}
            <tr>
                <td>{$dato->microprocesador}</td>
                <td>{$dato->motherboard}</td>
                <td>{$dato->ram}</td>
                <td><a href="borrarKit/{$dato->id_kit}"><input class="btn btn-danger" type="button" value="Borrar"></a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>
    {else}
        <h2>No hay datos asociados a este gabinete</h2>
    {/if}

    <a class="btn btn-warning" href="gabinetes">Volver atras</a>
    
</div>
<br>

{include file="footer.tpl"}