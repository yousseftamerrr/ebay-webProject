<?php 
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yao";
$count=false;
if(isset($_POST['Submit'])){

 $Username = $_POST['Username'];  
 $Password = $_POST['Password'];  
 $con = new mysqli($servername, $username, $password, $dbname);
     
   
   
     $sql = "SELECT * FROM users WHERE username = '$Username' and password = '$Password'";  
     $result = mysqli_query($con, $sql);  
     
     while($row = mysqli_fetch_assoc($result)){
         if($row['username']==$Username && $row['password']==$Password){
            $count=true;
         }
        }  
        if($count){  
            echo "<h1><center> Login successful </center></h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        } 
    }
?>  
<html>
    <head>
    <link rel="stylesheet" href="login.css">
    </head>
    <body>

        <h1>Login</h1><br>
        <form action="index.php" method="POST" name = "myForm" >
      <input type="text" placeholder ="UserName" name="Username"  required><br>
	  
	  <input type="Password" placeholder ="Password" name="Password"  required><br>
      <input type="submit" id = "SubB" value="Submit" name="Submit">
    </form>
    </body>
</html>
