<?php
error_reporting(0);

require_once ('component.php');
if(isset($_GET['q'])){
  $data =$_GET['q'];
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yao";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM products where product_category =('$data')";

$result = mysqli_query($conn, $sql);



while ($row = mysqli_fetch_assoc($result)){
  component($row['product_name'], $row['product_price'], $row['product_image'],$row['id'],$row['product_description']);
}





?>