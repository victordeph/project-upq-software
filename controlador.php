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
    if (isset($_POST['btnGuardar'])) {
        
        $produ=$_POST['txtproducto'];
        $medi=$_POST['txtmedida'];
        $canti=$_POST['txtcantidad'];
        $compra=$_POST['txtcompra'];
        $mayor=$_POST['txtmayoreo'];
        $menu=$_POST['txtmenudeo'];
        $fecha=$_POST['Fecha'];
        $status= insertarProducto($produ,$medi,$canti,$compra,$mayor,$menu,$fecha);

        if ($status===1) {
            echo '<script> alert("Agregado a la BD");</script>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=ConsultarTodosProductos.php'>";
        }else{
            echo '<script> alert("Error: NO insertado");</script>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ConsultarTodosProductos,php'>";
        }
        
    }

    //INSERT MATERIAL

    if (isset($_POST['MGuardar'])) {
        
        $mate=$_POST['Mmaterial'];
        $marc=$_POST['Mmarca'];
        $cantim=$_POST['Mcantidad'];
        $compram=$_POST['Mcompra'];
        $mayorm=$_POST['Mmayoreo'];
        $menum=$_POST['Mmenudeo'];
        $fecham=$_POST['Fecha'];
        $status= insertarMaterial($mate,$marc,$cantim,$compram,$mayorm,$menum,$fecham);

        if ($status===1) {
            echo '<script> alert("Agregado a la BD");</script>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=ConsultarTodosMateriales.php'>";
        }else{
            echo '<script> alert("Error: NO insertado");</script>';
            echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; ConsultarTodosMateriales.php'>";
        }
        
    }


  //InsertarVentasProMayoreo

  if (isset($_POST['btnVentaProductoMayoreo'])) {
        
    $cliente=$_POST['txtcliente'];
    $producto=$_POST['txtproducto'];
    $cantidad=$_POST['txtcantidad'];
    $mayoreo=$_POST['txtmayoreo'];
    $total=$cantidad*$mayoreo;
    $fecha=$_POST['Fecha'];
    $status= insertarVentaProductoMayoreo($cliente,$producto,$cantidad,$mayoreo,$total,$fecha);

    if ($status===1) {
        echo '<script> alert("Venta agregada a la BD");</script>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=ConsultarVentasMayoreoPro.php'>";
    }else{
        echo '<script> alert("Error: NO insertado");</script>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ConsultarVentasMayoreoPro.php'>";
    }
    
}

//InsertarVentasMatMayoreo

if (isset($_POST['btnVentaMaterialMayoreo'])) {
        
  $cliente=$_POST['txtcliente'];
  $material=$_POST['txtmaterial'];
  $cantidad=$_POST['txtcantidad'];
  $mayoreo=$_POST['txtmayoreo'];
  $total=$cantidad*$mayoreo;
  $fecha=$_POST['Fecha'];
  $status= insertarVentaMaterialesMayoreo($cliente,$material,$cantidad,$mayoreo,$total,$fecha);

  if ($status===1) {
      echo '<script> alert("Venta agregada a la BD");</script>';
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=ConsultarVentasMayoreoMat.php'>";
  }else{
      echo '<script> alert("Error: NO insertado");</script>';
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ConsultarVentasMayoreoMat.php'>";
  }
  
}

//InsertarVentasProMenudeo

if (isset($_POST['btnVentaProductoMenudeo'])) {
        
  $cliente=$_POST['txtcliente'];
  $producto=$_POST['txtproducto'];
  $cantidad=$_POST['txtcantidad'];
  $menudeo=$_POST['txtmenudeo'];
  $total=$cantidad*$menudeo;
  $fecha=$_POST['Fecha'];
  $status= insertarVentaProductoMenudeo($cliente,$producto,$cantidad,$menudeo,$total,$fecha);

  if ($status===1) {
    echo '<script> alert("Venta agregada a la BD");</script>';
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=ConsultarVentasMenudeoPro.php'>";
  }else{
    echo '<script> alert("Error: NO insertado");</script>';
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ConsultarVentasMenudeoPro.php'>";
  }
  
}

//InsertarVentasMatMenudeo

