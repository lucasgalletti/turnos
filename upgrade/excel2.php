<?php
session_start();

header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=pedido_ropa.xls');

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();
$sect=$_SESSION['sect'];

$sql="  SELECT concat(d.nombre, ' ',d.apellido) as Colaborador, 
        d.legajo, b.articulo, c.talle, a.cantidad, e.sector FROM pedidos as a
        LEFT JOIN articulos as b on a.id_articulo = b.id_articulo
        LEFT JOIN talles as c on a.id_talle = c.id_talle
        LEFT JOIN usuarios as d on a.id_usuario = d.id_usuario
        LEFT JOIN sector as e on d.id_sector = e.id_sector
        WHERE e.id_sector = $sect
        ORDER BY d.nombre";

$result=mysqli_query($conexion,$sql);

?>

<table>
    <tr style="border: solid black 1px;">
        <th>Colaborador</th>
        <th>Legajo</th>
        <th>Articulo</th>
        <th>Talle</th>
        <th>Cantidad</th>
        <th>Sector</th>
    </tr>
    
    <?php
        while($fila=mysqli_fetch_row($result)){
    ?>
    
    <tr>
        <td><?php echo $fila[0]?></td>
        <td><?php echo $fila[1]?></td>
        <td><?php echo $fila[2]?></td>
        <td><?php echo $fila[3]?></td>
        <td><?php echo $fila[4]?></td>
        <td><?php echo $fila[5]?></td>
    </tr>

    <?php        
            
        }
    ?>
    
</table>








