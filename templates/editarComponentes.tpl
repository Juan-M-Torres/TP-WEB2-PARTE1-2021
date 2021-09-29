{include file="header.tpl"}

<form action="editarComponentes" method="POST">
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