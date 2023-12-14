
 <html>
 <?php
 error_reporting(0);

require_once("CreateDb.php");
if(isset($_POST['Upload'])){

    
	$category = $_POST['Categories'];
	$pname = $_POST['Pname'];
	$price = $_POST['Price'];
	$image = $_FILES['Image']['name'];
    $folder = "projectupdate/image/".$image ;  
    $tmp_name = $_FILES['Image']['tmp_name'];
	$description = $_POST['Description'];
   
    move_uploaded_file($_FILES["Image"]["tmp_name"],
    "upload/" . $_FILES["Image"]["name"]);
    

	 
	$data=new CreateDb($category,$pname,
	$price, 
	$image,
    $description);
        
    
}

?>
    <head>
    <link rel="stylesheet" href="css.css" />
    <style>
        #description {
            resize:none;
            width :300px;
            height :100px;
            margin-top: 30px;  
        }
        form{
            text-align: center;
            font:
        }
        * {
    font-family:Arial,Helvetica,sans-serif;
            color:black;
}
        form {text-align: center;
    font-size: 40px;

}
input {
    border:2px black solid;
    width :300px;
    height : 50px;
    
}
        select {
    border:2px black solid;
    width :300px;
    height : 50px;
    
}
#SubB:hover { s
    background-color: #555555;
    color:white;
        }
#SubB {
    font-size: 35px;
    width:300px;
    height:50px;
    margin-top: 30px;
    background-color:white;
    color: black;
}
.forminput{
            margin-top: 30px;
            
            
 }
#categories{
            font-size:30px;
}
        
option {
            font-size:30px;
        
}
        
#pimage{
            font-size:22px;
            margin-top:5px;
            background-color: white;
}
#imagelabel{
            font-size:23px;
           
}
h1{
            text-align: center;
            font-size:70px;
}
body{
    background: url("eCommerce-Website-Components-photo.jpg");
    background-size: 100%;
    background-repeat: no-repeat;
    
}
    </style>
    <script>
  
  
   

   </script>

    </head>
    <body>
    

 
 <?php 
  if(isset($_POST['ADD'])){
    echo '<script> 
        function add() {
        var x = document.createElement("OPTION");
        x.innerHTML = "Hello";
        document.getElementById("categories").appendChild(x);
    } </script>';
}

echo '<script> add(); </script>';
?> 
 
       <h1>List a Product</h1> 
        <form action="productupload.php" method="POST" enctype="multipart/form-data">
<select size ="1" class ="forminput" name="Categories" id="categories">
  <option value="">Choose a Category</option>
  <option value="clothes">Clothes</option>
  <option value="electronics">Electronics</option>
  <option value="healthandcare">Health & Care</option>   
</select><br>
<input class ="forminput"type="text" placeholder ="Product Name" name="Pname"  required> <br>
<input class ="forminput"type="number" step="0.01" placeholder ="Product Price" name="Price"  required> <br> 
<label id ="imagelabel"for="pimage">Upload your Product's Image</label><br>
<input id="pimage" class ="forminput" type="file" placeholder ="Photos" name="Image"  required><br>
<textarea class ="forminput" id ="description" rows = "5" cols = "60" placeholder="Enter Details here..." name = "Description"></textarea><br>
<input id ="SubB" type="submit" value="Upload" name="Upload">
</form>
    </body>
   
 </html>