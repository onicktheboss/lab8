<?php
session_start();
//including the database connection file
include_once("db.php");

?>
<?php
if(isset($_SESSION["id"])){
    $id =  $_SESSION["id"] ;

}


 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id = $id "); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
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

float: right;
  color: ##060000 ;
  text-align: center;
  text-transform: bold;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
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
<body>
<div class="Menubar">
     <a href="home.php">Home</a>
     <a href="delete.php">Delete</a>
    <a href="edit.php">Edit Info</a>
    <a href="change_password.php">CHANGE PASSWORD</a>
    <a href="login.php">LOGOUT</a>
    <div class="company"><h2>Aiub</h2></div>
    </div>

<?php  
if(isset($_SESSION["id"])){
     echo "<a href=add.html>Add New Data</a><br/><br/>";
    
 }
 ?>
   
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>Id: ".$res['id']."</td><br><br>";
            echo "<td>Name: ".$res['name']."</td><br><br>";
            echo "<td>username: ".$res['username']."</td><br><br>";
            echo "<td>email:".$res['email']."</td><br><br>";
            echo "<td>password: ".$res['password']."</td><br><br>";   
             echo "<td>gender: ".$res['gender']."</td><br><br>";  
              echo "<td>date: ".$res['dob']."</td><br><br>";  
              echo "<img src='".$res['image']."'>"; 

           

            }
        
        ?>
 


<?php  
if(isset($_SESSION["id"])){
   echo" <a href='logout.php'> logout</a>";
    
     }
    if(isset($_SESSION["id"])){
   echo" <a href='change_password.php'> change_password</a>";
    
     }
     if(isset($_SESSION["id"])){
   echo" <a href='edit.php'> edit</a>";
    
     }

 if(!isset($_SESSION["id"])){
   echo"  <a href='login.php'>login</a>";
    
     }    


 ?>
    



   
</body>
</html
