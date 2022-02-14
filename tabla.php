
<?php
session_start();

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$username = $_SESSION['user'];

$sql="select a.dia, a.hora, a.posicion, concat(b.nombre, ' ', b.apellido) as Colaborador, 
a.id_turno from turnos_comedor.turnos as a
left join turnos_comedor.usuarios as b on b.user = a.user
where b.id_sector = (select c.id_sector from turnos_comedor.usuarios as c where c.user = '$username') ";
                             
$result=mysqli_query($conexion,$sql);

?>

   
   <div>
    <table class="table table-hover table-condensed" id="iddatatable">
        <thead style="background-color: #dc3545; color: white; font-weight: bold;">
            <tr>
                <td>Día</td>
                <td>Hora</td>
                <td>Posición</td>
                <td>Colaborador</td>
                <td style="text-align:center;">Eliminar</td>
            </tr>
        </thead>
        <tbody>
          <?php
            
            while ($mostrar=mysqli_fetch_row($result)){
                    
            ?>
           <tr>
              
                <td><?php echo $mostrar[0]?></td> 
                <td><?php echo $mostrar[1]?></td>
                <td><?php echo $mostrar[2]?></td>
                <td><?php echo utf8_encode($mostrar[3])?></td>
                <td style="text-align:center;">
                   <button type="button" class="btn btn-warning btn-sm" onclick="eliminarDatos('<?php echo $mostrar[4]?>')">
                       <span class="fas fa-trash-alt"></span>
                   </button> 
                </td>
            </tr>
            <?php
            
            }
            
            ?>
        </tbody>
    </table>
</div>

        <script>
            $(document).ready( function () {
                $('#iddatatable').DataTable();
            } );
        </script>
