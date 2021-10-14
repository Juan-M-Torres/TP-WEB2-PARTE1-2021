
{include file="header.tpl"}
<div class="container">
    <div class="col-4">
        {foreach from=$dcomponente item=dato }
            <form action="editKit" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="hidden" name="id" value="{$dato->id_kit}">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="micro" value="{$dato->microprocesador}" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name ="mother" value="{$dato->motherboard}" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="number" name ="ram" value="{$dato->ram}" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">{$dato->descripcion}</textarea>
                </div>
                <select id="disabledSelect" class="form-select" name="gamer">
                {foreach from=$marcas item=item}
                    <option value="{$item->id_gabinete}">{$item->marca},{if $item->gamer == 1}
                        "Gamer"
                        {else}
                            "No Gamer"            
                    {/if}</option>
                {/foreach}
                </select>
                
                <input class="btn btn-success " type="submit" value="Editar">
            </form>  
        {/foreach}
    </div>
    
    <a class="btn btn-warning" href="kit">Volver atras</a>
</div>
{include file="footer.tpl"}