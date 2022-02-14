<?php
session_start();

header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=reserva_turnos_comedor.xls');

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$username = $_SESSION['user'];


$sql=   "SELECT a.dia, a.hora, a.posicion, concat(b.nombre, ' ', b.apellido) as Colaborador 
         FROM turnos_comedor.turnos as a
         LEFT JOIN turnos_comedor.usuarios as b on b.user = a.user
         WHERE b.id_sector = (select c.id_sector from turnos_comedor.usuarios as c where c.user = '$username')";

$result=mysqli_query($conexion,$sql);

?>

<table style="border: solid black 1px;">
    <tr>
        <th style="background-color: #B8B8B8;">Dia</th>
        <th style="background-color: #B8B8B8;">Hora</th>
        <th style="background-color: #B8B8B8;">Posicion</th>
        <th style="background-color: #B8B8B8;">Colaborador</th>
    </tr>
    
    <?php
        while($fila=mysqli_fetch_row($result)){
    ?>
    
    <tr>
        <td style="background-color: #70A2FF; color: #FFFFFF;"><?php echo $fila[0];?></td>
        <td style="background-color: #FFFFFF; color: #000000;"><?php echo (string)$fila[1];?></td>
        <td style="background-color: #70A2FF; color: #FFFFFF;"><?php echo $fila[2];?></td>
        <td style="background-color: #FFFFFF; color: #000000;"><?php echo $fila[3];?></td>
    </tr>

    <?php        
            
        }
    ?>
    
</table>








