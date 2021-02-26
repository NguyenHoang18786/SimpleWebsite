<html>
	<head>
		<title>ATN shop storages</title>
	</head>
	<body>
		<?php 
	echo '<p>TEST HEROKU POSTGRESQL DATABASE </p>'; 
	# Heroku credential 
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

	</body>
</html>
