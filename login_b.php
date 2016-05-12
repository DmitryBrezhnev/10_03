<?php
	require_once("functions_b.php");

	//RESTRICTION - NOT LOGGED IN
	if(isset($_SESSION["user_id"])){
		//redirect user to restricted page
		header("Location: app_b.php");
	}
	
	//login button clicked
	if(isset($_POST["login"])){
		
		//login
		
		echo "logging in ...";
		
		//the username and password are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			
			//save to db
			
			login($_POST["username"], $_POST["password"]);
			
		}else{
			
			echo "both fields are required!";
			
		}
		
	
	//signup button clicked
	}else if(isset($_POST["signup"])){
		
		//signup
		
		echo "signing up ...";
		
		//the username and password are not empty
		if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["name"])){
			
			//save to db
			
			signup($_POST["username"], $_POST["password"], $_POST["name"]);
			
		}else{
			
			echo "all fields are rquired!";
			
		}
		
		
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title of the website</title>
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"> </script>
	</head>
	
<style>
 body{ 
  margin: 300px;
  padding: 150px;
  background: #F0F0F0 ;
  font-family: Tahoma, Arial, “Trebuchet MS”, Helvetica, sans-serif;
      }
     h1{
		color: FFFF33;  
	  }
  </style>
	


<div class="container">
<body>


<h1>Log in</h1>
<form method="POST">
	
			 <div class="row">
				<div class="col-md-3 col-sm-6">
				 <div class="form-group">
					<label Log in: </label><br>
					<input name="username" type="text" placeholder="username" class="form_control">
					<input name="password" type="password" placeholder="password" class="form_control"><br>
					<input class="btn btn_success hidden-xs btn-md" type="submit" name="login" value="Log in">
					</div> 			 
				</div>
			</div>
</form>
	


<h1>Sign up</h1>
<form method="POST">
	
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="form-group">
				<label Sing up: </label><br>
	            <input type="text" placeholder="name" name="name" class="form_control">
	            <input type="text" placeholder="username" name="username" class="form_control">
	            <input type="password" placeholder="password" name="password" class="form_control">
	
	            <input class="btn btn_success hidden-xs btn-md" type="submit" name="signup" value="Sign up">
	        </div>
        </div>
    </div>
</form> 

</body>
</div>
</html>