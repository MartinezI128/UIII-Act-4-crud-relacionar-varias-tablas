<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["nombre"]) || !isset($_POST["precio"]) || !isset($_POST["marca"]) || !isset($_POST["Categoria"]) || !isset($_POST["origen"]) || !isset($_POST["descripcion"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$marca = $_POST["marca"];
$Categoria = $_POST["Categoria"];
$origen = $_POST["origen"];
$descripcion = $_POST["descripcion"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_productos(codigo, nombre, precio, marca, Categoria, origen, descripcion, existencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $nombre, $precio, $marca, $Categoria, $origen, $descripcion, $existencia]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>