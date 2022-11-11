<?php
include("db.php");
session_start();

if(isset($_POST["login"])){
$mail = $_POST['mail'];
$password = $_POST['pass'];

$query = ("SELECT * FROM ingresar WHERE (email = '$mail' and pass = '$password')");
$result = mysqli_query($link, $query);
if(!$result){
    echo "aqui es";
}
if(mysqli_num_rows($result)==1){
    $row = mysqli_fetch_array($result);
        $id= $row['id'];
        header("location:profile.php?id=$id");
    }else if(mysqli_num_rows($result)==0){
        echo '<script>alert("Datos incorrectos, favor de verificar");</script>';
        header("location:login.php");
    
    }
}    

/*if($consulta == 1){
    echo "bienvenido: ".$nombre;
    header("location: profile.php");
}else if($consulta == 0){
    echo "datos incorrectos";
}*/

?>