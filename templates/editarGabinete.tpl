
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
                    <select id="seleccion" class="form-select" name="gamer">
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="flex">
                    <a class="btn btn-warning" href="gabinetes">Volver atras</a>
                    <input class="btn btn-success" type="submit" value="Editar"> 
                </div>
            </form>  
            <input type="hidden" name="" id="inputGamer" value="{$dato->gamer}">
        {/foreach}
    </div>
    
    
</div>

<script src="./js/transformadorGamer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

