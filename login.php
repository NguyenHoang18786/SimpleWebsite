<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  $host_heroku = "ec2-54-158-1-189.compute-1.amazonaws.com";
  $db_heroku = "dm3thdq3v0u36";
  $user_heroku = "equifalumcnmkg";
  $pw_heroku = "7bbc29b6da39382b5f7a0fb0aa5a4bc737cd1174714f757097fbd2a4b0b87786"; 
  $conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
  $pg_heroku = pg_connect($conn_string);
  if (!$pg_heroku)
			{
				die('Error: Could not connect: ' . pg_last_error());
			}
    if(isset($_POST['submit'])&&!empty($_POST['submit'])){    
        $hashpassword = md5($_POST['password']);
        $sql ="select * from accounts where username = '".pg_escape_string($_POST['username'])."' and password ='".$hashpassword."'";
        $data = pg_query($pg_heroku, $sql); 
        $login_check = pg_num_rows($data);
        if($login_check > 0){     
            header("Location: storage.php");
            exit;    
        }else{        
            echo "Invalid Details";
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
