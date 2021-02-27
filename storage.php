<?php
session_start();
?>
<html lang="en">
 <head>
	 <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
		<title>ATN shop storages</title>
	 <link rel="stylesheet" href="styleAs.css">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
		<form method="post" class="navbar-form form-inline>
		<div class="input-group search-box" style="margin-left: 475px">
		<input class="form-control me-2" type="search" name="search" id="search" placeholder="Search..." aria-label="Search">
		<ul class="nav"><input type="submit" name="submit" class="btn btn-primary get-started-btn mt-1 mb-1" value="Submit"></ul>
		</div>
	      </form>
	    <ul class="nav navbar-nav navbar-right">
           <li>
            <a href="StorageManagement.php" class="btn btn-outline-success" style="margin-left: 365px"> &nbsp;&nbsp;Storage Management</a>            
          </li>
           </ul>
	    </nav>
		<style>
		table {
		  border-collapse: collapse;
		  width: 90%;
		}
		td, th{
		  padding: 8px;
		  text-align: left;
		  border-bottom: 1px solid #ddd;
		}
		tr:hover {background-color:#FAFAD2;}
		</style>
 </head>
 <body>
	 <center><div>
		<?php 
			# Heroku credential 	 
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
			$search = $_POST["search"];
			if(isset($_POST['submit'])){
			$query5 = "select * from atnshop_storage where product_id = '$search' ";
			$result = pg_query($pg_heroku, $query5);
			# Display data column by column
			$i = 0;
			echo '<html><body><table><tr>';
			while ($i < pg_num_fields($result))
			{
				$fieldName = pg_field_name($result, $i);
				echo '<td>' . $fieldName . '</td>';
				$i = $i + 1;
			}
			echo '</tr>';
			# Display data row by row
			$i = 0;
			while ($row = pg_fetch_row($result)) 
			{
				echo '<tr>';
				$count = count($row);
				$y = 0;
				while ($y < $count)
				{
					$c_row = current($row);
					echo '<td>' . $c_row . '</td>';
					next($row);
					$y = $y + 1;
				}
				echo '</tr>';
				$i = $i + 1;
			}
			pg_free_result($result);
			echo '</table></body></html>';}
		?>
		 </div></center>
	 <hr>
	 <center><h1>ATN SHOP STORAGE</h1></center> 
	 <hr>
	 <div class="container">
	  <div class="row">
	    <div class="col">
		    <center><h3>Quantity of products at Shop 1</h3></center>
		<?php 
		# Heroku credential 	 
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

		$query1 = "select product_name, count(product_id) as Quantity from atnshop_storage WHERE shop_id = 1 group by product_name";
		$result = pg_query($pg_heroku, $query1);
		# Display data column by column
		$i = 0;
		echo '<html><body><table><tr>';
		while ($i < pg_num_fields($result))
		{
			$fieldName = pg_field_name($result, $i);
			echo '<td>' . $fieldName . '</td>';
			$i = $i + 1;
		}
		echo '</tr>';
		# Display data row by row
		$i = 0;
		while ($row = pg_fetch_row($result)) 
		{
			echo '<tr>';
			$count = count($row);
			$y = 0;
			while ($y < $count)
			{
				$c_row = current($row);
				echo '<td>' . $c_row . '</td>';
				next($row);
				$y = $y + 1;
			}
			echo '</tr>';
			$i = $i + 1;
		}
		pg_free_result($result);
		echo '</table></body></html>';
		?> 
	    </div>
	    <div class="col">
		    <center><h3>Quantity of products at Shop 2</h3></center>
		    <?php 
		# Heroku credential 	 
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

		$query2 = "select product_name, count(product_id) as Quantity from atnshop_storage WHERE shop_id = 2 group by product_name";
		$result = pg_query($pg_heroku, $query2);
		# Display data column by column
		$i = 0;
		echo '<html><body><table><tr>';
		while ($i < pg_num_fields($result))
		{
			$fieldName = pg_field_name($result, $i);
			echo '<td>' . $fieldName . '</td>';
			$i = $i + 1;
		}
		echo '</tr>';
		# Display data row by row
		$i = 0;
		while ($row = pg_fetch_row($result)) 
		{
			echo '<tr>';
			$count = count($row);
			$y = 0;
			while ($y < $count)
			{
				$c_row = current($row);
				echo '<td>' . $c_row . '</td>';
				next($row);
				$y = $y + 1;
			}
			echo '</tr>';
			$i = $i + 1;
		}
		pg_free_result($result);
		echo '</table></body></html>';
		?> 
	    </div>
	  </div>
	</div>
	 <br>
	 <br>
	 <br><u><a href="AProduct.php" style="color: blue; margin-left:680px">See all products <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg></a></u>
	 <hr>
	 <center><div class="container-sm">
		 <h3>Current price list of products of ATN shop</h3>
		<?php 
		# Heroku credential 	 
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

		$query3 = "select product_name, product_price from atnshop_storage group by product_name, product_price order by product_price asc";
		$result = pg_query($pg_heroku, $query3);
		# Display data column by column
		$i = 0;
		echo '<html><body><table><tr>';
		while ($i < pg_num_fields($result))
		{
			$fieldName = pg_field_name($result, $i);
			echo '<td>' . $fieldName . '</td>';
			$i = $i + 1;
		}
		echo '</tr>';
		# Display data row by row
		$i = 0;
		while ($row = pg_fetch_row($result)) 
		{
			echo '<tr>';
			$count = count($row);
			$y = 0;
			while ($y < $count)
			{
				$c_row = current($row);
				echo '<td>' . $c_row . '</td>';
				next($row);
				$y = $y + 1;
			}
			echo '</tr>';
			$i = $i + 1;
		}
		pg_free_result($result);
		echo '</table></body></html>';
		?> 
	 </div></center>
	 <br>
	 <br>
 </body>
<footer>
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
		<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
		<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
		<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-primary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden"></span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden"></span>
</div>
	</footer>
</html>
