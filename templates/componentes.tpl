{include file="header.tpl"}

<table>
    <thead>
        <tr>
            <th></th>
            <td>microprocesador</td>
            <td>motherboard</td>
            <td>ram</td>
        </tr>
    </thead>
    <tbody>
    {foreach from=$dcomponentes item=dato}
        <tr>
            <td><a href="borrarComponentes/{$dato->id_componentes}"><input type="button" value="borrar"></a></td>
            <td>{$dato->microprocesador}</td>
            <td>{$dato->motherboard}</td>
            <td>{$dato->ram}</td>
        </tr>
    {/foreach}
    </tbody>
</table>

{include file="footer.tpl"}