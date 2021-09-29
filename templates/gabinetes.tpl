{include file="header.tpl"}

<table>
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <td>Marca</td>
            <td>Nombre</td>
            <td>Gamer</td>
        </tr>
    </thead>
    <tbody>
    {foreach from=$dgabinetes item=dato}
        <tr>
            <td><a href="borrarGabinetes/{$dato->id_gabinetes}"><input type="button" value="borrar"></a></td>
            <td><a href="editarGabinete/{$dato->id_gabinetes}"><input type="button" value="editar"></a></td>
            <td><a href="verComponentesAsociados/{$dato->id_gabinetes}"><input type="button" value="ver componentes asociados"></a></td>
            <td>{$dato->marca}</td>
            <td>{$dato->nombre}</td>
            {if $dato->gamer == TRUE }
                <td>Si</td>
                {else}
                <td>No</td>
            {/if}
            
        </tr>
    {/foreach}
    </tbody>
</table>

<p>Agregar un gabinete</p>

<form action="agregarGabinetes" method="POST">
<input type="text" name="marca" placeholder="Marca del Gabinete" required>
<input type="text" name ="nombre" placeholder="Nombre del gabinete" required>
<select name="gamer" id="">
<option value="si">Si</option>
<option value="no">No</option>
</select>
<input type="submit" value="Cargar">
</form>


{include file="footer.tpl"}