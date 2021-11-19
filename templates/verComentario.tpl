{include file="templates/header.tpl"}


<div id="app" class="container">
    <span id="id" data-id="{$id}"></span>
    <div class="row">
    {if isset($nombre)}
        <div class="col-4">
            <h4>Ingrese su comentario</h4>
            <form id="apiForm" method="POST">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comentario" required></textarea>
                <br>
                <div class="mb-3">
                    <input class="form-control" name="puntaje" type="number" placeholder="Puntaje del 1 al 5" required>
                </div>
                <div class="flex">
                <a class="btn btn-warning" href="gabinetes">Volver atras</a>
                <input class="btn btn-primary" type="submit" value="Cargar">
                </div>
            </form>
        </div>
    {/if}
        <div class="col-7">
            <br>
            <ul>
                {literal}
                    <ul class="list-group" v-for="coment in comentarios">
                        <li v-if="coment.id_comentario" class="list-group-item">{{coment.comentario}} | {{coment.puntaje}}</li>
                    </ul>
                {/literal}
            </ul>
        </div>      
    </div>
    <br>
</div>

<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>