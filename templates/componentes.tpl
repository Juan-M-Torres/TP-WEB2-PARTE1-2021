{include file="header.tpl"}
<div class="container">
    <div class="outer">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Microprocesador</th>
                    <th scope="col">Motherboard</th>
                    <th scope="col">Ram</th>
                    <th scope="col"></th>
                    {if isset($nombre)}
                        <th scope="col"></th>
                        <th scope="col"></th>
                    {/if}
                </tr>
            </thead>
            <tbody>
            {foreach from=$dcomponentes item=dato}
                <tr>
                    <td>{$dato->microprocesador}</td>
                    <td>{$dato->motherboard}</td>
                    <td>{$dato->ram} Gb</td>
                    <td><a href="verMas/{$dato->id_kit}"><input class="btn btn-info" type="button" value="Ver descripcion"></a></td>
                    {if isset($nombre)}
                    <td><a href="borrarKit/{$dato->id_kit}"><input class="btn btn-danger" type="button" value="Borrar"></a></td>
                    <td><a href="editarKit/{$dato->id_kit}"><input class="btn btn-success" type="button" value="Editar"></a></td>
                    {/if}
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
     {if isset($nombre)}
     <div class="bajar">
        <div class="col-12">
            <form action="agregarKit" class="voltear" method="POST">
                <div class="col-2">
                    <input class="form-control" type="text"  name="micro" placeholder="Ingrese Micro">
                </div>
                <div class="col-2 separar">
                    <input class="form-control" type="text" name="mother" placeholder="Ingrese Mother">
                </div>
                <div class="col-2 separar">
                    <input class="form-control" type="number" name="ram" placeholder="Ingrese Ram">
                </div>
                <div class="col-2 separar">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"  placeholder="Agrege descripcion"></textarea>
                </div>
                <div class="col-3 select">
                    <div class="centrar">
                        <label>Gabinete</label>
                    </div>
                    <div class="separar">
                        <select id="disabledSelect" class="form-select" name="gamer">
                        {foreach from=$dgabinete item=dato}
                            <option value="{$dato->id_gabinete}">{$dato->marca},{if $dato->gamer == 1}
                                "Gamer"
                                {else}
                                    "No Gamer"            
                            {/if}</option>
                        {/foreach}
                        </select>
                    </div>
                <div>
                <input class="btn btn-primary" type="submit" style="margin-left: 5px;" value="Agregar">
            </form>
        </div>  
    </div>
    {/if}
</div>

{include file="footer.tpl"}
