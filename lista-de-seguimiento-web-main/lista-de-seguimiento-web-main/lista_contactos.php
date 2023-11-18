<html lang="es">
<head>
<title>Lista de Contactos</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table, th, td {
    border: 1px solid #ccc;
  }

  th, td {
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: #007bff;
    color: #fff;
  }

  .actions {
    text-align: center;
  }

  .add-button {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
  }

  .add-button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
<div class="container">
  <h2>Lista de Contactos</h2>
  <table border="1">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Mensaje</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $scon = mysqli_connect('localhost', 'root', '', 'bd_web');

      if (!$scon) {
          die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT tabla01_nombre, tabla01_email, tabla01_mensaje FROM tabla_01_contacto";

      $result = mysqli_query($scon, $sql);

     
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
              echo "<tr>";
                echo "<td>" . $row["tabla01_nombre"] . "</td>";
                echo "<td>" . $row["tabla01_email"] . "</td>";
                echo "<td>" . $row["tabla01_mensaje"] . "</td>";
                echo '<td class="actions"><a href="#">Editar</a> | <a href="#">Eliminar</a></td>';
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='3'>No hay contactos disponibles.</td></tr>";
      }

      mysqli_close($scon);
      ?>
    </tbody>
  </table>
  <a class="add-button" href="#">Agregar Nuevo Contacto</a>
</div>
</body>
</html>
