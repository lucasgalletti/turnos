
<?php
session_start();

require_once "clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$username = $_SESSION['user'];

$sql="select turno, disponible from turnos_comedor1.turnos2 
where user = '$username'";

                             
$result=mysqli_query($conexion,$sql);

?>

   
   <div>
    <table class="table table-hover table-condensed" id="iddatatable">
        <thead style="background-color: #dc3545; color: white; font-weight: bold;">
            <tr>
                <td>Turno y Lugar</td>    
                <td>Reservado</td>
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
                <td style="text-align:center;">
                   <button type="button" class="btn btn-warning btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0]?>')">
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
