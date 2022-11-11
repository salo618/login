<?php
include ("db.php");
include ("nav.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM ingresar WHERE id = $id";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $foto = $row['photo'];
        $email = $row['email'];
        $biop = $row['biography'];
        $username = $row['user'];
        $nombre = $row['nombre'];
        $telefono = $row['telephone'];
        $passw = $row['pass'];
    }
}


if(isset($_POST['update'])){
    $id = $_GET['id'];
    //$foto = $_POST['photo'];
    $email = $_POST['mail'];
    $biop = $_POST['bio'];
    $username = $_POST['user'];
    $nombre = $_POST['names'];
    $telefono = $_POST['tel'];
    $passw = $_POST['pass'];
    
    
    $query = "UPDATE ingresar SET email='$email', biography ='$biop', pass= '$passw', user='$username', nombre='$nombre', telephone='$telefono'   WHERE id = '$id'";
    mysqli_query($link, $query);

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
            // echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //Mostramos la imagen subida
            // echo '<p><img src="images/'.$archivo.'"></p>';
            // echo $archivo;
           // $pic = "./images/$archivo";
            echo $id;
            $query= "UPDATE ingresar SET photo='./images/$archivo' WHERE id=$id";
            //$query= "UPDATE users SET pictures='./images/$archivo', nombres='.$nombre', descriptions='.$description', telefono='.$phone', emails='.$emails', pass='.$pass' WHERE id=$id";
            //$query=mysql_query("UPDATE users SET telefono ='".$phone."', descriptions = '".$description."' WHERE id = '".$id."' ");
            //$query= "UPDATE users SET pictures='/images/$archivo', nombres='.$nombre', descriptions='.$description', telefono=.$phone, emails='.$emails', pass='.$pass' WHERE id=$id";
            $result=mysqli_query($link,$query);
            // echo $description;
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
    
    header("Location: profile.php?id=$id");
}
?>

<div class= "div_3">
<h1>Change info</h1>   
<h4>Changes will be refleted to every services</h4>
</div>
<a href='profile.php?id=<?php echo $_GET["id"];?>'><<--back</a>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card-body card">
                <form action='update.php?id=<?php echo $_GET["id"];?>' method="post" enctype="multipart/form-data">
                <table>
                
                    <tr>
                        <label>PHOTO</label>
                        <div class="input-group mb-3">
                        <input accept="image/png, image/jpeg" name="archivo" id="archivo" type="file">
                         </div> 
                    </tr>
                    <tr>
                        <label >USER</label>
                        <input type="text" Value='<?php echo $row['user']?>' class="form-control" name="user" placeholder="Update user">
                    </tr>
                    <tr>
                        <label >NAME</label>
                        <input type="text" Value='<?php echo $row['nombre']?>' class="form-control" name='names' placeholder="Update name">
                    </tr>
                    <tr>
                        <label>BIO</label>
                        <input type="text" Value='<?php echo $row['biography']?>' class="form-control" name="bio" placeholder="Update biography">
                    </tr>
                    <tr>
                        <label>PHONE</label>
                        <input type="text" Value='<?php echo $row['telephone']?>' class="form-control" name="tel" placeholder="Update telephone">
                        
                    <tr>
                        <label >EMAIL</label>
                        <input type="text" Value='<?php echo $row['email']?>' class="form-control" name="mail" placeholder="Update title">
                    </tr>
                    <tr>
                        <label>PASSWORD</label>
                        <input type="password" Value='<?php echo $row['pass']?>' class="form-control" name="pass" placeholder="Update title">
                    </tr>
                    
                    <div class="card-body" >
                    <button type="submit" class="btn btn-info btn-block w-100" name="update">Update</button>
                    </div>
                </tbody>
            </table>
            </form>
            </div>
        </div>
    </div>
</div>

<?php
include ("footer.php");
?>