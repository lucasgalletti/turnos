<!DOCTYPE html>
<html>
<head>
	<title>SGRT</title>
	<link rel="SHORTCUT ICON" href="img/icono.png">

	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="card card-primary">
				<div class="card card-header" style="text-align:center;">Reserva Turno Comedor</div>
				<div class="card card-body">
					<div style="text-align: center;">
						<img src="img/photo1.png" height="200">
					</div>
					
					<label>Usuario</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<label>Password</label>
					<input type="password" id="password" class="form-control input-sm" name="">
                    <br>
                    <div style="text-align: center; ">
                    <button class="btn btn-primary" id="entrarSistema" style="width: 100px;">Entrar</button>
                    <br>
                    <br>
                    </div>

				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<!--funcion al presionar enter-->

<script>
    $("#password").keyup(function(event) {
        if (event.keyCode === 13) {
            $("#entrarSistema").click();
        }
    });
</script>

<!-- Validacion de login -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"procesos/ingreso.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="index.php";
                            
                            }else{
								alertify.alert("Fallo al entrar :(");
							}
						}
					});
		});	
	});
</script>