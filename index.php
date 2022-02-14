<?php 
	session_start();

	if(isset($_SESSION['user'])){
        
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Reserva Comedor</title>
	<link rel="SHORTCUT ICON" href="img/icono.png">
    
    <!-- Conexion a la BD -->
    <?php
    require_once "scripts.php";
    require_once "clases/conexion.php";
    $obj=new conectar();
    $conexion=$obj->conexion();

    /**Guardo los turnos disponibles */
    $turno="select * from turnos 
    where user = ' '";
    $rdos_turnos=mysqli_query($conexion,$turno);



    /**Guardo el usuario */
    $username = $_SESSION['user']; 
           
    /**Guardo todos los usuarios por sector */
    $usuarios="select * from usuarios as a
    left join sectores as b on a.id_sector = b.id_sector
    where a.id_sector = (select c.id_sector from usuarios as c
                        where c.user = '$username')
                        order by a.nombre";
    $rdos_user=mysqli_query($conexion,$usuarios);


    ?>
 
 
                   
</head>



<body style="background-color: #E1FCFF; margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        Reserva Turno Comedor
                        <a href="procesos/salir.php">
                        <button type="button" class="btn btn-danger" style="float: right;">Salir</button>
                        </a>
                    </div>
                    <!-- Botón Agregar -->
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Reservar  &nbsp;
                        <span class="fas fa-plus-square"></span>
                        </span>   
                    <!-- Excel -->
                           <div style="float: right;">
        
                           <a class="btn btn-success" style="margin-left: 360px;" href="excel.php" role="button">
                            <i class="far fa-file-excel"></i>
                                Descargar</a>
                           </div>
                        <hr>
                    <!-- Tabla Resultados -->
                        <div id="tablaDatatable">

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        by LG
                    </div>
                </div>
            </div>
        </div>
    </div>

    


<!-- Modal Agregar-->
<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reservar Nuevo Turno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
			
			<form id="alta">
                <div>
                    <!-- datos[0] = id del colaborador-->
                    <label>Colaborador:</label>
                        <select name="colab" id="colab" class="custom-select" style="width: 350px; margin-left: 10px;">
                            <?php while($usu=mysqli_fetch_row($rdos_user)){ 
                            ?>
                            <option value="<?php echo $usu[6];?>"><?php echo utf8_encode($usu[1]). '&nbsp;' 
                            .utf8_encode($usu[2]);?></option>
                            <?php
                                }
                            ?>    
                        </select>
                    <!-- datos[1] = id del turno     -->
                    <label>Turno</label>
                    <!-- de aca saco el id del turno y el turno -->
                        <select name="turno" id="turno" class="custom-select" style="width: 200px; margin-left: 60px; 
                        margin-top: 10px;">
                            <?php while($tur=mysqli_fetch_row($rdos_turnos)){ 
                            ?>
                            <option value="<?php echo $tur[0];?>"><?php echo $tur[1]. '&nbsp;' .$tur[2]. 
                            '&nbsp;' .$tur[3];?></option>
                            <?php

                            }
                            ?> 
                            
                        </select>                
                </div>
           
            </form>

            </div>
           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btnAgregarnuevo" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>

</div>  


    
</body>
</html>

<!-- Opcion Agregar -->

<script type="text/javascript">
	$(document).ready(function(){
        $('#btnAgregarnuevo').click(function(){
			datos=$('#alta').serialize();
            
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
                        $('#tablaDatatable').load('tabla.php');
                        // swal("Excelente!", "Agregado con éxito!", "success");
					}else{
                        swal("Error!", "Contacte a help!", "error");
					}
                    location.reload();
				}
                
			});
            
		});

    });

</script>
  
   <script type="text/javascript">
    $(document).ready(function(){
        $('#tablaDatatable').load('tabla.php');
    });
   </script>


  
    
<!--Opcion de ELIMINAR-->    
    <script>
        function eliminarDatos(turno){
            swal({
                title: "Eliminar Registro",
                text: "¿Seguro que desea eliminar este registro?",
                icon: "warning",
                buttons:true,
                dangerMode:true,
                
            })
            .then((willDelete) =>{
                if(willDelete) {
                $.ajax({
                    type:"POST",
                    data:"turno=" + turno,
                    url:"procesos/eliminar.php",
                    success:function(r){
                        if(r==1){
                            $('#tablaDatatable').load('tabla.php');
                            // swal({icon: "success",});
                        }else{
                            swal({icon: "error",});
                        }
                        location.reload();
                    }
                });
		}
	

		});
	}
       
        
    </script>   
       
<?php

        
} else {
	header("location:login.php");
	}
 ?>



