{include file="header.tpl"}

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
    {foreach from=$dcomponentes item=dato}
        <tr>
            <td>{$dato->microprocesador}</td>
            <td>{$dato->motherboard}</td>
            <td>{$dato->ram}</td>
            <td><a href="borrarComponentes/{$dato->id_componentes}"><input type="button" value="borrar"></a></td>
        </tr>
    {/foreach}
    </tbody>
</table>

<form action="agregarComponente" method="POST">
    <input type="text" placeholder="Ingrese Micro">
    <input type="text" placeholder="Ingrese Mother">
    <input type="text" placeholder="Ingrese Ram">
    <select name="marca" id="">
    {foreach from=$marcas item=dato}
    <option value="{$dato->id_gabinetes}">{$dato->marca}</option>
    {/foreach}
    </select>
    <input type="submit" value="agregar">
</form>

{include file="footer.tpl"}