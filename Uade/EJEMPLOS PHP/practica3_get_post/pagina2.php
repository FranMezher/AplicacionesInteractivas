<html>

<head>
  <title>Problema</title>
</head>

<body>

<!-- $_POST recibe un dato por metodo post 
$_GET recibe un dato por metodo get 
$_REQUEST recibe un dato por cualquiera de los dos
 -->




  <?php
  if ($_REQUEST['radio1'] == "suma") {
    $suma = $_REQUEST['valor1'] + $_REQUEST['valor2'];
    echo "La suma es:" . $suma;
  } else {
    if ($_REQUEST['radio1'] == "resta") {
      $resta = $_REQUEST['valor1'] - $_REQUEST['valor2'];
      echo "La resta es:" . $resta;
    }
  }

  ?>

</body>

</html>