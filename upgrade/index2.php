<?php 
	session_start();

	if(isset($_SESSION['user'])){
        
 
        
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Pedido Ropa de Trabajo</title>
    <?php
    require_once "scripts.php";
    require_once "clases/conexion.php";
    $obj=new conectar();
    $conexion=$obj->conexion();
    
    $username = $_SESSION['user']; 
 //   $sector_login = $_SESSION['sector'];
 
    $sector="select * from usuarios as a
                left join sector as b on a.id_sector = b.id_sector
                where a.user = '$username'";        //colocar la variable USER del login
    $rdos_sector=mysqli_query($conexion,$sector);

    $usuarios="select * from usuarios as a
                left join sector as b on a.id_sector = b.id_sector
                where a.id_sector = (select c.id_sector from usuarios as c
                                    where c.user = '$username')";
    $rdos_user=mysqli_query($conexion,$usuarios);    
            
    $articulos="select * from articulos as a
                left join art_x_sector as b on a.id_articulo = b.id_art
                left JOIN usuarios as c on c.id_sector = b.id_sect
                where c.user = '$username'";
    $rdos_articulos=mysqli_query($conexion,$articulos);
    
            
  
    ?>
 
             
                   
</head>



<body style="background-color: #E1FCFF; margin-top: 50px;">
    

    
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        Pedido Ropa de Trabajo
                        <a href="procesos/salir.php">
                        <button type="button" class="btn btn-danger" style="float: right;">Salir</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Agregar  &nbsp;
                        <span class="fas fa-plus-square"></span>
                        </span>   
                           
                           <div style="float: right;">
                                   <label>Sector: </label>
                                   
                                   <?php while($sect=mysqli_fetch_row($rdos_sector)){ 
                                    ?>
                                    <button type="button" class="btn btn-secondary" disabled><?php echo $sect[9];?></button>
                                    <?php
                                        }
                                    
            if($_SESSION['rol']<3){                                
?>
                                <a class="btn btn-success" style="margin-left: 360px;" href="excel.php" role="button">
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
                        by Luks
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
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
			
			<form id="alta">
                
                <label>Colaborador:</label>

                <select name="colab" id="colab" class="custom-select" style="width: 300px; margin-left: 10px;">
                    <?php while($usu=mysqli_fetch_row($rdos_user)){ 
                    ?>
                    <option value="<?php echo $usu[0];?>"><?php echo $usu[1]. '&nbsp;' .$usu[2];?></option>
                    <?php
                        }
                    ?>    
                </select>                
                
                
                
                <label>Artículo:</label>

                <select name="ropa" id="ropa" class="custom-select" style="width: 300px; margin-top: 5px; margin-left: 43px;">
                  <!--  <option value="0" selected>Seleccione</option>-->
                    <?php while($art=mysqli_fetch_row($rdos_articulos)){ 
                    ?>
                    <option value="<?php echo $art[0];?>"><?php echo $art[2];?></option>
                    <?php
                        }
                    ?>
                </select>
                
                <br>

                <div id="talle">
                </div>                   
                    <div class="form-group row" style="margin-top: 5px; margin-left: 2px;">
                    <lable>Cantidad:</lable>
                    <input type="number" id="cant" name="cant" min="1" max="2" 
                     style="width: 75px; margin-left: 36px" class="form-control">
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
						$('#alta')[0].reset();
						$('#tablaDatatable').load('tabla.php');
                        swal("Excelente!", "Agregado con éxito!", "success");	

					}else{
                        swal("Error!", "No se ha registrado!", "error");

					}
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


<!--ALTAS seleccion de TALLES-->

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ropa').val(1);
            recargarLista();

            $('#ropa').change(function(){
                recargarLista();
            });
        })
    </script>
    <script type="text/javascript">
        function recargarLista(){
            $.ajax({
                type:"POST",
                url:"datos.php",
                data:"id_talle=" + $('#ropa').val(),
                success:function(r){
                    $('#talle').html(r);
                }
            });
        }
    </script>


  
    
<!--Opcion de ELIMINAR-->    
    <script>
        function eliminarDatos(idpedido){
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
                    data:"idpedido=" + idpedido,
                    url:"procesos/eliminar.php",
                    success:function(r){
                        if(r==1){
                            $('#tablaDatatable').load('tabla.php');
                            swal({icon: "success",});
                        }else{
                            swal({icon: "error",});
                        }
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



