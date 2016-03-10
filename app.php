<?php
	// require another php file
	// ../../../ => 3 folders back
	require_once("config.php");
	$everything_was_okay = true;
	//*********************
	// TO field validation
	//*********************
	if(isset($_GET["Product_name"])){ //if there is ?Product_name= in the URL
		if(empty($_GET["Product_name"])){ //if it is empty
			$everything_was_okay = false; //empty
			echo "Please enter the Product name! <br>"; // yes it is empty
		}else{
			echo "Product name: ".$_GET["Product_name"]."<br>"; //no it is not empty
		}
	}else{
		$everything_was_okay = false; // do not exist
	}
	//check if there is variable in the URL
	if(isset($_GET["Wholesale_price"])){
		
		//only if there is Wholesale_price in the URL
		//echo "there is Wholesale price";
		
		//if its empty
		if(empty($_GET["Wholesale_price"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Wholesale price! <br>";
		}else{
			//its not empty
			echo "Wholesale price: ".$_GET["Wholesale_price"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Wholesale price";
		$everything_was_okay = false;
	}
		
		if(isset($_GET["Retail_price"])){
		
		//only if there is Retail_price in the URL
		//echo "there is Retail_price";
		
		//if its empty
		if(empty($_GET["Retail_price"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Retail price! <br>";
		}else{
			//its not empty
			echo "Retail price: ".$_GET["Retail_price"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Retail price";
		$everything_was_okay = false;
	}
		
		
	    //check if there is variable in the URL
	    if(isset($_GET["Amount_of_sold_items"])){
		
		//only if there is Amount_of_sold_items in the URL
		//echo "there is Amount of sold items";
		
		//if its empty
		if(empty($_GET["Amount_of_sold_items"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Amount of sold items! <br>";
		}else{
			//its not empty
			echo "Amount of sold items: ".$_GET["Amount_of_sold_items"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Amount of sold items";
		$everything_was_okay = false;
	}
	
		if(isset($_GET["Taxes"])){
		
		//only if there is Taxes in the URL
		//echo "there is Taxes";
		
		//if its empty
		if(empty($_GET["Taxes"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Taxes! <br>";
		}else{
			//its not empty
			echo "Taxes: ".$_GET["Taxes"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Taxes";
		$everything_was_okay = false;
	}
	
	
	/***********************
	**** SAVE TO DB ********
	***********************/
	
	// ? was everything okay
	if($everything_was_okay == true){
		
		echo "Saving to database ... ";
		
		
		//connection with username and password
		//access username from config
		//echo $db_username;
		
		// 1 servername
		// 2 username
		// 3 password
		// 4 database
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_dmibre");
		
		$stmt = $mysql->prepare("INSERT INTO Revenue_calculator (Product_name, Wholesale_price, Retail_price, Amount_of_sold_items, Taxes) VALUES (?,?,?,?,?)");
			
		//echo error
		echo $mysql->error;
		
		// we are replacing question marks with values
		// s - string, date or smth that is based on characters and numbers
		// i - integer, number
		// d - decimal, float
		
		//for each question mark its type with one letter
		$stmt->bind_param("siiii", $_GET["Product_name"], $_GET["Wholesale_price"], $_GET["Retail_price"], $_GET["Amount_of_sold_items"], $_GET["Taxes"]);
		
		//save
		if($stmt->execute()){
			echo "saved sucessfully";
		}else{
			echo $stmt->error;
		}
		
		
	}
	
	
?>
<a href="table.php">table</a>
<h2> Revenue calculator </h2>

<form method="get">
   <label for="Product_name">Product name: <label><br>
   <input type="text" name="Product_name"><br><br>
   
   <label for="Wholesale_price">Wholesale price: <label><br>
   <input type="text" name="Wholesale_price"><br><br>
   
   <label for="Retail_price">Retail price: <label><br>
   <input type="text" name="Retail_price"><br><br>
   
   <label for="Amount_of_sold_items">Amount of sold items: <label><br>
   <input type="text" name="Amount_of_sold_items"><br><br>
   
   <label for="Taxes">Taxes: <label><br>
   <input type="text" name="Taxes"><br><br>
   
   <!-- This is the save button--> 
   <input type="submit" value="Save to DB">
   
<form>
