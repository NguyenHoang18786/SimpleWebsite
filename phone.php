<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Online Shopping</title>
    <marquee direction="left" class="marquee" onmouseover="this.stop();" onmouseout="this.start();">This site is under maintainance!</marquee>
    <link rel="stylesheet" href="styleAs.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384 DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
          <li><a href="index.php">Home</a></li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Products </a>
            <ul class="dropdown-menu">
              <li><a href="Laptop.php">Laptop</a></li>
              <li><a href="#">Phone</a></li>
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
          <li>
            <!-- Login -->
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Login</a>
            <ul class="dropdown-menu form-wrapper">
              <li>
                <form method="POST">
                  <p class="hint-text">Sign in with your social media account</p>
                  <div class="form-group social-btn clearfix">
                    <a href="#" class="btn btn-primary pull-left"><i class="fa fa-facebook"></i> Facebook</a>
                    <a href="#" class="btn btn-info pull-right"><i class="fa fa-google"></i> Google+</a>
                  </div>
                  <!-- Login Form -->
                  <div class="or-seperator"><b>or</b></div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="userid">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Login">
                  <div class="form-footer">
                    <a href="#">Forgot Your password?</a>
                  </div>
                </form>
                <?php
                  //to open a file
                  
                   $file =  parse_ini_file("conn.ini");    
                      //reading the values from the file
                  $dbuser = $file['dbuser'];
                  $dbpass = $file['dbpass'];
                  $dbhost = $file['dbhost'];
                  $dbname = $file['dbname'];
                  $dbport = $file['dbport'];
                      //read the values from form
                  $user = $_POST['userid'];
                  $pass = $_POST['password'];
                  
                  if($user == "" && $pass == "")
                      {
                          echo "Please Enter User Details!";
                      } 
                  else
                      {
                      $conn = new mysqli($dbhost, $dbuser, $dbpass);
                  
                  if($conn->connect_error)
                      {
                          echo "Connection Error";
                      }
                  else
                      {
                      //declaring session variables
                      $_SESSION['user'] = $user;
                      $_SESSION['pass'] = $pass;
                  
                       require("dbaccess.php");
                          $access = new access($dbhost, $dbuser, $dbpass, $dbname, $dbport);
                          $access->connect();
                      $login = $access->login($user,$pass);
                  }
                  }
                              
                  //checking if the user has clicked on the submit button
                  if($_POST)
                  {
                    //checking which form sent the POST method
                    if(isset($_POST['register']))
                    {
                        //calling a function user_register()    
                        user_register();
                    } 
                    else 
                    {
                        //nothing yet
                    }
                    
                  }
                  else
                  {
                    echo "Access Denied";
                  }
                  
                  //function to register user
                  function user_register()
                    {
                  
                  $file = parse_ini_file("conn.ini");
                  $host = trim($file['dbhost']);
                  $user = trim($file['dbuser']);
                  $pass = trim($file['dbpass']);
                  $name = trim($file['dbname']);
                  $port = trim($file['dbport']);
                  
                        //declaring the variables from form values
                        $user_name = $_POST['uname'];
                        $password  = $_POST['pass'];
                        $gender    = $_POST['gender'];
                        $role      = $_POST['role'];
                        $email     = $_POST['email'];
                        
                  
                        // Check connection
                        if ($conn->connect_error) 
                        {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        else
                        {
                        //    echo " connection ok";
                            
                        //include my file where I write the actual database queries
                        require("dbaccess.php");
                        $access = new access($host, $user, $pass, $name, $port);
                            
                    //    $access = new access("localhost", "root", "", "shop online", "3306");
                        $access->connect();
                  
                        //STEP 2. Create user in DBAccess.php
                  $registerUser = $access->registerUser($user_name,$password,$gender,$role,$email);
                  
                            
                       // $getUser = $access->getUser($user_name);
                  
                        }
                    }
                  
                  ?>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle get-started-btn mt-1 mb-1">Sign up</a>
            <ul class="dropdown-menu form-wrapper">
              <li>
                <form name="register" id="register" method="post">
                  <p class="hint-text">Fill in this form to create your account!</p>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="uname" required="required">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="pass" required="required">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="rpass" required="required">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="required">
                  </div>
                  <div class="form-group">
                    <select name=role id=role form=register class="custom-select custom-select-lg mb-3">
                      <option selected>Select the role</option>
                      <option id=admin name=admin value=admin>Admin</option>
                      <option id=vendor name=vendor value=vendor>Vendor</option>
                      <option id=buyer name=buyer value=buyer>Buyer</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="gender" class="custom-select custom-select-lg mb-3">
                      <option selected>Gender</option>
                      <option id=male name=male value="male">Male</option>
                      <option id=female name=female value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms &amp; Conditions</a></label>
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Sign up" name="register">
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <center>
      <img src="advertisement.jfif" width="1490" height="200">
      <h1 style="color: cornflowerblue">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
          <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg>
        Mobile Phone 
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
          <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg>
      </h1>
    </center>
  </head>
  <body>
    <br>
    <div class="container-xl">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <center><img src="iP11Promax.png" class="d-block w-50" alt="phone"></center>
            <div class="carousel-caption d-none d-md-block">
              <h4 style="color: white">iPhone 11 Pro Max</h4>
            </div>
          </div>
          <div class="carousel-item">
            <center><img src="VSmartActive3.jpg" class="d-block w-50" alt="phone"></center>
            <div class="carousel-caption d-none d-md-block">
              <h4 style="color: white">V-Smart Active 3</h4>
            </div>
          </div>
          <div class="carousel-item">
            <center><img src="SSgalaxyA31.png" class="d-block w-50" alt="phone"></center>
            <div class="carousel-caption d-none d-md-block">
              <h4 style="color: white">SamSung Galaxy A31</h4>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <br><br>
    <div class="container-xl">
      <h3 style="color: red">Bestseller !!!</h3>
      <div class="card-deck">
        <div class="card">
          <img src="iP11Promax.png" class="card-img-top" alt="a phone">
          <div class="card-body">
            <h4 style="color: cornflowerblue" class="card-title">iPhone 11 Pro Max 64 GB</h4>
            <h5 style="color: red" class="card-title">27.990.000 đ</h5>
            <h5 class="card-title">Product ID: 1001</h5>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cpu" fill="currentColor">
                <path fill-rule="evenodd" d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
              </svg>
              A13 Bionic
            </p>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
              6.5" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 9H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1zM2 8a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                <path d="M5 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M4.094 4a.5.5 0 0 0-.44.26l-2.47 4.532A1.5 1.5 0 0 0 1 9.51v.99H0v-.99c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198v.99h-1v-.99a1.5 1.5 0 0 0-.183-.718L12.345 4.26a.5.5 0 0 0-.439-.26H4.094z"/>
              </svg>
              64 GB
            </p>
            <p class="card-text">Offering PMH 300,000 VND when buying genuine cases</p>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-danger">Buy Now</button>
          </div>
        </div>
        <div class="card">
          <img src="SSgalaxyA31.png" class="card-img-top" alt="a phone">
          <div class="card-body">
            <h4 style="color: cornflowerblue" class="card-title">SamSung Galaxy A31</h4>
            <h5 style="color: red" class="card-title">6.990.000 đ</h5>
            <h5 class="card-title">Product ID: 2001</h5>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cpu" fill="currentColor">
                <path fill-rule="evenodd" d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
              </svg>
              Intel i7-9700
            </p>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
              6.5" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 9H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1zM2 8a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                <path d="M5 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M4.094 4a.5.5 0 0 0-.44.26l-2.47 4.532A1.5 1.5 0 0 0 1 9.51v.99H0v-.99c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198v.99h-1v-.99a1.5 1.5 0 0 0-.183-.718L12.345 4.26a.5.5 0 0 0-.439-.26H4.094z"/>
              </svg>
              128 GB
            </p>
            <p class="card-text">Offering PMH 300,000 VND when buying genuine cases</p>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-primary" disabled><del>Sold Out</del></button>
          </div>
        </div>
        <div class="card">
          <img src="VSmartActive3.jpg" class="card-img-top" alt="a phone">
          <div class="card-body">
            <h4 style="color: cornflowerblue" class="card-title">V-Smart Active 3</h4>
            <h5 style="color: red" class="card-title">4.990.000 đ</h5>
            <h5 class="card-title">Product ID: 3001</h5>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cpu" fill="currentColor">
                <path fill-rule="evenodd" d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
              </svg>
              Helio P60
            </p>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
              6.4" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 9H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1zM2 8a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                <path d="M5 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M4.094 4a.5.5 0 0 0-.44.26l-2.47 4.532A1.5 1.5 0 0 0 1 9.51v.99H0v-.99c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198v.99h-1v-.99a1.5 1.5 0 0 0-.183-.718L12.345 4.26a.5.5 0 0 0-.439-.26H4.094z"/>
              </svg>
              64 GB
            </p>
            <p class="card-text">Offering PMH 300,000 VND when buying genuine cases</p>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-danger">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container-xl">
      <h3 style="color: red">Highlights</h3>
      <div class="card-deck">
        <div class="card">
          <img src="SSgalaxyNote.jpg" class="card-img-top" alt="a phone">
          <div class="card-body">
            <h4 style="color: cornflowerblue" class="card-title">SamSung Galaxy Note 20</h4>
            <h5 style="color: red" class="card-title">20.990.000 đ</h5>
            <h5 class="card-title">Product ID: 2002</h5>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cpu" fill="currentColor">
                <path fill-rule="evenodd" d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
              </svg>
              Exynos 990
            </p>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
              6.7" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 9H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1zM2 8a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                <path d="M5 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M4.094 4a.5.5 0 0 0-.44.26l-2.47 4.532A1.5 1.5 0 0 0 1 9.51v.99H0v-.99c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198v.99h-1v-.99a1.5 1.5 0 0 0-.183-.718L12.345 4.26a.5.5 0 0 0-.439-.26H4.094z"/>
              </svg>
              256 GB
            </p>
            <p class="card-text">Offering PMH 300,000 VND when buying genuine cases</p>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-danger">Buy Now</button>
          </div>
        </div>
        <div class="card">
          <img src="SSgalaxyS21.jpg" class="card-img-top" alt="a phone">
          <div class="card-body">
            <h4 style="color: cornflowerblue" class="card-title">SamSung Galaxy S21</h4>
            <h5 style="color: red" class="card-title">7.990.000 đ</h5>
            <h5 class="card-title">Product ID: 2003</h5>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cpu" fill="currentColor">
                <path fill-rule="evenodd" d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
              </svg>
              Exynos 850
            </p>
            <p class="card-text">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-phone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                <path fill-rule="evenodd" d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
              6.5" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 9H2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1zM2 8a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2z"/>
                <path d="M5 10.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M4.094 4a.5.5 0 0 0-.44.26l-2.47 4.532A1.5 1.5 0 0 0 1 9.51v.99H0v-.99c0-.418.105-.83.305-1.197l2.472-4.531A1.5 1.5 0 0 1 4.094 3h7.812a1.5 1.5 0 0 1 1.317.782l2.472 4.53c.2.368.305.78.305 1.198v.99h-1v-.99a1.5 1.5 0 0 0-.183-.718L12.345 4.26a.5.5 0 0 0-.439-.26H4.094z"/>
              </svg>
              32 GB
            </p>
            <p class="card-text">Offering PMH 300,000 VND when buying genuine cases</p>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-danger">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <footer id="site-footer">
    <div id="footer2">
      <img src="map.png" width="100" height="100">
      <h4 class="footerText">&nbsp; Our Place</h4>
    </div>
    <br><br><br>
    <div class="container-xl">
      <div class="row">
        <div class="col-sm">
          <a href="#" class="">
            <p class="footerText">About us</p>
          </a>
          <a href="#" class="linkFooter2">
            <p class="footerText">Privacy Policy</p>
          </a>
          <a href="#" class="linkFooter2">
            <p class="footerText">Look up warranty information</p>
          </a>
          <a href="#" class="linkFooter2">
            <p class="footerText">Employment information</p>
          </a>
          <a href="#" class="linkFooter2">
            <p class="footerText">Promotion Information</p>
          </a>
        </div>
        <div class="col-sm">
          <a href="#" class="linkFooter2">
            <p class="footerText">Return policy</p>
          </a>
          <a href="#" class="linkFooter2">
            <p class="footerText">Shop system</p>
          </a>
          <a href="#" class="linkFooter2">
            <p class="footerText">Warranty system</p>
          </a>
        </div>
        <div class="col-sm">
          <h5>Shopping advice (Free) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5>
          <h3 style="color: red">0 990 990</h3>
        </div>
        <div class="col-sm">
          <h5>Comments and complaints about the service (8:00 - 22:00)</h5>
          <h3 style="color: red">0 880 808</h3>
        </div>
      </div>
    </div>
    <center>
      <a class="linkFooter" href="ATNCompany@gmail.com">ATNCompany@gmail.com</a><br>
      <p>Copyright  2020 Domain Name - All Rights Reserved </p
        >
    </center>
  </footer>
</html>
