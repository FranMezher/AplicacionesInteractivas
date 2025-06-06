<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca</title>
    <link rel="stylesheet" type="text/css" href="estilo_login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>

    <div class="card card-login mx-auto text-center bg-dark">
        <div class="card-header mx-auto bg-dark">
            <span> <img src="img/logo-biblioteca.png" class="w-75" alt="Logo"> </span><br/>
            <span class="logo_title mt-5">Biblioteca Digital</span>


        </div>
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="nombre" name="nombre" type="text" placeholder="Usuario" required="required" autocomplete="off" aria-label="Nombre de Usuario" class="form-control">
                </div>

                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input id="pass" name="pass" type="password" placeholder="Contraseña" required="required" autocomplete="off" aria-label="Contraseña" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="inicio" value="Iniciar Sesión" class="btn btn-outline-danger float-right login_btn">
                </div>

            </form>
        </div>
    </div>


<!--FIN FORMULARIO BOOTSTRAP -->  

</body>
</html>