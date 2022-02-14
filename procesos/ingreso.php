<?php 


	session_start();
	require_once "../clases/conexion.php";

    $obj=new conectar();
    $conexion=$obj->conexion();


		$usuario=$_POST['usuario'];
		$pass=$_POST['password'];

		$sql="SELECT * from usuarios where user='$usuario' and pass='$pass'";
		$result=mysqli_query($conexion,$sql);

        
		if(mysqli_num_rows($result) > 0){
			$_SESSION['user']=$usuario;
			echo 1;
		}else{
			echo 0;
		}
 


?>