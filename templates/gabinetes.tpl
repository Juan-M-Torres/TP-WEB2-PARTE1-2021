{include file="header.tpl"}

<table>
    <thead>
        <tr>
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
            <td>{$dato->marca}</td>
            <td>{$dato->nombre}</td>
            {if $dato->gamer == TRUE}
                <td>Si</td>
            {/if}
            {if $dato->gamer == FALSE}
                <td>No</td>
            {/if}
         
        </tr>
    {/foreach}
    </tbody>
</table>

<p>Agregar un gabinete</p>

<form action="agregarGabinetes" method="POST">
<input type="text" name="marcaGabinete" placeholder="Marca del Gabinete" required>
<input type="text" name ="nombreGabinete" placeholder="Nombre del gabinete" required>
<input type="text" name="booleanoGamer" placeholder="Es gamer? si o no" required>
<input type="submit" value="Cargar">
</form>


{include file="footer.tpl"}