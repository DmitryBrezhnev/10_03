<?php
	
	require_once("config.php");
	
	//start server session to store data
	//in every file you want to access session
	//you should require functions
	session_start();
	
	function login($user, $pass){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_dmibre");
		
		$stmt = $mysql->prepare("SELECT id, name FROM users WHERE username=? and password=?");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		$stmt->bind_result($id, $name);
		
		$stmt->execute();
		
		//get the data
		if($stmt->fetch()){
			echo "user with id ".$id." logged in!";
			
			//create session variables 
			//redirect user
			$_SESSION["user_id"] = $id;
			$_SESSION["name"] = $name;
			$_SESSION["username"] = $user;
			
			
			header("Location: app_b.php");
			
			
		}else{
			// username was wrong or password was wrong or both
			echo $stmt->error;
			echo "wrong credentials";
		}
		
	}
	function signup($user, $pass){
		
		//hash the password
		$pass = hash("sha512", $pass);
		
		
		// GLOBALS - access outside variable in function
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_dmibre");
		
		$stmt = $mysql->prepare("INSERT INTO users (username, password) VALUES (?, ?) ");
		
		echo $mysql->error;
		
		$stmt->bind_param("ss", $user, $pass);
		
		if($stmt->execute()){
			echo "user saved successfully!";
		}else{
			echo $stmt->error;
		}
		
	}
	
	function saveInterest($interest){
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_dmibre");
		
		$stmt = $mysql->prepare("INSERT INTO Interests (name) VALUES (?) ");
		
		echo $mysql->error;
		
		$stmt->bind_param("s", $interest);
		
		if($stmt->execute()){
			echo "interest saved successfully!";
		}else{
			echo $stmt->error;
		}
}
	
	function createInterestDropdown(){
		//query all interests
		$mysql = new mysqli("localhost", $GLOBALS["db_username"], $GLOBALS["db_password"], "webpr2016_dmibre");
		
		$stmt = $mysql->prepare("SELECT id, name FROM Interests ORDER BY name ASC");
		
		echo $mysql->error;
		
		$stmt->bind_result($id, $name);
		
		$stmt->execute();
		
		//dropdown html
		$html = "<select name='user_interest'>";
		
		//for each interest 
		while($stmt->fetch()){
			$html .="<option value='".$id."'>".$name."</option>";
		}
		
		$html .="</select>";
		
		echo $html;
		
	}
	
	/*$name = "Romil";
	
	hello($name, "thursday", 7);
	hello("Toomas", "esmaspäev", 1);
	
	function hello($recieved_name, $day_of_the_week, $day){
		echo "hello ".$recieved_name."!";
		echo "<br>";
		echo "Today is ".$day_of_the_week." ".$day;
		echo "<br>";
	}*/
?>