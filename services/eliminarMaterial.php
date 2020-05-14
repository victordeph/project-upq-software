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
        $consId = consultarIdM($_REQUEST['id']);
        $arrAct = mysqli_fetch_array($consId);
    ?>
    
    <form action="controlador.php" method="post" onsubmit="return vacios()">
        <div class="container">
			<div id="div1" class="form-group">
			<p>
                <h2>Actualizar</h2>
			</p>
			
                <br/>
                <input type="hidden" name = "txtId" value = "<?php echo $arrAct['idmaterial']; ?>">
                <label>Nombre del material: </label>
				<input type="text" name="Mmaterial" id="Mmaterial" class="form-control" placeholder="Introduce Nombre" value = "<?php echo $arrAct['material']; ?>"/><br>
				<label>Marca: </label>
				<input type="text" name="Mmarca" id="Mmarca" class="form-control" placeholder="Introduce Nombre" value = "<?php echo $arrAct['marca']; ?>"/><br>
				<label>Cantidad: </label>
				<input type="number" name="Mcantidad" id="Mcantidad" class="form-control" placeholder="Introduce Cantidad" value = "<?php echo $arrAct['cantidadm']; ?>"/><br>
				<label>Precio de Compra: </label>
				<input type="number" name="Mcompra" id="Mcompra" class="form-control" placeholder="Introduce Precio Compra" value = "<?php echo $arrAct['preciocompram']; ?>"/><br>
				<label>Precio Mayoreo: </label>
				<input type="number" name="Mmayoreo" id="Mmayoreo" class="form-control" placeholder="Introduce Precio Mayoreo" value = "<?php echo $arrAct['preciomayoreom']; ?>"/><br>
				<label>Precio Menudeo</label>
				<input type="number" name="Mmenudeo" id="Mmenudeo" class="form-control" placeholder="Introduce Precio Menudeo" value = "<?php echo $arrAct['preciomenudeom']; ?>"/><br>

				<div class="bootstrap-iso">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<!-- Date input -->
									<label class="control-label" for="Fecha">Fecha</label>
									<input class="form-control" id="Fecha" name="Fecha" placeholder="MM-DD-YYYY"
										type="text" value = "<?php echo $arrAct['fecham']; ?>"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="submit" value="Eliminar" id="btnEliminarM" class="btn btn-success" name="btnEliminarM"/>
			</div>
    </form>

</body>

</html>