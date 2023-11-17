<?php
if(!isset($_GET["id"])) exit();
$idProducto = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_productos WHERE idProducto = ?;");
$sentencia->execute([$idProducto]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->idProducto; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="idProducto" value="<?php echo $producto->idProducto; ?>">
	
			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

			<label for="nombre">Nombre:</label>
			<input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Nombre del Producto">

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio del Producto">

			<label for="marca">Marca:</label>
			<input value="<?php echo $producto->marca ?>" class="form-control" name="marca" required type="text" id="marca" placeholder="Marca del Producto">
			
			<label for="Categoria">Categoria:</label>
			<input value="<?php echo $producto->Categoria ?>" class="form-control" name="Categoria" required type="text" id="Categoria" placeholder="Categoria del Producto">

			<label for="origen">Origen:</label>
			<input value="<?php echo $producto->origen ?>" class="form-control" name="origen" required type="text" id="origen" placeholder="Origen del Producto">

			<label for="descripcion">Descripcion:</label>
			<input value="<?php echo $producto->descripcion ?>" class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Descripcion del Producto">
			
			<label for="existencia">Existencia:</label>
			<input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Numero de Productos en existencia">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
