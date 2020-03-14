<?php
session_start();
//including the database connection file
include_once("db.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM user"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>


<?php  
if(isset($_SESSION["email"])){
     echo "<a href=add.html>Add New Data</a><br/><br/>";
    
 }
 ?>
   
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>Name".$res['name']."</td>";
            echo "<td>username".$res['username']."</td>";
            echo "<td>email".$res['email']."</td>";
            echo "<td>password".$res['password']."</td>";   

            if(isset($_SESSION["email"])){
            
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 


            }
        }
        ?>
 


<?php  
if(isset($_SESSION["email"])){
   echo" <a href='logout.php'> logout</a>";
    
     }

 if(!isset($_SESSION["email"])){
   echo"  <a href='login.php'>login</a>";
    
     }    


 ?>
    



   
</body>
</html>