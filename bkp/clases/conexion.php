

<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('127.0.0.1','root','Asof2020','turnos_comedor1',3306);
			return $conexion;
		}
	}
 ?>