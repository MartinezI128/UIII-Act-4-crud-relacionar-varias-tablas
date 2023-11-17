<?php include_once "encabezado.php"; ?>
<?php
include_once "base_de_datos.php";

$sentencia = $base_de_datos->query("SELECT tbl_ventas.total, tbl_ventas.fecha, tbl_ventas.id_venta,
GROUP_CONCAT(
    CONCAT(tbl_productos.codigo, '..', tbl_productos.nombre, '..', tbl_productos_vendidos.NoProductos) 
    SEPARATOR '__'
) AS productos
FROM tbl_ventas 
INNER JOIN tbl_productos_vendidos ON tbl_productos_vendidos.id_venta = tbl_ventas.id_venta 
INNER JOIN tbl_productos ON tbl_productos.idProducto = tbl_productos_vendidos.id_producto 
GROUP BY tbl_ventas.id_venta, tbl_ventas.total, tbl_ventas.fecha
ORDER BY tbl_ventas.id_venta;");

$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="col-xs-12">
    <h1>Ventas</h1>
    <div>
        <a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Número</th>
                <th>Fecha</th>
                <th>Productos vendidos</th>
                <th>Total</th>
                <th>Ticket</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ventas as $venta){ ?>
            <tr>
                <td><?php echo $venta->id_venta ?></td>
                <td><?php echo $venta->fecha ?></td>
                <td>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>NoProductos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
                                $producto = explode("..", $productosConcatenados);
                            ?>
                            <tr>
                                <td><?php echo $producto[0] ?></td>
                                <td><?php echo $producto[1] ?></td>
                                <td><?php echo $producto[2] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </td>
                <td><?php echo $venta->total ?></td>
                <td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id_venta?>"><i class="fa fa-print"></i></a></td>
                <td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id_venta?>"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include_once "pie.php"; ?>
