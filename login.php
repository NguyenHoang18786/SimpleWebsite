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
  $host = "ec2-54-158-1-189.compute-1.amazonaws.com";
  $port = "5432";
  $dbname = "dm3thdq3v0u36";
  $user = "equifalumcnmkg";
  $password = "7bbc29b6da39382b5f7a0fb0aa5a4bc737cd1174714f757097fbd2a4b0b87786"; 
  $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
  $dbconn = pg_connect($connection_string);
    if(isset($_POST['submit'])&&!empty($_POST['submit'])){    
        $hashpassword = md5($_POST['password']);
        $sql ="select * from accounts where username = '".pg_escape_string($_POST['username'])."' and password ='".$hashpassword."'";
        $data = pg_query($dbconn,$sql); 
        $login_check = pg_num_rows($data);
        if($login_check > 0){     
            echo "Login Successfully";    
        }else{        
            echo "Invalid Details";
        }
    }
  ?>
  <center>
    <div class="container">
   <h2 style="padding: 30px">Login for ATN storage </h2>
    <form method="post"">          
   <div class="mb-3">
      <label for="username" class="form-label-lg">Username</label>
      <input type="username" class="form-control-lg" id="username" placeholder="Please enter username ..." name="username">
   </div>
   <div class="mb-3">
      <label for="password" class="form-label-lg">Password</label>
      <input type="password" class="form-control-lg" id="password" placeholder="Please enter password ..." name="password">
   </div>
   <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="rememberPw">
      <label class="form-check-label" for="rememberPw">Remember password</label>
    </div>
      <button type="submit" name="submit" class="btn btn-outline-primary" value="Submit">Submit</button>
    </form>
  </div>
  </center>
</body>
</html>
