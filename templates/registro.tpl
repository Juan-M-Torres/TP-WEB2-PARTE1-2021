{include file='templates/header.tpl'}

<div class="container">
    <h2>Registrate</h2>
    <div class="col-4">
        <form action="registrarUsuario" method="POST">
            <div class="mb-3">
                <input class="form-control" type="text" name="email" placeholder="Ingrese su email..."/>
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Ingrese su password..."/>
            </div>
            <input class="btn btn-primary" type="submit" value="Registrar">
        </form>
    </div>
</div>
<br>
{include file='templates/footer.tpl'}