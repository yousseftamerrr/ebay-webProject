<?php


class CreateDb
{
        
        public $category;
	    public $pname;
	    public $price;
	    public $image;
        public $folder;
        public $tmp_name;
	    public $description;
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "yao";


        // class constructor
    public function __construct(
         $category,
	     $pname,
	     $price,
	     $image,
         $description,
         $servername = "localhost",
         $username = "root",
         $password = "",
         $dbname = "yao"
    )
    {
      $this->category =$category;
      $this->pname = $pname;
      $this->price = $price;
      $this->image = $image;
      $this->description = $description;

      $conn = new mysqli($servername, $username, $password, $dbname);
	 
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
     
      $sql  = "INSERT INTO products (product_category,product_name, product_price, product_image, product_description) VALUES
	('$category', '$pname', '$price', '$image', '$description')";
	 
	if ($conn->query($sql) === TRUE) {
	 alert("record inserted successfully") ;
	} 
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
   
      
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}