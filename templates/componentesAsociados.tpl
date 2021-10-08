{include file="header.tpl"}

{if $cantidad > 0}  
    <table>
        <thead>
            <tr>
                <td>microprocesador</td>
                <td>motherboard</td>
                <td>ram</td>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$dcompAsoc item=dato}
            <tr>
                <td>{$dato->microprocesador}</td>
                <td>{$dato->motherboard}</td>
                <td>{$dato->ram}</td>
                <td><a href="borrarComponentes/{$dato->id_componentes}"><input type="button" value="borrar"></a></td>
            </tr>
        {/foreach}
        </tbody>
    </table>   
{else}
    <h2>No hay datos asociados a este gabinete</h2>
{/if}

<a href="gabinetes">Volver atras</a>


{include file="footer.tpl"}