{include file="header.tpl"}


    <table>
    <thead>
        <tr>
            <td>microprocesador</td>
            <td>motherboard</td>
            <td>ram</td>
            <td>descripcion</td>
            <td>marca</td>
            <td>nombre</td>
            <td>gamer</td>
        </tr>
    </thead>
    <tbody>
    {foreach from=$datos item=dato}
        <tr>
            <td>{$dato->microprocesador}</td>
            <td>{$dato->motherboard}</td>
            <td>{$dato->ram}</td>
            <td class="scroll">{$dato->descripcion}</td>
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

<a href="componentes">Volver atras</a>



{include file="footer.tpl"}