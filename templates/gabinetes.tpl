{include file="header.tpl"}
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Marca</th>
                <th scope="col">Nombre</th>
                <th scope="col">Gamer</th>
            </tr>
        </thead>
        <tbody>
        {foreach from=$dgabinetes item=dato}
            <tr>
                <td><a href="borrarGabinete/{$dato->id_gabinete}"><input class="btn btn-danger" type="button" value="borrar"></a></td>
                <td><a href="editarGabinete/{$dato->id_gabinete}"><input class="btn btn-success" type="button" value="editar"></a></td>
                <td><a href="verKitsAsociados/{$dato->id_gabinete}"><input class="btn btn-info" type="button" value="ver componentes asociados"></a></td>
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


    <h4>Agregar un gabinete</h4>
    <div class="col-4">
        <form action="agregarGabinete" method="POST">
            <div class="mb-3">
                <input class="form-control" type="text" name="marca" placeholder="Marca del Gabinete" required>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name ="nombre" placeholder="Nombre del gabinete" required>
            </div>
            <p>Es gamer?</p>
            <select id="disabledSelect" class="form-select" name="gamer">
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
            <br>
            <input  class="btn btn-primary" type="submit" value="Cargar">
        </form>
            <br>
       
    </div>
 
</div>

{include file="footer.tpl"}
