<?php

header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=pedido_zapatos.xls');

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();


$sql="  SELECT concat(d.nombre, ' ',d.apellido) as Colaborador, 
        d.legajo, b.articulo, c.talle, a.cantidad, e.sector, e.subsector, d.ccosto FROM pedidos as a
        LEFT JOIN articulos as b on a.id_articulo = b.id_articulo
        LEFT JOIN talles as c on a.id_talle = c.id_talle
        LEFT JOIN usuarios as d on a.id_usuario = d.id_usuario
        LEFT JOIN sector as e on d.id_sector = e.id_sector
        WHERE b.id_articulo BETWEEN 12 and 14
        ORDER BY e.id_sector";

$result=mysqli_query($conexion,$sql);

$sql2=" SELECT b.articulo, c.talle, sum(a.cantidad) as Cantidad
		FROM pedidos as a
        LEFT JOIN articulos as b on b.id_articulo = a.id_articulo
        LEFT JOIN talles as c on c.id_talle = a.id_talle
        WHERE b.id_articulo BETWEEN 12 and 14
        GROUP BY a.id_articulo, a.id_talle";

$total=mysqli_query($conexion,$sql2);

?>

<table style="border: solid black 1px;">

    <caption>Resumen por Articulo y Talle</caption>

    <tr>
        <th style="background-color: #B8B8B8;">Articulo</th>
        <th style="background-color: #B8B8B8;">Talle</th>
        <th style="background-color: #B8B8B8;">Cantidad Total</th>
    </tr>   
    <?php
        while($resu=mysqli_fetch_row($total)){
    ?>
    
    <tr>
        <td style="background-color: #FF9F32; color: #FFFFFF;"><?php echo $resu[0]?></td>
        <td style="background-color: #FFFFFF; color: #000000;"><?php echo $resu[1]?></td>
        <td style="background-color: #FF9F32; color: #FFFFFF;"><?php echo $resu[2]?></td>
   </tr>

    <?php        
            
        }

    ?>
    
</table>
<table>
    <tr></tr>
    <tr></tr>
    <tr></tr>
</table>

<table style="border: solid black 1px;">
   
   <caption>Pedidos de Zapatos en Detalle</caption>

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










