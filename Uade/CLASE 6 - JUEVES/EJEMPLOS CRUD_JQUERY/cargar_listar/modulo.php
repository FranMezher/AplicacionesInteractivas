<?php

  include"conexion.php";//para conectar el servidor con modulo

  $opcion=$_POST['opcion'];
  

  switch ($opcion) {
    case 'crear':
          $contenido=$_POST['contenido'];
          $dni=$contenido[1];
          $nombre=$contenido[2];
          $apellido=$contenido[3];


          echo $contenido[1];
          
          $sqlquery="insert into alumnos (dni,nombre,apellido,eliminado) values ('$dni','$nombre','$apellido','0')";
          $resultado=mysqli_query($conexion,$sqlquery) or die ("problema al CREAR");
            echo "insertado correctamente";
          mysqli_close($conexion);
      break;
    case 'leer':
                $sqlquery="SELECT * FROM alumnos WHERE eliminado = 0";
                $resultado=mysqli_query($conexion,$sqlquery) or die ("problema al LEER");
                while($res=mysqli_fetch_row($resultado))
                {
                  echo "DNI: ";
                    echo $res[1].'<br>';

                  echo "NOMBRE: ";
                    echo $res[2].'<br>';

                  echo "APELLIDO: ";
                    echo $res[3].'<br>';
                    echo "<br>";
                }
              mysqli_close($conexion);
      break;
    case 'actualizar':

          $dni=$_POST['dni'];
          $nombre=$_POST['nombre'];
          $apellido=$_POST['apellido'];

          $sqlquery="UPDATE alumnos SET nombre = '$nombre', apellido = '$apellido' WHERE dni ='$dni'";

            $resultado=mysqli_query($conexion,$sqlquery) or die ("problema al modificar");
            echo "modificado correctamente";
      break;




    case 'eliminar':

    $dni=$_POST['dni'];

        $sqlquery="DELETE FROM alumnos WHERE dni = '$dni' ";

          $resultado=mysqli_query($conexion,$sqlquery) or die ("problema al eliminar");

          echo "eliminado correctamente";

      break;

      case 'eliminar_logico':

      $dni=$_POST['dni'];

        $sqlquery="UPDATE alumnos SET eliminado = '1' WHERE dni = '$dni'";

          $resultado=mysqli_query($conexion,$sqlquery) or die ("problema al eliminar");

          echo "eliminado logico correctamente";

      break;
  }

?>