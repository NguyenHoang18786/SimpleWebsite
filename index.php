<html>
<body>

  <center><h1>My first PHP page</h1></center>

<?php
echo "Hello Cloud Computing Class!<br>";
echo "Nguyễn Hoàng";
?>
  
<?php
// connect to a database 
$dbConn = pg_connect("host=ec2-54-158-1-189.compute-1.amazonaws.com
 port=5432 dbname=dm3thdq3v0u36 user=equifalumcnmkg password=7bbc29b6da39382b5f7a0fb0aa5a4bc737cd1174714f757097fbd2a4b0b87786");
if (!$dbConn) {
    echo "An error occurred.\n";
    exit;
}
// Query data
$result = pg_query($dbConn, 'SELECT * FROM test_lab6');
if (!$result) {
    echo "An error occurred.\n";
    exit;
}
// Show value
while ($row = pg_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row['product_id'] . "</td>";
echo "<td>" . $row['product_name'] . "</td>";
echo "<td>" . $row['product_price'] . "</td>";
echo "</tr>";
}echo "</table>";

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Product</th>
<th>Price</th>
</tr>";

?>
</body>
</html>
