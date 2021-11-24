{include file="header.tpl"}
    <div class="container">
        <div class="col-4">
            <h2>{$titulo}</h2>
            <form method="POST" action="registry">
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" placeholder="Email..." required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password..." required>
                </div>
                <input class="btn btn-primary" type="submit" value="Registrarse">
            </form>
            
            
        </div>
        <h4 class="alert-danger">{$error}</h4>
    </div>
{include file="footer.tpl"}