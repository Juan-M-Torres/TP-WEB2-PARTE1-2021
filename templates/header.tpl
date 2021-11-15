<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pc componentes</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<body>
    <header>
            <h1 class= "headerTitulo">PC Componentes</h1>
        
    </header>
    <div class="d-flex justify-content-between navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <h3 class="link-light">Tu tienda Gamer</h3>
            <ul class=" navbar-nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="home">Home</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="gabinetes">Nuestros Gabinetes</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="kit"> Nuestros Kits</a></li>
                {if !isset($nombre)}
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="login">Login</a></li>
                {/if}
                {if isset($admin)}
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="usuarios">Administracion</a></li>
                {/if}
            </ul>
        </nav>

        {if isset($nombre)}
        <div class= "nombreLogin">
            <h6 class= "loginIngresado"> Hola: {$nombre}</h6>
            <a href="logout"><button type="button" class="btn btn-danger btn-sm">Log Out</button></a>
        </div>
        {/if}
    </div>

