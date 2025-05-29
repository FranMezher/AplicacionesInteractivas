<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript"
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>

<script type="text/javascript">
  emailjs.init('euB1p39Z5sSJDb174')
</script>
</head>
<body>

<div class="container mt-5">
    <h2>Contacto</h2>
    <form id="form">
  <div class="field">
    <label for="from_name">from_name</label>
    <input type="text" name="from_name" id="from_name">
  </div>
  <div class="field">
    <label for="to_name">to_name</label>
    <input type="text" name="to_name" id="to_name">
  </div>
  <div class="field">
    <label for="message">message</label>
    <input type="text" name="message" id="message">
  </div>
  <div class="field">
    <label for="email_id">email_id</label>
    <input type="text" name="email_id" id="email_id">
  </div>
 

  <input type="submit" id="button" value="Send Email" >
</form>
</div>

<!-- Enlace a Bootstrap JS y dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="codigo.js"></script>
</body>
</html>
