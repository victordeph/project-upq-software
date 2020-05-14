<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Controlador</title>
    <link rel="stylesheet" href="css/estilos.css">
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

tr:nth-child(even) {background-color: ;}
</style>
</head>
<body>
<center>
      <form action="controlador.php" method="post">
                            <input type="text" name="txtmaterial" id="txtmaterial" class="camposDatos" placeholder="Buscar material">
                            <p class="centrarContenido"> <input type="submit" name="BuscarM" value="Buscar" class="btnBuscar"></p>
                        </form>
      </center>

  <?php
require 'funcionesBD.php';

    $rsCT = consultaTodoM (); //se hace la consulta y se guarda en $rsCT
    
    echo "<a href=index.html> <h3>Principal</h3> </a>";
    echo "<table>
    <tr>
        <th>ID:</th>
        <th>Nombre Material:</th>
        <th>Marca:</th>
        <th>Cantidad:</th>
        <th>Precio Compra:</th>
        <th>Precio Mayoreo:</th>
        <th>Precio Menudeo:</th>
        <th>Fecha:</th>
        <th>Actualizar:</th>
        <th>Eliminar:</th>
        <th>Compra Mayoreo:</th>
        <th>Compra Menudeo:</th>
    </tr>"; //Impresion de emcabezado de la tabla
while ($arrFilas = mysqli_fetch_array($rsCT)) //Convertimos 
{
  echo "<tr>
  <td>". $arrFilas['idmaterial']."</td>
  <td>". $arrFilas['material']."</td>
  <td>". $arrFilas['marca']."</td>
  <td>". $arrFilas['cantidadm']."</td>
  <td>". $arrFilas['preciocompram']."</td>
  <td>". $arrFilas['preciomayoreom']."</td>
  <td>". $arrFilas['preciomenudeom']."</td>
  <td>". $arrFilas['fecham']."</td>

  <td> <a href='actualizarMaterial.php?id=" . $arrFilas['idmaterial']."'> <img src='images/refrescar.png' > </a> </td>
  <td> <a href='eliminarMaterial.php?id=" . $arrFilas['idmaterial']."'> <img src='images/elim.png' > </a> </td>
  <td> <a href='VentaMaterialesMayoreo.php?id=" . $arrFilas['idmaterial']."'> <img src='images/carrito.png' > </a> </td>
  <td> <a href='VentaMaterialesMenudeo.php?id=" . $arrFilas['idmaterial']."'> <img src='images/carrito.png' > </a> </td>
  </tr>";
  
}

 
 

echo "</table>";
  

  ?>  
  </body>
  </html>