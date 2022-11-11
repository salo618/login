
<?php
  include("nav.php");
  include("db.php");
?>

<div class= "div_3">
<h1>Personal info</h1>   
<h4>Basic info, like your name and photo</h4>
</div>
<div class="container p-4">
    <div class= "row  justify-content-center">
        <div class="col-md-5 card">
        
            <table class="table table-striped">
                <tbody>
                <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                $query = "SELECT * FROM ingresar WHERE id ='$id'";
                $consulta = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($consulta)){?>
                    <thead>
            <tr>
              <th scope="col"><h3>Profile</h3><p class="fw-normal">Some info may be visible to other people</p></th>
              <th scope="col"><button type="button" class="btn btn-outline-primary" ><a href="update.php?id= <?php echo $row['id']?>">Edit</a></button></th>
            </tr>
          </thead>

                    <tr>
                        <th scope="row">PHOTO</th>
                        <td><img src="<?php echo $row['photo']?>"  width="150" height="150" class="rounded-3"></td>
                        
                    </tr>
                    <tr>
                        <th scope="row">USER</th>
                        <td><?php echo $row['user']?></td>
                    </tr>
                    <tr>
                        <th scope="row">NAME</th>
                        <td><?php echo $row['nombre']?></td>
                    </tr>
                    <tr>
                        <th scope="row">BIO</th>
                        <td><?php echo $row['biography']?></td>
                    </tr>
                    <tr>
                        <th scope="row">PHONE</th>
                        <td><?php echo $row['telephone']?></td>
                    </tr>
                    <tr>
                        <th scope="row">EMAIL</th>
                        <td><?php echo $row['email']?></td>
                    </tr>
                    <tr>
                        <th scope="row">PASSWORD</th>
                        <td><?php echo $row['pass']?></td>
                    </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>