<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'bd_web');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
     echo "Conexion realizada correctamente";
     
     $nombre = $_POST["nombre"];
     $email = $_POST["email"];
     $mensaje = $_POST["mensaje"];
     
     echo "<h2>Detalles del formulario de contacto:</h2>";
     echo "<p><strong>Nombre:</strong> $nombre</p>";
     echo "<p><strong>Email:</strong> $email</p>";
     echo "<p><strong>Mensaje:</strong> $mensaje</p>";


     $sql = "INSERT INTO tabla_01_contacto 
     (tabla01_nombre, tabla01_email,tabla01_mensaje) 
     VALUES ('$nombre', '$email', '$mensaje')";

     if (mysqli_query($scon, $sql)) {
     echo "INSERTADO CORRECTAMENTE";
     } else {
     echo "Error en la inserción: " . mysqli_error($scon);
     }

     mysqli_close($scon);


     echo "<p><a href='lista_contactos.php'> Ver Lista Contactos </a></p> ";

?>