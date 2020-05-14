<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Controlador</title>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  font-family: open sans;
  text-align: center;
  padding: 8px;
}

h3{
  font-family: open sans;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
  <?php
require 'funcionesBD.php';

    $rsCT = consultaVentasMayoreoMat (); //se hace la consulta y se guarda en $rsCT
    
    echo "<a href=index.html> <h3>Principal</h3> </a>";
    echo "<table>
    <tr>
        <th>ID:</th>
        <th>Cliente:</th>
        <th>Descripcion:</th>
        <th>Cantidad:</th>
        <th>Precio unitario:</th>
        <th>Total:</th>
        <th>Fecha:</th>
        <th>Imprimir Ticket:</th>
        
    </tr>"; //Impresion de emcabezado de la tabla
while ($arrFilas = mysqli_fetch_array($rsCT)) //Convertimos 
{
  echo "<tr>
  <td>". $arrFilas['id_producto_may']."</td>
  <td>". $arrFilas['cliente']."</td>
  <td>". $arrFilas['materialmay']."</td>
  <td>". $arrFilas['cantidadmay']."</td>
  <td>". $arrFilas['preciomay']."</td>
  <td>". $arrFilas['totalmay']."</td>
  <td>". $arrFilas['fechamay']."</td>

  <td> <a href='actualizarMaterial.php?id=" . $arrFilas['id_producto_may']."'> <img src='images/print.png' > </a> </td>
  </tr>";
}
echo "</table>";
  

  ?>  
  </body>
  </html>