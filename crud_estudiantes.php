<?php
if(!empty($_POST)){
    $txt_id=utf8_decode($_POST["txt_id"]);
    $txt_carnet=utf8_decode($_POST["txt_carnet"]);
    $txt_nombres=utf8_decode($_POST["txt_nombres"]);
    $txt_apellidos=utf8_decode($_POST["txt_apellidos"]);
    $txt_direccion=utf8_decode($_POST["txt_direccion"]);
    $txt_telefono=utf8_decode($_POST["txt_telefono"]);
    $txt_genero=utf8_decode($_POST["txt_genero"]);
    $txt_email=utf8_decode($_POST["txt_email"]);
    $txt_fecha_nacimiento=utf8_decode($_POST["txt_fecha_nacimiento"]);

    $sql="";
    if(isset($_POST["btn_crear"])){
        $sql="INSERT INTO estudiantes (id_estudiante,carnet,nombres,apellidos,direccion,telefono,genero,email,fecha_nacimiento)VALUES('". $txt_carnet ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."','". $txt_telefono ."','". $txt_genero ."','". $txt_email ."','". $txt_fecha_nacimiento ."');";
    }
    if(isset($_POST["btn_actualizar"])){
        $sql="UPDATE estudiantes SET carnet='". $txt_carnet ."',nombres='". $txt_nombres ."' ,apellidos='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',genero='". $txt_genero ."',email='". $txt_email ."',fecha_nacimiento='". $txt_fecha_nacimiento ."' WHERE id_estudiante =". $txt_id .";";
    }
    if(isset($_POST["btn_borrar"])){
        $sql="DELETE from estudiantes where id_estudiantes =". $txt_id . " ;";

    }
        include("datos_conexion.php");
        $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        if($db_conexion->query($sql)===true){
            $db_conexion->close();
            header("location: /segundo_parcial");
        }else{
            echo"Error" . $sql . "<br>" .$db_conexion->close();
        }
}
?>