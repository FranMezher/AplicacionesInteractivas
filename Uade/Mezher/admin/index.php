
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="../assets/css/style2.css">


</head>
<body OnLoad="NoBack();">



<div class="container" id="container">
        <div class="form-container sign-up-container">

            <form action="registro.php" method="POST" autocomplete="off">
                <h3>Registro</h3>            
           
                <div class="form-group">                    
                <input type="text" name="usuario" placeholder="Usuario" class = "form-control" autocomplete="new-number" required>
                <input type="password" name="clave" placeholder="Clave" class = "form-control" autocomplete="new-password" required>
                <input type="text" name="gmail" placeholder="Gmail" class = "form-control" autocomplete="new-number" required>
                 </div>                 
               
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
			
        </div>
        <!-- REGISTER ENDS HERE -->
        <!-- LOGIN -->
        <div class="form-container sign-in-container">
            <form action="login.php" method="post" autocomplete="off">
                <h3>Login</h3>
                <div class="form-group">
                <input type="text" autocomplete="new-text" name="usuario" placeholder="Usuario" class = "form-control" required>
                 </div>

                 <div class="form-group">  
                <input type="password" autocomplete="new-password" name="clave"  placeholder="Contraseña" class = "form-control" required>
                 </div>
               
                <button type="submit" class="btn btn-primary">Entrar</button>
                <br>

                         
            </form>
        </div>
        <!-- LOGIN ENDS HERE -->
        <div class="overlay-container"> 
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h3>Ya tenes cuenta?</h3>
                    <p></p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h3>Car</h3>
                    <p>No tenes cuenta?</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script language="javascript">
    function NoBack(){
    history.go(1)
    }
    </script>


<script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>