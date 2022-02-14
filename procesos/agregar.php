<?php

    require_once "../clases/conexion.php";
    require_once "../clases/crud.php";
    $obj=new crud();

    
    $datos=array(
            $_POST['colab'],    //datos[0] user
            $_POST['turno']);    //datos[1] id del turno
echo $obj->agregar($datos);


?>