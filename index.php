<html>
<body>

  <center><h1>My first PHP page</h1></center>

<?php
echo "Hello Cloud Computing Class!<br>";
echo "Nguyễn Hoàng";
?>
  
<?php
$con=mysqli_connect("ec2-54-158-1-189.compute-1.amazonaws.com","equifalumcnmkg","7bbc29b6da39382b5f7a0fb0aa5a4bc737cd1174714f757097fbd2a4b0b87786","dm3thdq3v0u36");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM test_lab6");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Product</th>
<th>Price</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['product_id'] . "</td>";
echo "<td>" . $row['product_name'] . "</td>";
echo "<td>" . $row['product_price'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</body>
</html>
