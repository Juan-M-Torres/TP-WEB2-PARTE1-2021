{include file="header.tpl"}
<div class="container">
  
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Marca</th>
                <th scope="col">Nombre</th>
                <th scope="col">Gamer</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                {if isset($Administrador)}
                    <th scope="col"></th>
                    <th scope="col"></th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach from=$dgabinetes item=dato}
                <tr>
                    <td>{$dato->marca}</td>
                    <td>{$dato->nombre}</td>
                    {if $dato->gamer == TRUE }
                        <td>Si</td>
                    {else}
                        <td>No</td>
                    {/if}
                    <td><a href="verKitsAsociados/{$dato->id_gabinete}"><input class="btn btn-info" type="button" value="ver Kit Asociados"></a></td>
                    <td ><a href="verComentario/{$dato->id_gabinete}"><input class="btn btn-warning" type="button" value="Comentarios"></a></td>
                    {if isset($Administrador)}
                        <td><a href="borrarGabinete/{$dato->id_gabinete}"><input class="btn btn-danger" type="button" value="Borrar"></a></td>
                        <td><a href="editarGabinete/{$dato->id_gabinete}"><input class="btn btn-success" type="button" value="Editar"></a></td>
                    {/if}                        
                </tr>
            {/foreach}
        </tbody>
    </table>
    
       
     {if isset($Administrador)}
     <div class="bajar">
        <h4>Agregar un gabinete</h4>
        <div class="col-12">
            <form action="agregarGabinete" class="voltear" method="POST">
                <div class="col-3">
                    <input class="form-control" type="text" name="marca" placeholder="Marca del Gabinete" required>
                </div>
                <div class="col-3 separar">
                    <input class="form-control" type="text" name ="nombre" placeholder="Nombre del gabinete" required>
                </div>
                <div class="col-3 select" >
                    <div class="centrar">
                        <label>Es Gamer?</label>
                    </div>
                    <div class="separar">
                        <select id="disabledSelect" class="form-select" name="gamer">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>
                <br>
                <input  class="btn btn-primary" type="submit" value="Cargar">
            </form>
                <br>
        
        </div>
        {/if}
    </div>
</div>
{include file="footer.tpl"}