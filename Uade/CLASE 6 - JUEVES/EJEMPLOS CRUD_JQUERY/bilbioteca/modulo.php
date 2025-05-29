<?php

include "conexion.php";

  $opcion=$_POST["opcion"];
  switch ($opcion) {
    case 'cargar':
      $datos=$_POST["datos"];
      $libro=$datos[0];
        
      $autor=$datos[1];
      
      $autor_nacional=$datos[2];
        
      $fkgenero=$datos[3];

      $fkidioma=$datos[4];
        
      $sqlquery="INSERT INTO libros (pklibro, libro, autor, autor_nacional, fkgenero, fkidioma) VALUES ('0','".$libro."','".$autor."','".$autor_nacional."','".$fkgenero."', '".$fkidioma."')";
        
      $resultado=mysqli_query($conexion,$sqlquery);
      echo "Se cargo la BBDD de forma exitosa";
      mysqli_close($conexion);
    break;

    case 'eliminar':
      $pklibro=$_POST['pklibro'];
      $query="DELETE FROM libros WHERE pklibro='".$pklibro."'";
      $resultado=mysqli_query($conexion,$query) or die ("problema al eliminar");

      echo "Cliente eliminado correctamente";
    break;
    
    default:
      $query="SELECT * FROM libros INNER JOIN generos ON fkgenero=pkgenero INNER JOIN libros_idiomas on fkidioma=pkidioma";

            $resultado=mysqli_query($conexion,$query);
            $num_rows=mysqli_num_rows($resultado);

            if($num_rows>0) {
              $salida="<table class='table'>
              <h3>Listado</h3>
          <thead class='thead-dark'>    
          <tr>
          <th scope='col'>LIBRO</th>
          <th scope='col'>AUTOR</th>
          <th scope='col'>AUTOR NAC.</th>
          <th scope='col'>GENERO</th>
          <th scope='col'>IDIOMA</th>
          <th scope='col'>ACCION</th>        
          </tr>
          </thead>";
            while ($vec=mysqli_fetch_assoc($resultado)) {
                $salida.="
                <tbody>
                <tr>
                            <td>".$vec['libro']."</td>
                            <td>".$vec['autor']."</td>
                            <td>".$vec['autor_nacional']."</td>
                            <td>".$vec['genero']."</td>
                            <td>".$vec['idioma']."</td>
                            <td><button type='button' name='eliminar' id='btneliminar' class='btn btn-danger' data-pk=".$vec['pklibro'].">ELIMINAR</button></td>
                        </tr>
                        </tbody>";
                        }
                $salida.="</table>";
            }else {
                $salida="No hay dato";
            }
            echo $salida;
            mysqli_close($conexion);
      break;
  }
  
    

?>