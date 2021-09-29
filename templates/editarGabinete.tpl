
{include file="header.tpl"}

{foreach from=$edit item=dato }
    <form action="editGabinete" method="POST">
        <input type="hidden" name="id" value="{$dato->id_gabinetes}">
        <input type="text" name="nombre" value="{$dato->marca}" required>
        <input type="text" name ="marca" value="{$dato->nombre}" required>
        <select name="gamer">
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <input type="submit" value="Editar">
</form>  
{/foreach}

<a href="gabinetes">Volver atras</a>

{include file="footer.tpl"}

