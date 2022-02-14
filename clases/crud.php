<?php

// tambien te estas olvidando que tenes que cambiar el disponible = false en turnos 
// e insertar el id_user

    class crud{
        
        public function agregar($datos){
            $obj=new conectar();
            $conexion=$obj->conexion();

           
            $sql="UPDATE turnos SET user = '$datos[0]'
                  WHERE id_turno = $datos[1]";
        
            return mysqli_query($conexion,$sql);

        }
       
                
        
        public function eliminar($turno){
			$obj= new conectar();
			$conexion=$obj->conexion();

            $sql="UPDATE turnos set user = ' ' where id_turno = '$turno'";
            return mysqli_query($conexion,$sql);
		}
            
 }
        
        

?>