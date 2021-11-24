{include file="templates/header.tpl"}
<div class="container">
      <div class="col-4">
        <form method="POST" action="filtroGabinetes" class="d-flex mt-2">
            <input class="form-control me-2" type="search" placeholder="Buscar por marca" name="buscador" required>
            <input class="btn btn-outline-success" type="submit" value="Buscar">
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Marca</th>
                <th scope="col">Nombre</th>
                <th scope="col">Gamer</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$filtro item=dato}
                <tr>
                    <td>{$dato->marca}</td>
                    <td>{$dato->nombre}</td>
                    {if $dato->gamer == TRUE }
                        <td>Si</td>
                    {else}
                        <td>No</td>
                    {/if}
                    <td><a href="verKitsAsociados/{$dato->id_gabinete}"><input class="btn btn-info" type="button" value="ver Kit Asociados"></a></td>
                    <td><img src="data:image/jpg;base64,{$dato->imagen}" width="230px"></td>
                    <td ><a href="verComentario/{$dato->id_comentario}"><input class="btn btn-warning" type="button" value="Comentarios"></a></td>                      
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>
{include file="templates/footer.tpl"}