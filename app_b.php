<?php require_once("header.php"); ?>

<?php
	// require another php file
	// ../../../ => 3 folders back
	require_once("config.php");
	$everything_was_okay = true;
	//*********************
	// TO field validation
	//*********************
	if(isset($_GET["product_name"])){ //if there is ?Product_name= in the URL
		if(empty($_GET["product_name"])){ //if it is empty
			$everything_was_okay = false; //empty
			echo "Please enter the Product name! <br>"; // yes it is empty
		}else{
			echo "Product name: ".$_GET["product_name"]."<br>"; //no it is not empty
		}
	}else{
		$everything_was_okay = false; // do not exist
	}
	//check if there is variable in the URL
	if(isset($_GET["wholesale_price"])){
		
		//only if there is Wholesale_price in the URL
		//echo "there is Wholesale price";
		
		//if its empty
		if(empty($_GET["wholesale_price"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Wholesale price! <br>";
		}else{
			//its not empty
			echo "Wholesale price: ".$_GET["wholesale_price"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Wholesale price";
		$everything_was_okay = false;
	}
		
		if(isset($_GET["retail_price"])){
		
		//only if there is Retail_price in the URL
		//echo "there is Retail_price";
		
		//if its empty
		if(empty($_GET["retail_price"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Retail price! <br>";
		}else{
			//its not empty
			echo "Retail price: ".$_GET["retail_price"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Retail price";
		$everything_was_okay = false;
	}
		
		
	    //check if there is variable in the URL
	    if(isset($_GET["amount_of_sold_items"])){
		
		//only if there is Amount_of_sold_items in the URL
		//echo "there is Amount of sold items";
		
		//if its empty
		if(empty($_GET["amount_of_sold_items"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Amount of sold items! <br>";
		}else{
			//its not empty
			echo "Amount of sold items: ".$_GET["amount_of_sold_items"]."<br>";
		}
		
	}else{
		//echo "there is no such thing as Amount of sold items";
		$everything_was_okay = false;
	}
	
		if(isset($_GET["taxes"])){
		
		//only if there is Taxes in the URL
		//echo "there is Taxes";
		
		//if its empty
		if(empty($_GET["taxes"])){
			//it is empty
			$everything_was_okay = false;
			echo "Please enter the Taxes! <br>";
		}else{
			//its not empty
			echo "Taxes: ".$_GET["taxes"]."<br>";
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
		$stmt->bind_param("sddii", $_GET["product_name"], $_GET["wholesale_price"], $_GET["retail_price"], $_GET["amount_of_sold_items"], $_GET["taxes"]);
		
		//save
		if($stmt->execute()){
			echo "saved sucessfully";
		}else{
			echo $stmt->error;
		}
		
		
	}
	
	
?>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Brand</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		  <ul class="nav navbar-nav">
			
			<li class="active">
				<a href="app_b.php">
					App page
				</a>
			</li>
			
			
			<li>
				<a href="table_b.php">
					Table
				</a>
			</li>
			
		  </ul> 
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">

		<h1> This is the app page </h1>

        <form>    
		
			 <div class="row">
				<div class="col-md-3 col-sm-6">
				 <div class="form-group">
					<label for="product_name"> Product name: </label><br>
					<input name="product_name" id="product_name" type="text" class="form_control">
					</div> 			 
				</div>
			</div>
				
		
			<div class="row">
				 <div class="col-md-3 col-sm-6">
					 <div class="form-group">
						<label for="wholesale_price"> Wholesale price: </label><br>
						<input name="wholesale_price" id="wholesale_price" type="text" class="form_control">
					</div> 			 
				</div>
			</div>
			 
			 <div class="row">
				 <div class="col-md-3 col-sm-6">
					 <div class="form-group">
						<label for="retail_price">  Retail price: </label><br>
						<input name="retail_price" id="retail_price" type="text" class="form_control">
					</div> 			 
				</div>
			</div>
			
			 <div class="row">
				 <div class="col-md-3 col-sm-6">
					 <div class="form-group">
						<label for="amount_of_sold_items"> Amount of sold items: </label><br>
						<input name="amount_of_sold_items" id="amount_of_sold_items" type="text" class="form_control">
					</div> 			 
				</div>
			</div>
			
			<div class="row">
				 <div class="col-md-3 col-sm-6">
					 <div class="form-group">
						<label for="taxes"> Taxes: </label><br>
						<input name="taxes" id="taxes" type="text" class="form_control">
					</div> 			 
				</div>
			</div>
			 
			 <div class="row">
				 <input class="btn btn_success hidden-xs btn-md " type="submit" value="Save data">
				 <input class="btn btn_success btn-md btn-block visible-xs-block " type="submit" value="Save data">
			 </div>
			
		</form>
  
  
	</div>
  
  </body>
</html>