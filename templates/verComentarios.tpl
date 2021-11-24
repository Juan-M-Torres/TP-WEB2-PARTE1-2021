{include file="header.tpl"}
{foreach from=$gabinete item=dato}
<h1>Comentarios de gabinete  {$dato->marca}, {$dato->nombre} </h1>
<input type="hidden" value="{$dato->id_gabinete}" id="inputEscondido">
{/foreach}

<div>
    <table id="noComent" class="table">
        <thead>
            <tr>
                <th scope="col">Comentario</th>
                <th scope="col">Puntaje</th>
                {if isset($Administrador)}
                    <th scope="col">Eliminar Comentario</th>
                {/if}
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
<div>
    {if isset($nombre)}
        <div class="col-4">
            <h4>Ingrese su comentario</h4>
            <form id="apiForm" method="POST">
                <textarea class="form-control" id="comentarioPost" rows="3" name="comentario" required></textarea>
                <br>
                <div class="mb-3">
                <p>Puntuacion</p>
                   <select name="" id="puntajePost" class="form-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                   </select>
                </div>
                <div class="flex">
                    <input class="btn btn-primary" type="submit" value="Cargar">
                </div class="flex">
                {foreach from=$gabinete item=dato}
                    <input type="hidden" value="{$dato->id_gabinete}" id="idComentario">
                {/foreach }
                <div>
                
                </div>
            </form>
        </div>
    {/if}
    <br>
<a class="btn btn-warning" href="gabinetes">Volver atras</a>
</div>

{if isset ($Administrador)}
    <input type="hidden" id="usuarioConectado" value="{$Administrador}">
{/if}

<script src="js/jsComentarios.js"></script>

{include file="footer.tpl"}