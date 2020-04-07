<!DOCTYPE html>
<html lang="en" >
    <head>
   
    
		<meta charset="utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript"
			src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="icon" href="data:;base64,iVBORw0KGgo=">
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
		<link rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
			<link rel="stylesheet" href="css/estilos.css">
		<script>
			$(document).ready(function () {
				var date_input = $('input[name="Fecha"]'); //our date input has the name "date"
				var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
				var options = {
					format: 'yyyy-mm-dd',
					container: container,
					todayHighlight: true,
					autoclose: true,
				};
				date_input.datepicker(options);
			})
		</script>

    </head>
  
<body>

<?php
        require 'funcionesBD.php';
        $consId = consultarId($_REQUEST['id']);
        $arrAct = mysqli_fetch_array($consId);
    ?>
    
    <form action="controlador.php" method="post" onsubmit="return vacios()" >
        <div class="container">
			<div id="div1" class="form-group">
			<p>
                <h2>Realizar Venta Producto Mayoreo</h2>
			</p>
			
                <br/>
                <label>Cliente: </label>
				<input type="text" name="txtcliente" id="txtcliente" class="form-control" placeholder="Introduce Cliente" /><br>
                <label>Descripcion: </label>
				<input type="text" name="txtproducto" id="txtproducto" class="form-control" placeholder="Introduce Nombre" value = "<?php echo $arrAct['producto']; ?>" /><br>
				<label>Cantidad: </label>
				<input type="number" name="txtcantidad" id="txtcantidad" class="form-control" placeholder="Introduce Cantidad" /><br>
				<label>Precio Mayoreo: </label>
				<input type="number" name="txtmayoreo" id="txtmayoreo" class="form-control" value = "<?php echo $arrAct['preciomayoreo']; ?>"/><br>
                
				<div class="bootstrap-iso">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<!-- Date input -->
									<label class="control-label" for="Fecha">Fecha</label>
									<input class="form-control" id="Fecha" name="Fecha" placeholder="MM-DD-YYYY"
										type="text" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="submit" value="Realizar Venta" id="btnVentaProductoMayoreo" class="btn btn-success" name="btnVentaProductoMayoreo"/>
			</div>
    </form>

</body>

</html>