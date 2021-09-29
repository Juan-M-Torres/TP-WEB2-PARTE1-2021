{include file="header.tpl"}

<table>
    <thead>
        <tr>
            <td>microprocesador</td>
            <td>motherboard</td>
            <td>ram</td>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    {foreach from=$dcomponentes item=dato}
        <tr>
            <td>{$dato->microprocesador}</td>
            <td>{$dato->motherboard}</td>
            <td>{$dato->ram}</td>
            <td><a href="verMas/{$dato->id_componentes}"><input type="button" value="ver descripcion"></a></td>
            <td><a href="borrarComponentes/{$dato->id_componentes}"><input type="button" value="borrar"></a></td>
            <td><a href="editarComponentes/{$dato->id_componentes}"><input type="button" value="editar"></a></td>
        </tr>
    {/foreach}
    </tbody>
</table>

<form action="agregarComponentes" method="POST">
    <input type="text"  name="micro" placeholder="Ingrese Micro">
    <input type="text" name="mother" placeholder="Ingrese Mother">
    <input type="text" name="ram" placeholder="Ingrese Ram">
    <textarea name="descripcion" cols="30" rows="10" placeholder="Agrege descripcion"></textarea>
    <select name="gamer" id="">
    {foreach from=$dgabinete item=dato}
        <option value="{$dato->id_gabinetes}">{$dato->marca},{if $dato->gamer == 1}
            "Gamer"
            {else}
                "No Gamer"            
        {/if}</option>
    {/foreach}
    </select>
    <input type="submit" value="agregar">
</form>

{include file="footer.tpl"}