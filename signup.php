<html>
<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yao";


if(isset($_POST['Submit'])){

	$conn = new mysqli($servername, $username, $password, $dbname);
	 
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	$uname = $_POST['Username'];
	$pass = $_POST['Password'];
	$fn = $_POST['FName'];
	$ln = $_POST['LName'];
	$email = $_POST['Email'];


	 
	$sql  = "INSERT INTO users (username, password, fname, lname, email) VALUES
	('$uname', '$pass', '$fn', '$ln', '$email')";
	 
	if(mysqli_query($conn, $sql)) {

        if(isset($_SESSION['usernames'])){
            $username_array=array(
                'usernames'=>$uname
              );
            $count= count($_SESSION['usernames']);
            $_SESSION['usernames'][$count]=$username_array;
            
            print_r($_SESSION['usernames']);
            
            
        }
        else{
    
              $username_array=array(
                'usernames'=>$uname
              );
              $_SESSION['usernames'][0]=$username_array;
              
        }
		if(isset($_SESSION['id'])){
            $sql="SELECT id FROM users";
			$result=mysqli_query($conn,$sql);
            while($id_array=mysqli_fetch_assoc($result))
            {
				if(in_array($id_array['id'],$_SESSION['id'])){
					
				}
				else{
					$count=count($_SESSION['id']);
					$_SESSION['id'][$count]=$id_array['id'];
					print_r($_SESSION['id']);
				}
			}
            
        }
        else{
          $sql="SELECT id FROM users";
		  $result=mysqli_query($conn,$sql);
             $id_array=mysqli_fetch_assoc($result);
              $_SESSION['id'][0]=$id_array['id'];
			  
        }
         }      

	
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
 
}




?>





<head>
	<script>

		function ValidateEmail(inputText)
		{
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(inputText.value.match(mailformat))
			{
				alert("Valid email address!");
				document.myForm.Email.focus();
				return true;
			}
			else
			{
				alert("You have entered an invalid email address!");
                document.myForm.Email.focus();
				return false;
			}
		}


	</script>
    <link rel="stylesheet" href="signup.css">
	
</head>

<body>
	
	<h1>Creating a new account </h1>

	<form action="" method="POST" name = "myForm" onsubmit="return ValidateEmail(document.myForm.Email)">
	  <input type="text" placeholder ="First Name"name="FName" required><br> 
      
	  <input type="text" placeholder ="Last Name" name="LName"  required><br> 
	  
	  <input type="text" placeholder ="Email" name="Email"  required> <br>
	 
	  <input type="text" placeholder ="UserName" name="Username"  required><br>
	  
	  <input type="Password" placeholder ="Password" name="Password"  required><br>
	  <input id ="SubB" type="submit" value="Sign Up" name="Submit">
      
	</form>
	





</body>

</html>