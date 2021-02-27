<!DOCTYPE html>
<?php
   ob_start();
   session_start();
?>
<html lang="en">
  <head>
    <meta charset=”UTF-8”>
    <title>ATN Shop</title>
    <marquee direction="left" class="marquee" onmouseover="this.stop();" onmouseout="this.start();">This site is under maintainance!</marquee>
    <link rel="stylesheet" href="styleAs.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <a class="navbar-brand" style="margin-left: 10px" href="index.php"><b>ATN</b>Shop</a>  		
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      </div>
    </nav>
    <center>
      <br><h1 style="color: cornflowerblue">ATN Storage management</h1><br><br><br>         
    </center>
  </head>
<body>
   <div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 border bg-light">
       <center><h3>Add New Product</h3></center>
         <form method="post">
           <div class="form-group">
             <label for="productid">Product ID</label>
             <input type="text" class="form-control" id="productid" name="productid" aria-describedby="productid">
           </div>
           <div class="form-group">
             <label for="productname">Product Name</label>
             <input type="text" class="form-control" id="productname" name="productname">
           </div>
          <div class="form-group">
             <label for="producttype">Product Type</label>
             <input type="text" class="form-control" id="producttype" name="producttype">
           </div>
            <div class="form-group">
             <label for="productprice">Product Price</label>
             <input type="text" class="form-control" id="productprice" name="productprice">
           </div>
            <div class="form-group">
             <label for="shopid">Shop ID</label>
             <input type="text" class="form-control" id="shopid" name="shopid">
           </div>
            <input type="submit" name="submit" class="btn btn-outline-primary" value="Submit">
         </form>
       </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">Custom column padding</div>   
    </div>
  </div>
</div>
      <?php
        $host_heroku = "ec2-54-158-1-189.compute-1.amazonaws.com";
        $db_heroku = "dm3thdq3v0u36";
        $user_heroku = "equifalumcnmkg";
        $pw_heroku = "7bbc29b6da39382b5f7a0fb0aa5a4bc737cd1174714f757097fbd2a4b0b87786"; 
        $conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
        $pg_heroku = pg_connect($conn_string);
            $query1 = "select * from atnshop_storage"
            $default_rows = pg_num_rows($query1);
            if(isset($_POST['submit'])){
            $query2 = "insert into atnshop_storage VALUES ('$_POST[productid]','$_POST[productname]',
            '$_POST[producttype]','$_POST[productprice]','$_POST[shopid]')";
            $result = pg_query($pg_heroku,$query1);
             $check_insert = pg_num_rows($result);
              if($check_insert > $default_rows){        
                 echo "Successfully Add New Product!!";   
             }else{        
                 echo "Something wrong, please input again"; 
             }
         }
         ?>
   </body>
</html>
