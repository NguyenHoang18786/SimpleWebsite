<?php
session_start();
?>
<html lang="en">
 <head>
	 <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
		<title>ATN shop storages</title>
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
		<form class="navbar-form form-inline method="post">
			<div class="input-group search-box" style="margin-left: 500px">
		<input class="form-control me-2" type="search" name="search" id="search" placeholder="Search..." aria-label="Search">
			</div>
		<button class="btn btn-outline-success" type="submit" name="submit">Search</button>
	      </form>
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
		tr:hover {background-color:#f5f5f5;}
		</style>
 </head>
 <body>
	 <center><h1>ATN SHOP STORAGE</h1></center> 
	 <hr>
	 <div>
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
		</div>
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
	 <br>
	 <hr>
	 <div class="container-sm">
		 <center><h3>Current price list of products of ATN shop</h3></center>
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
	 </div>
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
<div class="spinner-grow text-dark" role="status">
  <span class="visually-hidden"></span>
</div>
	</footer>
</html>
