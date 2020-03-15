<?php
	session_start();
	

  

  
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<head>
    <title>Add Data</title><link rel="stylesheet" type="text/css" href="style1.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
 <style >
    body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.menubar {
  overflow: hidden;
  background-color: #3300FF;
}
.company{
width:70%;
	height: 100px;
	float: right;
	background-color: red; 

}

.menubar a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  text-transform: bold;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.menubar a:hover {
  background-color: #3300FF;
  color: black;
}

.menubar a.active {
  background-color: #FFFFFF;
  color: blue;
}

.button {
  background-color: #3300FF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
 </style>
<body><div class="menubar"> 
 <a href="login.php"><h2>Login</h2></a>
  
    
</div>
	<form method="post">
		<table>
			
			<tr>
				<td><b>id :</b></td>
				<td><input type="text" name="id"/></td>
				
			</tr>
			
			<tr>
				<td><b>Password :</b></td>
				<td><input type="password" name="password"/></td>
				
			</tr>
			

			<tr>
				<td align="center" colspan="2"><input type="submit" value="submit" /></td>
				
			</tr>
			
		</table>

		
	</form>
	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lab8";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
		   
		  
		  $sql = "SELECT * FROM user WHERE id = '".$_POST["id"]."' and password = '".$_POST["password"]."'";
		  $result = $conn->query($sql);
		  if ($result->num_rows > 0)
		  {
			  $_SESSION["id"]=$_POST["id"];
			  $_SESSION["login"]=true;
			  header("location: home.php");
		  }
			  
		  else
			  echo "wrong email or password";
   }
	?>


	<a href="home.php"> back</a>
</body>
