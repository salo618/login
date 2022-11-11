<?php
  include("db.php");
  include("validacion.php");
?>

<script src="https://kit.fontawesome.com/9fa9845ee1.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="login.css" rel="stylesheet">
<div class="container p-4">
    <div class= "row  justify-content-center">
        <div class="col-md-5 card">
        <div class="card-body">
        <img src="logo2.png" alt="logo" class="img1">
        </div>
                <form action="validacion.php" method="POST">
                <div class="card-body">
                    <h2>Login</h2>
                </div>
                <div class="card-body div1">
                    <i class='fa-solid fa-envelope' style="margin-left:15px; margin-top: 20px; color:#828282; display: block; position:absolute;"></i>
                    <input type="email" class="form-control input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="mail">
                    
                </div>
                <div class="card-body div1">
                    <i class="fa-sharp fa-solid fa-lock fa-2x1" style="margin-left:15px; margin-top: 20px; color:#828282; display: block; position:absolute; text-size: 20px;"></i>
                    <input type="password" class="form-control input" id="exampleInputPassword1" placeholder="Password" name="pass">
                    
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary button form-control input" name="login">Login</button>
                    <div class="card-body">
                    <label class="form-label row justify-content-center label_1">or continue whith these social profile</label>
                    </div> 
                    <div class="card-body row justify-content-center gap-2"> 
                    <button class="button1"><i class="fa-brands fa-google"></i></button>
                    
                    <button class="button1"><i class="fa-brands fa-square-facebook"></i></button>
                    
                    <button class="button1"><i class="fa-brands fa-twitter"></i></button>
                    
                    <button class="button1"><i class="fa-brands fa-github"></i></button>
                </div>
                <div class="card-body ">
                    <label class="form-label label_1 row justify-content-center">Dont have an account yet?<a class="row justify-content-center" href="proyecto.php">Register</a> </label>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="login.js" defer></script>
