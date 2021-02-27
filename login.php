<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="styleAs.css">
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
    <script>
      // Prevent dropdown menu from closing when click inside the form
      $(document).on("click", ".navbar-right .dropdown-menu", function(e){
        e.stopPropagation();
      });
    </script>
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><b>ATN</b>Shop</a>  		
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      </div>
    </nav>
</head>
<body>
  <?php
  $host_heroku = "ec2-54-158-1-189.compute-1.amazonaws.com";
  $db_heroku = "dm3thdq3v0u36";
  $user_heroku = "equifalumcnmkg";
  $pw_heroku = "7bbc29b6da39382b5f7a0fb0aa5a4bc737cd1174714f757097fbd2a4b0b87786"; 
  $conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
  $pg_heroku = pg_connect($conn_string);
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query ="select * from accounts where username = '$username' and password = '$password' ";
    $result = pg_query($pg_heroku,$query); 
    $login_check = pg_num_rows($result);
    if($login_check == 0){        
        echo "Invalid Details";   
    }else{        
        header('location: storage.php'); 
    }
}
  ?>
  <center>
    <div class="container">
      <div class="row">
        <div class="col">
        </div>
        <div class="col-5">
          <div class="p-3 border bg-light">
            <h1 style="padding: 30px">Login for ATN storage </h1>
            <form method="post">          
        <div class="form-group">
          <label for="username">Username</label>
          <input type="username" class="form-control" id="username" placeholder="Enter your username ..." name="username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter your password ..." name="password">
        </div>    
          <input type="submit" name="submit" class="btn btn-primary" value="Login">
     </form>
    </div>                         
        </div>
        <div class="col">
        </div>
      </div>
    </div>                                                               
  </center>
</body>
</html>


