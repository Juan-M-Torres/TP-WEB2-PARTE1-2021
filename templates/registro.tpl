{include file="header.tpl"}

<div class="container">
    <div class="col-4">
        <h2>{$titulo}</h2>
        <form method="POST" action="registroUsuario">
            <div class="mb-3">
                <input class="form-control" type="email" name="email" placeholder="Email..." required>
            </div>
            <div class="mb-3">
                <input class="form-control" type="password" name="password" placeholder="Password..." required>
            </div>
            <input type="hidden" name="rol" value="2">
            <input class="btn btn-primary" type="submit" value="Registrar">
        </form>
        <br>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</body>

</html>