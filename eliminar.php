<?php
if(!isset($_GET["id"])) exit();
$idProducto = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM tbl_productos WHERE idProducto = ?;");
$resultado = $sentencia->execute([$idProducto]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>