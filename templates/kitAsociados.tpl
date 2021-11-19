{include file="header.tpl"}
<div class="container">
    {if $cantidad > 0}
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Microprocesador</th>
                <th scope="col">Motherboard</th>
                <th scope="col">Ram</th>
                 {if isset($nombre)}
                <th scope="col"></th>
                 {/if}
            </tr>
        </thead>
        <tbody>
        {foreach from=$dcompAsoc item=dato}
            <tr>
                <td>{$dato->microprocesador}</td>
                <td>{$dato->motherboard}</td>
                <td>{$dato->ram}</td>
                 {if isset($nombre)}
                <td><a href="borrarKit/{$dato->id_kit}"><input class="btn btn-danger" type="button" value="Borrar"></a></td>
                {/if}
            </tr>
        {/foreach}
        </tbody>
    </table>
    {else}
        <h3>No hay datos asociados a este gabinete</h3>
    {/if}

    <a class="btn btn-warning" href="gabinetes?pagina=1">Volver atras</a>
    
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>