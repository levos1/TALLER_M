<?php

  require_once 'login.php';
  $conn = new mysqli($hn,$un,$pw,$db);
  if($conn->connect_error) die("FATAL ERROR");

  if(isset($_POST['nombre']) && // confirma que todos los espacios del form estén definidas y no sean nulas
    isset($_POST['url']) &&
    isset($_POST['fechaC']) &&
    isset($_POST['fechaA']))
    {
       
       $nombre = get_post($conn, 'nombre');
       $url = get_post($conn, 'url');
       $fechaC = get_post($conn, 'fechaC');
       $fechaA = get_post($conn, 'fechaA');

       $query = "INSERT INTO classics VALUES" . "('$nombre','$url','$fechaC','$fechaA')"; // se usan dichas variables para insertar valores a la tabla por medio de esta query
       $result = $conn->query($query);
       if(!$result) echo "INSERT failed <br><br>";
    }

    echo <<<_END
    <form action="formulario.php" method="post"><pre>
     Nombre: <input type="text" name="nombre">
     URL: <input type="text" name="url">
     Fecha Creación: <input type="hidden" name ="fechaC">
     Fecha actualización: <input type="hidden" name ="fechaA">
        <input type="submit" value="Agregar Apunte">
    </pre></form>
   _END;


   function get_post($conn, $var) // pasa la variable $conn para poder usar la función real_escape_string que sirve para filtrar un input malicioso.
          {
              return $conn->real_escape_string($_POST[$var]);// la variable $var trae el nombre , sumado al array $POST buscará el valor del arreglo asociativo( por que eso es) con dicho nombre
          }
?>