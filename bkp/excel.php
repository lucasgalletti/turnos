<?php

header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=pedido_ropa.xls');

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();


$sql="  SELECT concat(d.nombre, ' ',d.apellido) as Colaborador, 
        d.legajo, b.articulo, c.talle, a.cantidad, e.sector, e.subsector, d.ccosto FROM pedidos as a
        LEFT JOIN articulos as b on a.id_articulo = b.id_articulo
        LEFT JOIN talles as c on a.id_talle = c.id_talle
        LEFT JOIN usuarios as d on a.id_usuario = d.id_usuario
        LEFT JOIN sector as e on d.id_sector = e.id_sector
        ORDER BY d.legajo";

$result=mysqli_query($conexion,$sql);

?>

<table style="border: solid black 1px;">
    <tr>
        <th style="background-color: #B8B8B8;">Colaborador</th>
        <th style="background-color: #B8B8B8;">Legajo</th>
        <th style="background-color: #B8B8B8;">Articulo</th>
        <th style="background-color: #B8B8B8;">Talle</th>
        <th style="background-color: #B8B8B8;">Cantidad</th>
        <th style="background-color: #B8B8B8;">Sector</th>
        <th style="background-color: #B8B8B8;">Sub Area</th>
        <th style="background-color: #B8B8B8;">Centro de Costo</th>
    </tr>
    
    <?php
        while($fila=mysqli_fetch_row($result)){
    ?>
    
    <tr>
        <td style="background-color: #70A2FF; color: #FFFFFF;"><?php echo $fila[0]?></td>
        <td style="background-color: #FFFFFF; color: #000000;"><?php echo $fila[1]?></td>
        <td style="background-color: #70A2FF; color: #FFFFFF;"><?php echo $fila[2]?></td>
        <td style="background-color: #FFFFFF; color: #000000; text-align: center;"><?php echo $fila[3]?></td>
        <td style="background-color: #70A2FF; color: #FFFFFF;"><?php echo $fila[4]?></td>
        <td style="background-color: #FFFFFF; color: #000000;"><?php echo $fila[5]?></td>
        <td style="background-color: #70A2FF; color: #FFFFFF;"><?php echo $fila[6]?></td>
        <td style="background-color: #FFFFFF; color: #000000;"><?php echo $fila[7]?></td>
    </tr>

    <?php        
            
        }
    ?>
    
</table>








