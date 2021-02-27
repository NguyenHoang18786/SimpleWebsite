<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <a class="navbar-brand" href="index.php">ATN<b>Shop</b></a>  		
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      </div>
      <!-- Collection of nav links, forms, and other content for toggling -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Products </a>
            <ul class="dropdown-menu">
              <li><a href="Laptop.php">Laptop</a></li>
              <li><a href="phone.php">Phone</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form form-inline">
           <div class="input-group search-box" style="margin-left: 285px">
            <input type="text" id="search" class="form-control" placeholder="Search here...">
            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
        </ul>
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
          <input type="submit" name="submit" class="btn btn-outline-primary" value="Submit">
     </form>
    </div>                                                                                        
  </center>
</body>
</html>


