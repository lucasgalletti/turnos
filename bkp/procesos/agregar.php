<?php

    require_once "../clases/conexion.php";
    require_once "../clases/crud.php";
    $obj=new crud();

    
    $datos=array(
            $_POST['turno'],    //datos[0] id del turno
            $_POST['user']);    //datos[1] user
echo $obj->agregar($datos);


?>