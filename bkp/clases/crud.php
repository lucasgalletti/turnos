<?php

// tambien te estas olvidando que tenes que cambiar el disponible = false en turnos 
// e insertar el id_user

    class crud{
        
        public function agregar($datos){
            $obj=new conectar();
            $conexion=$obj->conexion();

           
            $sql="UPDATE turnos2 SET user = '$datos[1]'
                  WHERE id_turno = $datos[0]";
        
            return mysqli_query($conexion,$sql);

        }
       
                
        
        public function eliminar($turno){
			$obj= new conectar();
			$conexion=$obj->conexion();

			// $sql="DELETE from pedidos where id_pedido='$idpedido'";
			// return mysqli_query($conexion,$sql);
            $sql="UPDATE turnos2 set user = null where turno = '$turno'";
            return mysqli_query($conexion,$sql);
		}
            
 }
        
        

?>