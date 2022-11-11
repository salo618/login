<?php 

session_start();

$conexion = mysqli_connect(
    'localhost',
    'root',
    '',
    'final4'
    
    );

$email = $_SESSION['email'];

$sql = "SELECT id, nombre, email, bio, phone, pictures, contra FROM usuarios WHERE email = '$email'";
$resultado = $conexion -> query($sql);
$row = $resultado->fetch_assoc();

$nombre = $row['nombre'];
$mail = $row['email'];
$bio = $row['bio'];
$phone = $row['phone'];
$password = $row['contra'];
$id = $row['id'];
$picture = $row['pictures'];



if (isset($_POST ['save'])) {
    $id = $row['id'];
    $name = $_POST['name'];
    $correo = $_POST['email'];
    $bio = $_POST['bio'];
    $telefono = $_POST['phone'];
    $contrasena = $_POST['pass'];
    $picture = $_POST['archivo'];

    //imagen

    //codigo insertado
        //Recogemos el archivo enviado por el formulario
        $archivo = $_FILES['archivo']['name'];
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($archivo) && $archivo != "") {
           //Obtenemos algunos datos necesarios sobre el archivo
           $tipo = $_FILES['archivo']['type'];
           $tamano = $_FILES['archivo']['size'];
           $temp = $_FILES['archivo']['tmp_name'];
           //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
          if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
             echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
             - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
          }
          else {
             //Si la imagen es correcta en tamaño y tipo
             //Se intenta subir al servidor
             if (move_uploaded_file($temp, 'images/'.$archivo)) {
                 //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                 chmod('images/'.$archivo, 0777);
                 //Mostramos el mensaje de que se ha subido co éxito
                 echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                 //Mostramos la imagen subida
                 echo '<p><img src="images/'.$archivo.'"></p>';
                 echo $archivo;
                // $pic = "./images/$archivo";
                 echo $id;
                 $query= "UPDATE usuarios SET pictures='./images/$archivo' WHERE id=$id";
                 
                 $result=mysqli_query($conexion,$query);
                 echo $description;
                 if(!$result){
                    die("query failed");}
                 $_SESSION["message"]="Data have been updated succesfully";
                 $_SESSION["message_type"] = "success";
                 }
                 else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                 }
            }

        }



    $query = "UPDATE usuarios SET nombre = '$name', email = '$correo', bio = '$bio', phone ='$telefono', contra = '$contrasena' WHERE id = '$id' ";
    mysqli_query($conexion, $query);
    header("Location: profile.php");

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_com_register.css">
    <title>Register</title>
</head>
<body>
<?php include("./header.php") ?>
    <div class="container">
        <section>
            <h3 class="titulo mb-3">Edit your information</h3>
        </section>

        <form action="edit_profile.php?id=<?php echo $_SESSION['email'];?>" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Photo</label>
            <input type="file" accept="image/png, image/jpeg" id="archivo" name="archivo" class="form-control" id="inputGroupFile01">
            </div>
            
            <label for="name" class="form-label">Name</label>
            <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="name" id="name" placeholder="Enter your name...">

            <label for="name" class="form-label">Email</label>
            <input type="text" value="<?php echo $mail; ?>" class="form-control" name="email" id="name" placeholder="Enter your new email...">

            <label for="bio" class="form-label">Bio</label>
            <textarea type="text" value="<?php echo $bio; ?>" class="form-control" name="bio" id="bio" placeholder="Enter your bio..."></textarea>

            <label for="phone" class="form-label">Phone</label>
            <input type="phone" value="<?php echo $phone; ?>" class="form-control" name="phone" id="phone" placeholder="Enter your phone...">

            <label for="name" class="form-label">Password</label>
            <input type="text" value="<?php echo $password; ?>" class="form-control" name="pass" id="name" placeholder="Enter your new password...">

            <input type="submit" name="save" class="btn btn-primary but mt-3" value="Save">
        </form>
    </div>




    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>