<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

		<label for="nombre">Nombre:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Nombre del Producto">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio del Producto">

		<label for="marca">Marca:</label>
		<input class="form-control" name="marca" required type="text" id="marca" placeholder="Marca del Producto">
		
		<label for="Categoria">Categoria:</label>
		<input class="form-control" name="Categoria" required type="text" id="Categoria" placeholder="Categoria del Producto">

		<label for="origen">Origen:</label>
		<input class="form-control" name="origen" required type="text" id="origen" placeholder="Origen del Producto">

		<label for="descripcion">Descripcion:</label>
		<input class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Descripcion del Producto">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Numero de Productos en existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>