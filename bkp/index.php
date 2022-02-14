<?php 
	session_start();

	if(isset($_SESSION['user'])){
        
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>SGRT</title>
	<link rel="SHORTCUT ICON" href="img/icono.png">
    
    <!-- Conexion a la BD -->
    <?php
    require_once "scripts.php";
    require_once "clases/conexion.php";
    $obj=new conectar();
    $conexion=$obj->conexion();

    /**Guardo los turnos disponibles */
    $turno="select * from turnos2 
    where user is null";
    $rdos_turnos=mysqli_query($conexion,$turno);

    /**Guardo el usuario */
    $username = $_SESSION['user']; 
           
  
    ?>
 
 
                   
</head>



<body style="background-color: #E1FCFF; margin-top: 50px;">
    

    
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <!-- No se modifica nada -->
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
                           
                           <div style="float: right;">
         <?php
                                                                            
            if($username == 'fmuzio'){                                
        ?>
                                <a class="btn btn-success" style="margin-left: 360px;" href="excel_ropa.php" role="button">
                                <i class="far fa-file-excel"></i>
                                Descargar</a>

         <?php
            }elseif($username == 'itoledo'){
        ?>    
                                <a class="btn btn-success" style="margin-left: 360px;" href="excel_zapatos.php" role="button">
                                <i class="far fa-file-excel"></i>
                                Descargar</a>
        <?php    
            }else{
            
        ?>
                                <a class="btn btn-success" style="margin-left: 360px;" href="excel2.php" role="button">
                                <i class="far fa-file-excel"></i>
                                Descargar</a>           
        <?php    
                }
                
        ?>      

                           </div>


                        <hr>

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
                    <label>Turno</label>
                    <!-- de aca saco el id del turno y el turno -->
                    <select name="turno" id="turno" class="custom-select" style="width: 300px; margin-left: 21px;">
                        <?php while($tur=mysqli_fetch_row($rdos_turnos)){ 
                        ?>
                        <option value="<?php echo $tur[0];?>"><?php echo $tur[1];?></option>
                        <?php

                        }
                        ?> 
                        
                    </select>                
                </div>
                    <!-- </select> -->
                    <div>

                    </div>
                <div style="display: none">
                <label>User</label>

                    <select name="user" id="user" class="custom-select" style="width: 300px; margin-left: 21px;">

                        <option value="<?php echo $username;?>"></option>
                        
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
          /* alertify.confirm('Eliminar Registro', '¿Seguro que desea eliminar este registro?',  function(){*/
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