if (isset($_POST['btnVentaMaterialMenudeo'])) {
        
  $cliente=$_POST['txtcliente'];
  $material=$_POST['txtmaterial'];
  $cantidad=$_POST['txtcantidad'];
  $menudeo=$_POST['txtmenudeo'];
  $total=$cantidad*$menudeo;
  $fecha=$_POST['Fecha'];
  $status= insertarVentaMaterialMenudeo($cliente,$material,$cantidad,$menudeo,$total,$fecha);

  if ($status===1) {
      echo '<script> alert("Venta agregado a la BD");</script>';
     echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL=ConsultarVentasMenudeoMat.php'>";
  }else{
      echo '<script> alert("Error: NO insertado");</script>';
      echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; URL=ConsultarVentasMenudeoMat.php'>";
  }
  
}

    if (isset($_POST['Buscar'])) {

      $producto=$_POST['txtproducto'];
      $rsvid= consultaProducto($producto);
      
      echo "<a href=index.html> <h3>Principal</h3> </a>"; //Link para regresar a la pagina principal
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
      </tr>"; //Impresion de emcabezado de la tabla
  while ($fila = mysqli_fetch_array($rsvid)) 
  {
    echo "<tr>
    <td>". $fila[0]."</td>
    <td>". $fila[1]."</td>
    <td>". $fila[2]."</td>
    <td>". $fila[3]."</td>
    <td>". $fila[4]."</td>
    <td>". $fila[5]."</td>
    <td>". $fila[6]."</td>
    <td>". $fila[7]."</td>

    <td> <a href='actualizarProducto.php?id=" . $fila[0]."'> <img src='images/refrescar.png' > </a> </td>
    <td> <a href='eliminarProducto.php?id=" . $fila[0]."'> <img src='images/elim.png' > </a> </td>

    </tr>";
  }
echo "</table>";
    }


    if (isset($_POST['BuscarM'])) {

      $material=$_POST['txtmaterial'];
      $rsvid= consultaMaterial($material);
      
      echo "<a href=index.html> <h3>Principal</h3> </a>"; //Link para regresar a la pagina principal
      echo "<table>
      <tr>
      <th>ID:</th>
      <th>Nombre material:</th>
      <th>Marca:</th>
      <th>Cantidad:</th>
      <th>Precio Compra:</th>
      <th>Precio Mayoreo:</th>
      <th>Precio Menudeo:</th>
      <th>Fecha:</th>
      <th>Actualizar:</th>
      <th>Eliminar:</th>
      </tr>"; //Impresion de emcabezado de la tabla
  while ($fila = mysqli_fetch_array($rsvid)) 
  {
    echo "<tr>
    <td>". $fila[0]."</td>
    <td>". $fila[1]."</td>
    <td>". $fila[2]."</td>
    <td>". $fila[3]."</td>
    <td>". $fila[4]."</td>
    <td>". $fila[5]."</td>
    <td>". $fila[6]."</td>
    <td>". $fila[7]."</td>

    <td> <a href='actualizarMaterial.php?id=" . $fila[0]."'> <img src='images/refrescar.png' > </a> </td>
    <td> <a href='eliminarMaterial.php?id=" . $fila[0]."'> <img src='images/elim.png' > </a> </td>

    </tr>";
  }
echo "</table>";
    }



    if(isset($_POST['btnActuzalizar'])){
      $id= $_POST['txtId'];
      $pro= $_POST['txtproducto'];
      $uni= $_POST['txtmedida'];
      $cant= $_POST['txtcantidad'];
      $prec= $_POST['txtcompra'];
      $prema= $_POST['txtmayoreo'];
      $preme= $_POST['txtmenudeo'];
      $fech= $_POST['Fecha'];
      $statusA= actualizarProducto($pro,$uni, $cant,$prec,$prema,$preme,$fech,$id);

      if($statusA === 1){
          echo '<script> alert("Producto Actualizado"); </script>';
          echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosProductos.php'>";

      } else{
          echo '<script> alert("No Actualizado"); </script>';
          echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosProductos.php'>";
      }
  }


  //Actualizar material
  if(isset($_POST['btnActuzalizarM'])){
    $id= $_POST['txtId'];
    $mate= $_POST['Mmaterial'];
    $marc= $_POST['Mmarca'];
    $canti= $_POST['Mcantidad'];
    $precioc= $_POST['Mcompra'];
    $precioma= $_POST['Mmayoreo'];
    $preciome= $_POST['Mmenudeo'];
    $fecham= $_POST['Fecha'];
    $statusA= actualizarMaterial($mate,$marc, $canti,$precioc,$precioma,$preciome,$fecham,$id);

    if($statusA === 1){
        echo '<script> alert("Material Actualizado"); </script>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosMateriales.php'>";

    } else{
        echo '<script> alert("No Actualizado"); </script>';
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosMateriales.php'>";
    }
}

  if(isset($_POST['btnEliminar'])){
    $id=$_POST['txtId'];
$statusElim=eliminarProducto($id);

if($statusElim){
  echo '<script> alert("Producto Eliminado");</script>';
  echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosProductos.php'>";
}else{
  echo '<script> alert("Error: No se pudo eliminar");</script>';
  echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosProductos.php'>";
}
}

//EliminarMaterial
if(isset($_POST['btnEliminarM'])){
  $id=$_POST['txtId'];
$statusElim=eliminarMaterial($id);

if($statusElim){
echo '<script> alert("Material Eliminado");</script>';
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosMateriales.php'>";
}else{
echo '<script> alert("Error: No se pudo eliminar");</script>';
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0 ;URL= consultarTodosMateriales.php'>";
}
}

  ?>  
</body>
</html>