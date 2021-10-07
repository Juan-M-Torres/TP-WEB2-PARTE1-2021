
{include file="header.tpl"}
<div class="container">
    <div class="col-4">
        {foreach from=$edit item=dato }
            <form action="editGabinete" method="POST">
                <div class="mb-3">
                    <input class="form-control" type="hidden" name="id" value="{$dato->id_gabinete}">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="nombre" value="{$dato->marca}" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name ="marca" value="{$dato->nombre}" required>
                </div>
                <div class="mb-3">
                    <select id="disabledSelect" class="form-select" name="gamer">
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <input class="btn btn-success" type="submit" value="Editar">
            </form>  
        {/foreach}
    </div>
    <br>
    <a class="btn btn-warning" href="gabinetes">Volver atras</a>
</div>


{include file="footer.tpl"}

