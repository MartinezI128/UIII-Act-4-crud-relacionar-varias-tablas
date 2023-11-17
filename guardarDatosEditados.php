<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["nombre"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["marca"]) || 
	!isset($_POST["Categoria"]) || 
	!isset($_POST["origen"]) || 
	!isset($_POST["descripcion"]) ||
	!isset($_POST["existencia"]) ||  
	!isset($_POST["idProducto"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$idProducto = $_POST["idProducto"];
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$marca = $_POST["marca"];
$Categoria = $_POST["Categoria"];
$origen = $_POST["origen"];
$descripcion = $_POST["descripcion"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("UPDATE tbl_productos SET codigo = ?, nombre = ?, precio = ?, marca = ?, Categoria = ?, origen = ?, descripcion = ?, existencia = ? WHERE idProducto = ?;");
$resultado = $sentencia->execute([$codigo, $nombre, $precio, $marca, $Categoria, $origen, $descripcion, $existencia, $idProducto]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>