
{include file="header.tpl"}

{foreach from=$dcomponente item=dato }
    <form action="editComponente" method="POST">
        <input type="hidden" name="id" value="{$dato->id_componentes}">
        <input type="text" name="micro" value="{$dato->microprocesador}" required>
        <input type="text" name ="mother" value="{$dato->motherboard}" required>
        <input type="number" name ="ram" value="{$dato->ram}" required>
        <textarea name="descripcion" value="{$dato->descripcion}" cols="20" rows="10" style="resize: vertical; max-height: 200px;"></textarea>
        
        <select name="gamer">
        {foreach from=$marcas item=item}
            <option value="{$item->id_gabinetes}">{$item->marca},{if $item->gamer == 1}
                "Gamer"
                {else}
                    "No Gamer"            
            {/if}</option>
        {/foreach}
        </select>
        <input type="submit" value="editar">
</form>  
{/foreach}

<a href="componentes">Volver atras</a>

{include file="footer.tpl"}