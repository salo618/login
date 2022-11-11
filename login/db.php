<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'login';

$link = new mysqli($server,$user,$password,$db);

/*if(isset($_POST['db'])){
    $nombre = $_POST['name'];
    $password = $_POST['pass'];
    echo $name;
    echo $pass;

    $query = "INSERT INTO ingresar(email,password) VALUES ('$nombre','$password')";
    $result =mysqli_query($link, $query);
    if(!$result){
        die("Query failed");
    }
    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';
}*/
?>
