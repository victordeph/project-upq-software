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
      <center>
      <form action="controlador.php" method="post">
                            <input type="text" name="txtproducto" id="txtproducto" class="camposDatos" placeholder="Buscar producto">
                            <p class="centrarContenido"> <input type="submit" name="Buscar" value="Buscar" class="btnBuscar"></p>
                        </form>
      </center>
                        
                    
  <?php
require 'funcionesBD.php';

    $rsCT = consultaTodo (); //se hace la consulta y se guarda en $rsCT
    
    echo "<a href=index.html> <h3>Principal</h3> </a>";
    echo "<table>
    <tr>
        <th>ID:</th>
        <th>Nombre Producto:</th>
        <th>Unidad de medida:</th>
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
  <td>". $arrFilas['idproducto']."</td>
  <td>". $arrFilas['producto']."</td>
  <td>". $arrFilas['unidad']."</td>
  <td>". $arrFilas['cantidad']."</td>
  <td>". $arrFilas['preciocompra']."</td>
  <td>". $arrFilas['preciomayoreo']."</td>
  <td>". $arrFilas['preciomenudeo']."</td>
  <td>". $arrFilas['fecha']."</td>

  <td> <a href='actualizarProducto.php?id=" . $arrFilas['idproducto']."'> <img src='images/refrescar.png' > </a> </td>
  <td> <a href='eliminarProducto.php?id=" . $arrFilas['idproducto']."'> <img src='images/elim.png' > </a> </td>
  <td> <a href='VentaProductoMayoreo.php?id=" . $arrFilas['idproducto']."'> <img src='images/carrito.png' > </a> </td>
  <td> <a href='VentaProductoMenudeo.php?id=" . $arrFilas['idproducto']."'> <img src='images/carrito.png' > </a> </td>
  </tr>";
}
echo "</table>";
  

  ?>  
  </body>
  </html>