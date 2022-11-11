
<?php
include ("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://kit.fontawesome.com/9fa9845ee1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="login.css" rel="stylesheet">
    <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
  <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                $query = "SELECT * FROM ingresar WHERE id ='$id'";
                $consulta = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($consulta)){?>
    <div class="container-fluid py-2">
    <a class="navbar-brand" href="#">
      <img src="logo2.png" alt="Logo" width="150" height="24" class="d-inline-block align-text-top">
    </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
      


         

          <div class="dropdown text-end div4">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          
          <img src="<?php echo $row['photo']?>"width="32" height="32" float="right" class="rounded-3">
          <td><?php echo $row['user']?></td>
        </a>
          
          
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="'profile.php?id=<?php echo $_GET["id"];?>"> <i class="bi bi-person-circle"></i> My Profile</a></li>
            <li><a class="dropdown-item" href="">  <i class="bi bi-people-fill"></i> Chat Group</a></li>
            <li>
            <a class="dropdown-item" href='login.php' class="delete-btn"><span style=" color: red;"> <i class="bi  bi-box-arrow-right "></i>  Log out </span></a>
           </li>

          </ul>
</div>
        </li>

        </ul>
        <?php } ?>
                    <?php } ?>
      </div>
    </div>
  </nav>

</header>