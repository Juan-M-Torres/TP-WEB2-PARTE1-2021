{include file="header.tpl"}

<div class="container">    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Microprocesador</th>
                    <th scope="col">Motherboard</th>
                    <th scope="col">Ram</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Gamer</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$datos item=dato}
                <tr>
                    <td>{$dato->microprocesador}</td>
                    <td>{$dato->motherboard}</td>
                    <td>{$dato->ram} Gb</td>
                    <td>{$dato->descripcion}</td>
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
    <a class="btn btn-warning" href="kit">Volver atras</a>
</div>


{include file="footer.tpl"}