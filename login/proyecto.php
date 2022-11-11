<?php
  include("db.php");

if(isset($_POST['login'])){
    $email = $_POST['mail'];
    $passw = $_POST['pass'];




    $query = "INSERT INTO ingresar(email,pass) VALUES ('$email','$passw')";
    $result = mysqli_query($link, $query);
    if(!$result){
        die("Query failed");
    }
}
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
                <form action="proyecto.php" method="POST">
                <div class="card-body">
                  <label class="form-label label_2"><h4>Join thousands of learners from around the world</h4></label>
                  <label class="form-label label_2">Master web development by making real-life projects.there a multiple paths for you to choose</label>
                </div>
                <div class="card-body div1">
                    <i class='fa-solid fa-envelope' style="margin-left:15px; margin-top: 20px; color:#828282; display: block; position:absolute;"></i>
                    <input type="email" class="form-control input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="mail" autofocus> 
                </div>
                <div class="card-body div1">
                    <i class="fa-sharp fa-solid fa-lock fa-2x1" style="margin-left:15px; margin-top: 20px; color:#828282; display: block; position:absolute; text-size: 20px;"></i>
                    <input type="password" class="form-control input" id="exampleInputPassword1" placeholder="Password" name="pass">
                    
                </div>
                <div class="card-body">
                    <button type="submit" class="btn btn-primary button form-control input" name="login">Start coding now</button>
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
                    <label class="form-label label_1 row justify-content-center">Al ready member?<a class= "row justify-content-center" href="login.php">Login</a> </label>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>      

</body>
</html>




